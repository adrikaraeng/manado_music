<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transaksi;

/**
 * TransaksiSearch represents the model behind the search form about `app\models\Transaksi`.
 */
class TransaksiSearch extends Transaksi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jumlah', 'diskon_jumlah_beli', 'free_diskon'], 'integer'],
            [['ip', 'nama_produk', 'jenis', 'satuan', 'harga_pokok', 'harga_jual', 'deskripsi', 'status', 'no_transaksi', 'nama_pelanggan', 'no_telepon', 'tanggal_expired', 'no_resi'], 'safe'],
        ];
    }

    public function TotalHarga($searchModel)
    {
      $query = (new yii\db\Query())
          ->from('transaksi')
          ->where("status='Booking' AND ip='$searchModel'")
          ->sum('harga_jual');
      if($query != null):
        return $query;
      else:
        $query = 0;
        return $searchModel;
      endif;
    }

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
    public function searchKeranjang($params, $ip)
    {
        $query = Transaksi::find();

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

        // grid filtering conditions
        $query->where("ip='$ip' AND status='Booking1'");
        $query->andFilterWhere([
            'id' => $this->id,
            'jumlah' => $this->jumlah,
            'diskon_jumlah_beli' => $this->diskon_jumlah_beli,
            'free_diskon' => $this->free_diskon,
        ]);

        $query->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'nama_produk', $this->nama_produk])
            ->andFilterWhere(['like', 'jenis', $this->jenis])
            ->andFilterWhere(['like', 'satuan', $this->satuan])
            ->andFilterWhere(['like', 'harga_pokok', $this->harga_pokok])
            ->andFilterWhere(['like', 'harga_jual', $this->harga_jual])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'no_transaksi', $this->no_transaksi])
            ->andFilterWhere(['like', 'nama_pelanggan', $this->nama_pelanggan])
            ->andFilterWhere(['like', 'no_telepon', $this->no_telepon])
            ->andFilterWhere(['like', 'tanggal_expired', $this->tanggal_expired]);

        return $dataProvider;
    }

    public function search($params)
    {
        $query = Transaksi::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'jumlah' => $this->jumlah,
            'diskon_jumlah_beli' => $this->diskon_jumlah_beli,
            'free_diskon' => $this->free_diskon,
        ]);

        $query->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'nama_produk', $this->nama_produk])
            ->andFilterWhere(['like', 'jenis', $this->jenis])
            ->andFilterWhere(['like', 'satuan', $this->satuan])
            ->andFilterWhere(['like', 'harga_pokok', $this->harga_pokok])
            ->andFilterWhere(['like', 'harga_jual', $this->harga_jual])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'no_transaksi', $this->no_transaksi])
            ->andFilterWhere(['like', 'nama_pelanggan', $this->nama_pelanggan])
            ->andFilterWhere(['like', 'no_telepon', $this->no_telepon])
            ->andFilterWhere(['like', 'tanggal_expired', $this->tanggal_expired]);

        return $dataProvider;
    }
}
