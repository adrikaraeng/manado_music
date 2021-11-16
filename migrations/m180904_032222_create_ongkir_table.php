<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ongkir`.
 */
class m180904_032222_create_ongkir_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('ongkir', [
            'id' => $this->primaryKey(),
            'lokasi' => $this->string(100)->notNull(),
            'harga' => $this->string(15)->notNull(),
            'keterangan' => $this->text()->defaultValue(null),
            'aktivasi' => "ENUM('Aktif','Tidak Aktif')"
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('ongkir');
    }
}
