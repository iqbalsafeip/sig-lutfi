<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kecamatan}}`.
 */
class m220222_134945_create_kecamatan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%kecamatan}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%kecamatan}}');
    }
}
