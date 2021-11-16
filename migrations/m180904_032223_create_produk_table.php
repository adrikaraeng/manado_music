<?php

use yii\db\Migration;

/**
 * Handles the creation of table `produk`.
 */
class m180904_032223_create_produk_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('produk', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(100)->notNull(),
            'jenis' => $this->integer()->notNull(),
            'satuan' => $this->integer()->notNull(),
            'harga_pokok' => $this->string(15)->notNull(),
            'barcode' => $this->string(30)->defaultValue(null),
            'harga_jual' => $this->string(15)->notNull(),
            'deskripsi' => $this->text()->defaultValue(null),
            'gambar' => $this->text()->defaultValue(null),
            'aktivasi' => "ENUM('Aktif','Tidak Aktif')",
            'ongkir' => $this->integer()->notNull(),
            'diskon_jumlah_beli' => $this->integer()->defaultValue(null),
            'free_diskon' => $this->integer()->defaultValue(null)
        ]);

        $this->createIndex(
            'idx-produk-jenis',
            'produk',
            'jenis'
        );

        $this->createIndex(
            'idx-produk-satuan',
            'produk',
            'satuan'
        );

        $this->createIndex(
            'idx-produk-ongkir',
            'produk',
            'ongkir'
        );

        $this->addForeignKey(
            'fk-produk-ongkir',
            'produk',
            'ongkir',
            'ongkir',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-produk-satuan',
            'produk',
            'satuan',
            'satuan',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-data_bidang-jenis',
            'produk',
            'jenis',
            'jenis',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('produk');
    }
}
