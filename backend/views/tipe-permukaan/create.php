<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TipePermukaan */

$this->title = 'Create Tipe Permukaan';
$this->params['breadcrumbs'][] = ['label' => 'Tipe Permukaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="card card-body shadow">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">tipe-permukaan</h1>
    </div>
<div class="tipe-permukaan-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>

</div>
