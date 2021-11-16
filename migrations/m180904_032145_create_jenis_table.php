<?php

use yii\db\Migration;

/**
 * Handles the creation of table `jenis`.
 */
class m180904_032145_create_jenis_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('jenis', [
            'id' => $this->primaryKey(),
            'jenis' => $this->string(50)->notNull(),
            'keterangan' => $this->text(),
            'aktivasi' => "ENUM('Aktif','Tidak Aktif')"
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('jenis');
    }
}
