<?php

use yii\db\Migration;

/**
 * Handles the creation of table `konfirmasi`.
 */
class m180904_032402_create_konfirmasi_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('konfirmasi', [
            'id' => $this->primaryKey(),
            'ip' => $this->string(15)->notNull(),
            'no_transaksi' => $this->string(40)->notNull(),
            'nama_pelanggan' => $this->string(200)->notNull(),
            'no_telepon' => $this->string(15)->notNull(),
            'no_rek_pelanggan' => $this->string(25)->notNull(),
            'rek_a_n' => $this->string(200)->notNull(),
            'bank' => $this->string(200)->notNull(),
            'struk_bukti' => $this->text()->defaultValue(null),
            'tanggal_pesan' => $this->datetime()->defaultValue(null),
            'tanggal_expired' => $this->datetime()->defaultValue(null),
            'status' => "ENUM('0','1','2','3','4','5','6','7') DEFAULT NULL"
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('konfirmasi');
    }
}
