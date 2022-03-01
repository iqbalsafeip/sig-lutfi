<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jalan".
 *
 * @property int $id
 * @property string|null $nama_ruas
 * @property string|null $panjang
 * @property string|null $lebar
 *
 * @property DataKondisi[] $dataKondisis
 * @property KecamatanDilalui[] $kecamatanDilaluis
 */
class Jalan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jalan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_ruas', 'panjang', 'lebar', 'longitude', 'latitude'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_ruas' => 'Nama Ruas',
            'panjang' => 'Panjang (km)',
            'lebar' => 'Lebar (km)',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude'
        ];
    }

    /**
     * Gets query for [[DataKondisis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKondisi()
    {
        return $this->hasMany(DataKondisi::className(), ['id_jalan' => 'id']);
    }

    public function getPermukaan()
    {
        return $this->hasMany(DataTipePermukaan::className(), ['id_jalan' => 'id']);
    }

    /**
     * Gets query for [[KecamatanDilaluis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatan(){
        return $this->hasMany(Kecamatan::className(), ['id' => 'id_kecamatan'])->viaTable('kecamatan_dilalui', ['id_jalan' => 'id']);
    }

}
