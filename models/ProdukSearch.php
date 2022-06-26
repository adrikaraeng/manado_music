<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Produk;

/**
 * ProdukSearch represents the model behind the search form about `app\models\Produk`.
 */
class ProdukSearch extends Produk
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'satuan', 'berat', 'barcode'], 'integer'],
            [['nama', 'jenis', 'harga_jual', 'deskripsi', 'aktivasi', 'tanggal_input', 'sub_kategori'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Produk::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith("subKategori0");
        $query->joinWith("jenis0");
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'satuan' => $this->satuan,
            'berat' => $this->berat
        ]);

        $query->andFilterWhere(['like', 'barcode', $this->barcode])
            ->andFilterWhere(['like', 'harga_jual', $this->harga_jual])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'jenis.jenis', $this->jenis])
            ->andFilterWhere(['like', 'sub_kategori.title', $this->sub_kategori])
            ->andFilterWhere(['like', 'produk.aktivasi', $this->aktivasi])
            ->andFilterWhere(['like', 'tanggal_input', $this->tanggal_input]);

        return $dataProvider;
    }
}
