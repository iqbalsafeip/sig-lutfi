<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "data_kondisi".
 *
 * @property int $id
 * @property int|null $id_kondisi
 * @property int|null $id_jalan
 *
 * @property Jalan $jalan
 * @property Kondisi $kondisi
 */
class DataKondisi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_kondisi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kondisi', 'id_jalan'], 'integer'],
            [['value'], 'string'],
            [['id_jalan'], 'exist', 'skipOnError' => true, 'targetClass' => Jalan::className(), 'targetAttribute' => ['id_jalan' => 'id']],
            [['id_kondisi'], 'exist', 'skipOnError' => true, 'targetClass' => Kondisi::className(), 'targetAttribute' => ['id_kondisi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_kondisi' => 'Id Kondisi',
            'id_jalan' => 'Id Jalan',
        ];
    }

    /**
     * Gets query for [[Jalan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJalan()
    {
        return $this->hasOne(Jalan::className(), ['id' => 'id_jalan']);
    }

    public function getDetail()
    {
        return $this->hasOne(Kondisi::className(), ['id' => 'id_kondisi']);
    }

    /**
     * Gets query for [[Kondisi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKondisi()
    {
        return $this->hasOne(Kondisi::className(), ['id' => 'id_kondisi']);
    }
}
