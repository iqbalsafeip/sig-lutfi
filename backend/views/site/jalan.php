<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$js = <<<JS
$(document).ready(()=> {
  $('.btn-delete-jalan').click(function(){
    let data = $(this);
    Swal.fire({
        title: 'Yakin menghapus data ?',
        showCancelButton: true,
        confirmButtonText: 'Ya',
    }).then((result) => {
        if (result.isConfirmed) {
            let id = data.attr('data-id');
            $.post('delete', {id: id}).then(res => {
                Swal.fire('Berhasil', '', 'success')
            })
            
        } 
    })
  })
})

JS;

$this->registerJS($js);

$this->title = 'Sistem Informasi Geografis Jalan Garut';
?> <div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Jalan</h1>
                    </div>
<!-- Page Heading -->
<div class="card card-body shadow ">
<table class="table table-bordered">
  <thead>
    <tr>
      <th>
        No
      </th>
      <th>Nama Ruas</th>
      <th>Kecamatan yang dilalui</th>
      <th>Panjang (km)</th>
      <th>Lebar (km)</th>
      <th>Peta</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php  foreach($jalan as $jl) : ?> 
      <tr>
        <td>
        </td>
        <td><?= $jl->nama_ruas ?></td>
        <td>
          <?php foreach($jl->kecamatan as $kc) : ?>
            <?= $kc['nama'] . ',' ?>
          <?php endforeach ?>
        </td>
        <td><?= $jl->panjang ?> km</td>
        <td><?= $jl->lebar ?> km</td>
        <td>
          <?php
            if($jl->longitude && $jl->latitude){
              ?> 
              <a class="btn btn-primary btn-sm" href="<?= Url::toRoute(['site/detail', 'id' => $jl->id]) ?>" >Lihat Peta</a> 
              <?php  } else { ?>
              <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahPeta-<?= $jl->id ?>" >Tambah Peta</button>
              <div class="modal fade" id="tambahPeta-<?= $jl->id ?>" tabindex="-1" aria-labelledby="tambahPeta-<?= $jl->id ?>Label" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahPeta-<?= $jl->id ?>Label">Menambah Lokasi untuk ruas <?= $jl->nama_ruas ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <div class="tipe-permukaan-form ">

                  <?php $form = ActiveForm::begin(); ?>

                    <input type="text" name="id" value="<?= $jl->id ?>"  hidden>
                    <?= $form->field($jl, 'longitude')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($jl, 'latitude')->textInput(['maxlength' => true]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
                    </div>

                  <?php ActiveForm::end(); ?>

                  </div>

                  </div>
                  
                </div>
              </div>
            </div>
              <?php } ?>
        </td>
        <td>
          <button class="btn btn-warning btn-sm">
            Update
          </button>
          <button class="btn btn-danger btn-sm btn-delete-jalan" data-id="<?= $jl->id ?>" >
            Delete
          </button>
        </td>
      </tr>
      <!-- Modal -->

    <?php endforeach ?>
  </tbody>
</table>
</div>

</div>

