<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%data_tipe_permukaan}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%tipe_permukaan}}`
 * - `{{%jalan}}`
 */
class m220222_140826_create_data_tipe_permukaan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%data_tipe_permukaan}}', [
            'id' => $this->primaryKey(),
            'id_permukaan' => $this->integer(),
            'id_jalan' => $this->integer(),
        ]);

        // creates index for column `id_permukaan`
        $this->createIndex(
            '{{%idx-data_tipe_permukaan-id_permukaan}}',
            '{{%data_tipe_permukaan}}',
            'id_permukaan'
        );

        // add foreign key for table `{{%tipe_permukaan}}`
        $this->addForeignKey(
            '{{%fk-data_tipe_permukaan-id_permukaan}}',
            '{{%data_tipe_permukaan}}',
            'id_permukaan',
            '{{%tipe_permukaan}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_jalan`
        $this->createIndex(
            '{{%idx-data_tipe_permukaan-id_jalan}}',
            '{{%data_tipe_permukaan}}',
            'id_jalan'
        );

        // add foreign key for table `{{%jalan}}`
        $this->addForeignKey(
            '{{%fk-data_tipe_permukaan-id_jalan}}',
            '{{%data_tipe_permukaan}}',
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
        // drops foreign key for table `{{%tipe_permukaan}}`
        $this->dropForeignKey(
            '{{%fk-data_tipe_permukaan-id_permukaan}}',
            '{{%data_tipe_permukaan}}'
        );

        // drops index for column `id_permukaan`
        $this->dropIndex(
            '{{%idx-data_tipe_permukaan-id_permukaan}}',
            '{{%data_tipe_permukaan}}'
        );

        // drops foreign key for table `{{%jalan}}`
        $this->dropForeignKey(
            '{{%fk-data_tipe_permukaan-id_jalan}}',
            '{{%data_tipe_permukaan}}'
        );

        // drops index for column `id_jalan`
        $this->dropIndex(
            '{{%idx-data_tipe_permukaan-id_jalan}}',
            '{{%data_tipe_permukaan}}'
        );

        $this->dropTable('{{%data_tipe_permukaan}}');
    }
}
