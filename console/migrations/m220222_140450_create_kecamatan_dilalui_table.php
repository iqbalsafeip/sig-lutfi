<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kecamatan_dilalui}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%kecamatan}}`
 * - `{{%jalan}}`
 */
class m220222_140450_create_kecamatan_dilalui_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%kecamatan_dilalui}}', [
            'id' => $this->primaryKey(),
            'id_kecamatan' => $this->integer(),
            'id_jalan' => $this->integer(),
        ]);

        // creates index for column `id_kecamatan`
        $this->createIndex(
            '{{%idx-kecamatan_dilalui-id_kecamatan}}',
            '{{%kecamatan_dilalui}}',
            'id_kecamatan'
        );

        // add foreign key for table `{{%kecamatan}}`
        $this->addForeignKey(
            '{{%fk-kecamatan_dilalui-id_kecamatan}}',
            '{{%kecamatan_dilalui}}',
            'id_kecamatan',
            '{{%kecamatan}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_jalan`
        $this->createIndex(
            '{{%idx-kecamatan_dilalui-id_jalan}}',
            '{{%kecamatan_dilalui}}',
            'id_jalan'
        );

        // add foreign key for table `{{%jalan}}`
        $this->addForeignKey(
            '{{%fk-kecamatan_dilalui-id_jalan}}',
            '{{%kecamatan_dilalui}}',
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
        // drops foreign key for table `{{%kecamatan}}`
        $this->dropForeignKey(
            '{{%fk-kecamatan_dilalui-id_kecamatan}}',
            '{{%kecamatan_dilalui}}'
        );

        // drops index for column `id_kecamatan`
        $this->dropIndex(
            '{{%idx-kecamatan_dilalui-id_kecamatan}}',
            '{{%kecamatan_dilalui}}'
        );

        // drops foreign key for table `{{%jalan}}`
        $this->dropForeignKey(
            '{{%fk-kecamatan_dilalui-id_jalan}}',
            '{{%kecamatan_dilalui}}'
        );

        // drops index for column `id_jalan`
        $this->dropIndex(
            '{{%idx-kecamatan_dilalui-id_jalan}}',
            '{{%kecamatan_dilalui}}'
        );

        $this->dropTable('{{%kecamatan_dilalui}}');
    }
}
