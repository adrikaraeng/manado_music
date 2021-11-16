<?php

use yii\db\Migration;

/**
 * Handles the creation of table `satuan`.
 */
class m180904_032205_create_satuan_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('satuan', [
            'id' => $this->primaryKey(),
            'satuan' => $this->string(50)->notNull(),
            'keterangan' => $this->text()->defaultValue(null),
            'aktivasi' => "ENUM('Aktif','Tidak Aktif')"
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('satuan');
    }
}
