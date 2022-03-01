<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kecamatan_dilalui".
 *
 * @property int $id
 * @property int|null $id_kecamatan
 * @property int|null $id_jalan
 *
 * @property Jalan $jalan
 * @property Kecamatan $kecamatan
 */
class KecamatanDilalui extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kecamatan_dilalui';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kecamatan', 'id_jalan'], 'integer'],
            [['id_jalan'], 'exist', 'skipOnError' => true, 'targetClass' => Jalan::className(), 'targetAttribute' => ['id_jalan' => 'id']],
            [['id_kecamatan'], 'exist', 'skipOnError' => true, 'targetClass' => Kecamatan::className(), 'targetAttribute' => ['id_kecamatan' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_kecamatan' => 'Id Kecamatan',
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

    /**
     * Gets query for [[Kecamatan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatan()
    {
        return $this->hasOne(Kecamatan::className(), ['id' => 'id_kecamatan']);
    }
}
