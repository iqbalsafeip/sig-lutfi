<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kondisi}}`.
 */
class m220222_131319_create_kondisi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%kondisi}}', [
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
        $this->dropTable('{{%kondisi}}');
    }
}
