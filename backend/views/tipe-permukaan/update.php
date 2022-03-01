<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TipePermukaan */

$this->title = 'Update Tipe Permukaan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tipe Permukaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container-fluid">
    <div class="card card-body shadow">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">tipe-permukaan</h1>
    </div>
<div class="tipe-permukaan-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>

</div>
