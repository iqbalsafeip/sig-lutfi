<?php

use yii\db\Migration;

/**
 * Class m220223_043432_add_location_column
 */
class m220223_043432_add_location_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('jalan', 'longitude', $this->string());
        $this->addColumn('jalan', 'latitude', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220223_043432_add_location_column cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220223_043432_add_location_column cannot be reverted.\n";

        return false;
    }
    */
}
