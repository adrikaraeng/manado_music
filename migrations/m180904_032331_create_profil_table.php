<?php

use yii\db\Migration;

/**
 * Handles the creation of table `profil`.
 */
class m180904_032331_create_profil_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('profil', [
            'id' => $this->primaryKey(),
            'tentang' => $this->text()->notNull(),
            'aktivasi' => "ENUM('Aktif','Tidak Aktif')"
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('profil');
    }
}
