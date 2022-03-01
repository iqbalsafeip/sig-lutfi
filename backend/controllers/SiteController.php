<?php

namespace backend\controllers;

use common\models\LoginForm;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

use common\models\Jalan;
use common\models\Kecamatan;
use common\models\TipePermukaan;
use common\models\Kondisi;
use common\models\DataTipePermukaan;
use common\models\DataKondisi;
use common\models\KecamatanDilalui;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'jalan', 'input-jalan', 'waw', 'delete', 'detail'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionWaw(){
       if(Yii::$app->request->post()){
            $post = Yii::$app->request->post();
            $nama_ruas = $post['nama_ruas']['value'];
            $panjang = $post['panjang']['value'];
            $lebar = $post['lebar']['value'];
            $tipePermukaan = $post['tipePermukaan'];
            $kondisi = $post['kondisi'];
            $kecamatan = $post['kecamatan'];

            $jalan = new Jalan();
            $jalan->nama_ruas = $nama_ruas;
            $jalan->panjang = $panjang;
            $jalan->lebar = $lebar;
            $jalan->save();

            foreach($tipePermukaan as $tp){

                $_tp = new DataTipePermukaan();
                $_tp->value = $tp['value'];
                $_tp->id_permukaan = $tp['name'];
                $_tp->id_jalan = $jalan->id;
                $_tp->save();
            }
            foreach($kondisi as $kd){
                $_kd = new DataKondisi();
                $_kd->value = $kd['value'];
                $_kd->id_kondisi = $kd['name'];
                $_kd->id_jalan = $jalan->id;
                $_kd->save();
            }
            foreach($kecamatan as $kd){
                $_kd = new KecamatanDilalui();
                $_kd->id_kecamatan = $kd['value'];
                $_kd->id_jalan = $jalan->id;
                $_kd->save();
            }


            return $this->redirect(['site/jalan']);
       }
    }

    public function actionDelete(){
        if(Yii::$app->request->post()){
            $post= Yii::$app->request->post();
            $jalan = Jalan::findOne([
                'id' => $post['id']
            ]);

            $jalan->delete();
            return $this->redirect(['site/jalan']);
        }
    }


    public function actionInputJalan()
    {
        $model = new Jalan();
        $kecamatan = Kecamatan::find()->asArray()->all();
        $kondisi = Kondisi::find()->asArray()->all();
        $tipePermukaan = TipePermukaan::find()->asArray()->all();

        return $this->render('input', [
            'model' => $model,
            'kecamatan' => $kecamatan,
            'kondisi' => $kondisi,
            'tipePermukaan' => $tipePermukaan
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $jalan = Jalan::find()->asArray()->all();
        return $this->render('index', [
            'jalan' => $jalan
        ]);
    }

    public function actionJalan()
    {
        $jalan = Jalan::find()->all();
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $model = Jalan::findOne(['id' => $post['id']]);
            $model->load(Yii::$app->request->post()); 
            $model->save();
            return $this->redirect(['site/jalan']);
        }
        return $this->render('jalan', [
            'jalan' => $jalan
        ]);
    }

    public function actionDetail($id)
    {
        $jalan = Jalan::findOne(['id' => $id]);
        $js = Jalan::find()->where(['id' => $id])->asArray()->one();
        return $this->render('detail',[
            'jalan' => $jalan,
            'js' => $js
        ]);
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    
}
