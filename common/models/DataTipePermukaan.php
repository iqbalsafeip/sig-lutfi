<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "data_tipe_permukaan".
 *
 * @property int $id
 * @property int|null $id_permukaan
 * @property int|null $id_jalan
 */
class DataTipePermukaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_tipe_permukaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_permukaan', 'id_jalan'], 'integer'],
            [['value'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_permukaan' => 'Id Permukaan',
            'id_jalan' => 'Id Jalan',
            'value' => 'value'
        ];
    }

    public function getDetail()
    {
        return $this->hasOne(TipePermukaan::className(), ['id' => 'id_permukaan']);
    }
}
