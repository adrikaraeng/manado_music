<?php

use yii\db\Migration;

/**
 * Handles the creation of table `transaksi`.
 */
class m180904_032348_create_transaksi_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('transaksi', [
            'id' => $this->primaryKey(),
            'ip' => $this->string(15)->notNull(),
            'nama_produk' => $this->text()->notNull(),
            'jenis' => $this->string(200)->notNull(),
            'satuan' => $this->string(200)->notNull(),
            'harga_pokok' => $this->string(15)->notNull(),
            'harga_jual' => $this->string(15)->notNull(),
            'deskripsi' => $this->text()->defaultValue(null),
            'gambar' => $this->text()->defaultValue(null),
            'jumlah' => $this->integer(5),
            'status' => "ENUM('0','1','2','3','4','5','6','7')",
            'no_transaksi' => $this->string(40)->defaultValue(null),
            'nama_pelanggan' => $this->string(200)->defaultValue(null),
            'no_telepon' => $this->string(15)->defaultValue(null),
            'tanggal_pesan' => $this->datetime()->defaultValue(null),
            'tanggal_expired' => $this->datetime()->defaultValue(null),
            'diskon_jumlah_beli' => $this->integer(5)->defaultvalue(null),
            'free_diskon' => $this->integer(5)->defaultValue(null)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('transaksi');
    }
}
