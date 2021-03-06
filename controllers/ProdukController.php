<?php

namespace app\controllers;

use Yii;
use app\models\Produk;
use app\models\ProdukSearch;
use app\models\ProdukGambar;
use app\models\SubKategori;
use app\models\ProdukGambarSearch;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;

/**
 * ProdukController implements the CRUD actions for Produk model.
 */
class ProdukController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionListSubKategori(){
      $id = $_POST['id'];
      
      $count = SubKategori::find()
        ->where(['jenis' => $id, 'aktivasi' => 'Aktif'])
        ->count();
      $models = SubKategori::find()
        ->where(['jenis' => $id, 'aktivasi' => 'Aktif'])
        ->orderBy("title ASC")
        ->all();
      if($count > 0)
      {
        echo "<option value='' selected disable>Pilih Sub Kategori (*)</option>";
        foreach ($models as $m => $model) {
          echo "<option value='" .$model->id. "'>".$model->title."</option>";
        }
      }
      else
      {
        echo "<option value=''></option>";
      }

    }
    
    /**
     * Lists all Produk models.
     * @return mixed
     */
    public function actionIndex()
    {
      if (Yii::$app->user->isGuest):
          Yii::$app->user->logout();
          return $this->goHome();
      endif;
      $this->layout="admin";
      $searchModel = new ProdukSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
      return $this->render('index', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider
      ]);
    }

    /**
     * Displays a single Produk model.
     * @param integer $id
     * @return mixed
     */
    //Fungsi untuk view detail produk
    public function actionView($id)
    {
        if (Yii::$app->user->isGuest):
            Yii::$app->user->logout();
            return $this->goHome();
        endif;
        $this->layout="admin";
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $model,
            'gambar' => ProdukGambar::find()->where("produk='$model->id'")->all(),
        ]);
    }
    
    public function actionAjaxCeksimpan()
    {
      $model = new Produk;
      $model->scenario="create";
      if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())):
        Yii::$app->response->format = 'json';
        return ActiveForm::validate($model);
      endif;       
    }
    public function actionAjaxCekUpdateSimpan()
    {
      $model = new Produk;
      // $model->scenario="update";
      if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())):
        Yii::$app->response->format = 'json';
        return ActiveForm::validate($model);
      endif;       
    }

    public function actionCreate()
    {
        if (Yii::$app->user->isGuest):
          Yii::$app->user->logout();
          return $this->goHome();
        endif;
        $this->layout="admin";
        $model = new Produk;
        // $model->scenario="create";

        if ($model->load(Yii::$app->request->post())) {

            $gambar = UploadedFile::getInstances($model,'gambar');
            $model->tanggal_input = date('Y-m-d H:i:s');
            $model->satuan = "1";
            
            if($model->save(false)):
              Yii::$app->session->setFlash('success', "Successfully.");
              if($gambar != NULL):
                  $i=1;
                  foreach( $gambar as $g => $gbr ):
                    $imageName = date('Ymdhis'.$i);
                    $model2 = new ProdukGambar();

                    $gbr->saveAs('gambar/produk/'.$imageName.'.'.$gbr->extension);

                    $model2->produk = $model->id;
                    $model2->gambar = $imageName.'.'.$gbr->extension;
                    $model2->save();
                    $i++;
                  endforeach;
              endif;
            else:
              Yii::$app->session->setFlash('error', "Failed, please try again.");
            endif;

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
          $validateUrl = ['/produk/ajax-ceksimpan', 'id'=>$model->id];
          return $this->render('create', [
              'model' => $model,
              'bmodel' => null,
              'validateUrl' => $validateUrl
              // 'readonly' => $readonly
          ]);
        }
    }

    /**
     * Updates an existing Produk model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->isGuest):
            Yii::$app->user->logout();
            return $this->goHome();
        endif;
        $this->layout="admin";
        $model = $this->findModel($id);
        // $model->scenario = "update";
        $connection = \Yii::$app->db;

        if ($model->load(Yii::$app->request->post())) {

            $sql = $connection->createCommand("SELECT * FROM produk WHERE nama='$model->nama' AND id='$id'")->queryOne();
            $sql_2 = $connection->createCommand("SELECT * FROM produk WHERE nama='$model->nama' AND id<>'$id'")->queryAll();

            $gambar = UploadedFile::getInstances($model,'gambar');
            $model->tanggal_input = date('Y-m-d H:i:s');

            if(!empty($sql) || empty($sql_2)):
              $model->save(false);
              Yii::$app->session->setFlash('success', "Successfully.");
            
              if($gambar != NULL):
                $i=1;
                foreach( $gambar as $g => $gbr ):
                    $imageName = date('Ymdhis'.$i);
                    $model2 = new ProdukGambar();
  
                    $gbr->saveAs('gambar/produk/'.$imageName.'.'.$gbr->extension);
  
                    $model2->produk = $model->id;
                    $model2->gambar = $imageName.'.'.$gbr->extension;
                    $model2->save();
                    $i++;
                endforeach;
              endif;
              
              return $this->redirect(['view', 'id' => $model->id]);
            else:
              Yii::$app->session->setFlash('error', $model->nama." already exist.");
              return $this->redirect(['update','id'=>$id]);
            endif;

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $bmodel = ProdukGambar::find()->where("produk='$id'")->all();
            $validateUrl = ['/produk/ajax-cek-update-simpan', 'id'=>$model->id];
            return $this->render('update', [
                'model' => $model,
                'bmodel' => $bmodel,
                'validateUrl' => $validateUrl
            ]);
        }
    }

    public function actionDeleteGambar($id)
    {
        $this->layout="admin";
        $model = ProdukGambar::findOne($id);
        $oldFile = Yii::$app->basePath."/web/gambar/produk/".$model->gambar;
        if(file_exists($oldFile)):unlink($oldFile);endif;

        $model->delete();
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Produk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Produk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Produk::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
