<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kondisi".
 *
 * @property int $id
 * @property string|null $nama
 * @property string|null $satuan
 */
class Kondisi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kondisi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'satuan','value'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'satuan' => 'Satuan',
        ];
    }
}
