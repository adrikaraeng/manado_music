<?php

use yii\db\Migration;

/**
 * Handles the creation of table `kontak`.
 */
class m180904_032243_create_kontak_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('kontak', [
            'id' => $this->primaryKey(),
            'nama_kontak' => $this->string(100)->notNull(),
            'isi_kontak' => $this->string(200)->notNull(),
            'aktivasi' => "ENUM('AKtif','Tidak Aktif')"
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('kontak');
    }
}
