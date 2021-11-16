<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Konfirmasi;

/**
 * KonfirmasiSearch represents the model behind the search form about `app\models\Konfirmasi`.
 */
class KonfirmasiSearch extends Konfirmasi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'wilayah'], 'integer'],
            [['ip', 'no_transaksi', 'nama_pelanggan', 'no_telepon', 'no_rek_pelanggan', 'rek_a_n', 'bank', 'struk_bukti', 'tanggal_pesan', 'tanggal_expired', 'status', 'alamat_lengkap', 'no_resi'], 'safe'],
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

    public function searchReport($params, $start, $end)
    {
        $query = Konfirmasi::find();

        // add conditions that should always apply here
        $start = date("Y-m-d H:i:s", strtotime($start));
        $end = date("Y-m-d H:i:s", strtotime($end));

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->where("(tanggal_pesan BETWEEN '$start' AND '$end') AND status='Selesai'");
        $query->andFilterWhere([
            'id' => $this->id,
            'wilayah' => $this->wilayah,
            'no_resi' => $this->no_resi
        ]);

        $query->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'no_transaksi', $this->no_transaksi])
            ->andFilterWhere(['like', 'nama_pelanggan', $this->nama_pelanggan])
            ->andFilterWhere(['like', 'no_telepon', $this->no_telepon])
            ->andFilterWhere(['like', 'no_rek_pelanggan', $this->no_rek_pelanggan])
            ->andFilterWhere(['like', 'rek_a_n', $this->rek_a_n])
            ->andFilterWhere(['like', 'bank', $this->bank])
            ->andFilterWhere(['like', 'struk_bukti', $this->struk_bukti])
            ->andFilterWhere(['like', 'tanggal_pesan', $this->tanggal_pesan])
            ->andFilterWhere(['like', 'tanggal_expired', $this->tanggal_expired])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'alamat_lengkap', $this->alamat_lengkap]);

        return $dataProvider;   
    }

    public function searchReport2($params)
    {
        $query = Konfirmasi::find();

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
        $query->where("status='Selesai'");
        $query->andFilterWhere([
            'id' => $this->id,
            'wilayah' => $this->wilayah,
            'no_resi' => $this->no_resi
        ]);

        $query->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'no_transaksi', $this->no_transaksi])
            ->andFilterWhere(['like', 'nama_pelanggan', $this->nama_pelanggan])
            ->andFilterWhere(['like', 'no_telepon', $this->no_telepon])
            ->andFilterWhere(['like', 'no_rek_pelanggan', $this->no_rek_pelanggan])
            ->andFilterWhere(['like', 'rek_a_n', $this->rek_a_n])
            ->andFilterWhere(['like', 'bank', $this->bank])
            ->andFilterWhere(['like', 'struk_bukti', $this->struk_bukti])
            ->andFilterWhere(['like', 'tanggal_pesan', $this->tanggal_pesan])
            ->andFilterWhere(['like', 'tanggal_expired', $this->tanggal_expired])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'alamat_lengkap', $this->alamat_lengkap]);

        return $dataProvider;   
    }

    public function search($params)
    {
        $query = Konfirmasi::find();

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
        $query->where("status NOT LIKE 'Selesai'");
        $query->orderby("struk_bukti DESC");
        $query->andFilterWhere([
            'id' => $this->id,
            'wilayah' => $this->wilayah,
            'no_resi' => $this->no_resi
        ]);

        $query->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'no_transaksi', $this->no_transaksi])
            ->andFilterWhere(['like', 'nama_pelanggan', $this->nama_pelanggan])
            ->andFilterWhere(['like', 'no_telepon', $this->no_telepon])
            ->andFilterWhere(['like', 'no_rek_pelanggan', $this->no_rek_pelanggan])
            ->andFilterWhere(['like', 'rek_a_n', $this->rek_a_n])
            ->andFilterWhere(['like', 'bank', $this->bank])
            ->andFilterWhere(['like', 'struk_bukti', $this->struk_bukti])
            ->andFilterWhere(['like', 'tanggal_pesan', $this->tanggal_pesan])
            ->andFilterWhere(['like', 'tanggal_expired', $this->tanggal_expired])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'alamat_lengkap', $this->alamat_lengkap]);

        return $dataProvider;
    }

    public function searchOperator($params)
    {
        $query = Konfirmasi::find();

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
        $query->where("status NOT LIKE 'Selesai'");
        $query->orderby("struk_bukti DESC");
        $query->andFilterWhere([
            'id' => $this->id,
            'wilayah' => $this->wilayah,
            'no_resi' => $this->no_resi
        ]);

        $query->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'no_transaksi', $this->no_transaksi])
            ->andFilterWhere(['like', 'nama_pelanggan', $this->nama_pelanggan])
            ->andFilterWhere(['like', 'no_telepon', $this->no_telepon])
            ->andFilterWhere(['like', 'no_rek_pelanggan', $this->no_rek_pelanggan])
            ->andFilterWhere(['like', 'rek_a_n', $this->rek_a_n])
            ->andFilterWhere(['like', 'bank', $this->bank])
            ->andFilterWhere(['like', 'struk_bukti', $this->struk_bukti])
            ->andFilterWhere(['like', 'tanggal_pesan', $this->tanggal_pesan])
            ->andFilterWhere(['like', 'tanggal_expired', $this->tanggal_expired])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'alamat_lengkap', $this->alamat_lengkap]);

        return $dataProvider;
    }
}
