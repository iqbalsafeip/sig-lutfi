<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Kondisi */

$this->title = 'Update Kondisi: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kondisis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container-fluid">
    <div class="card card-body shadow">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">kondisi</h1>
    </div>
<div class="kondisi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>

</div>
