<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bank`.
 */
class m180904_032127_create_bank_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('bank', [
            'id' => $this->primaryKey(),
            'no_rek' => $this->string(20)->notNull(),
            'rek_a_n' => $this->string(100)->notNull(),
            'bank' => $this->string(100)->notNull(),
            'aktivasi' => "ENUM('Aktif','Tidak Aktif')"
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('bank');
    }
}
