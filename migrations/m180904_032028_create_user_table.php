<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180904_032028_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'password' => $this->text()->notNull(),
            'level' => "ENUM('admin','operator','customer')",
            'authKey' => $this->string(50)->defaultValue(null),
            'accessToken' => $this->string(100)->defaultValue(null),
            'aktivasi' => "ENUM('Aktif','Tidak AKtif')"
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
