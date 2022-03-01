<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%data_kondisi}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%kondisi}}`
 * - `{{%jalan}}`
 */
class m220222_140629_create_data_kondisi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%data_kondisi}}', [
            'id' => $this->primaryKey(),
            'id_kondisi' => $this->integer(),
            'id_jalan' => $this->integer(),
        ]);

        // creates index for column `id_kondisi`
        $this->createIndex(
            '{{%idx-data_kondisi-id_kondisi}}',
            '{{%data_kondisi}}',
            'id_kondisi'
        );

        // add foreign key for table `{{%kondisi}}`
        $this->addForeignKey(
            '{{%fk-data_kondisi-id_kondisi}}',
            '{{%data_kondisi}}',
            'id_kondisi',
            '{{%kondisi}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_jalan`
        $this->createIndex(
            '{{%idx-data_kondisi-id_jalan}}',
            '{{%data_kondisi}}',
            'id_jalan'
        );

        // add foreign key for table `{{%jalan}}`
        $this->addForeignKey(
            '{{%fk-data_kondisi-id_jalan}}',
            '{{%data_kondisi}}',
            'id_jalan',
            '{{%jalan}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%kondisi}}`
        $this->dropForeignKey(
            '{{%fk-data_kondisi-id_kondisi}}',
            '{{%data_kondisi}}'
        );

        // drops index for column `id_kondisi`
        $this->dropIndex(
            '{{%idx-data_kondisi-id_kondisi}}',
            '{{%data_kondisi}}'
        );

        // drops foreign key for table `{{%jalan}}`
        $this->dropForeignKey(
            '{{%fk-data_kondisi-id_jalan}}',
            '{{%data_kondisi}}'
        );

        // drops index for column `id_jalan`
        $this->dropIndex(
            '{{%idx-data_kondisi-id_jalan}}',
            '{{%data_kondisi}}'
        );

        $this->dropTable('{{%data_kondisi}}');
    }
}
