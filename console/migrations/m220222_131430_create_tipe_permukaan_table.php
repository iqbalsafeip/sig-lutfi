<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tipe_permukaan}}`.
 */
class m220222_131430_create_tipe_permukaan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tipe_permukaan}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(),
            'satuan' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tipe_permukaan}}');
    }
}
