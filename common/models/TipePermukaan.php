<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tipe_permukaan".
 *
 * @property int $id
 * @property string|null $nama
 * @property string|null $satuan
 */
class TipePermukaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipe_permukaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'satuan'], 'string', 'max' => 255],
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
