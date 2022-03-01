<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Input Data Jalan';

$tipeP = json_encode($tipePermukaan);

$js = <<<JS

    function findobject(array, key){
        return array.filter((e => e['name'] == key));
    }

    function filterObject(array, key){
        let temp = findobject(array, key);
        let res = temp.filter(e => {
            let _te = findobject(array, key + '-' + e.value)[0] || 0
            return _te.value > 0
        })
        return res.map(e => {
            let _te = findobject(array, key + '-' + e.value)[0] || 0
            return {
                name : e.value,
                value: _te.value
            }
        });
    }

    // $('#kecamatan').select2();
    $('#form-jalan').submit(function(e){
        let result = $(this).serializeArray();

        let body = {
            nama_ruas: findobject(result, 'nama_ruas')[0],
            panjang: findobject(result, 'panjang')[0],
            lebar: findobject(result, 'lebar')[0],
            kecamatan: findobject(result, 'kecamatan'),
            tipePermukaan: filterObject(result, 'tipePermukaan'),
            kondisi: filterObject(result, 'kondisi')
        }

        Swal.fire({
            title: 'Yakin menambah data dengan nama '+ body.nama_ruas.value +' ?',
            showCancelButton: true,
            confirmButtonText: 'Simpan',
        }).then((result) => {
            if (result.isConfirmed) {
                $.post('waw', body).then(res => {
                    console.log(res);
                    Swal.fire('Berhasil', '', 'success')
                })
            } 
        })
        

        e.preventDefault();
    })




    $('#kecamatan').select2({
        placeholder: {
            id: '-1', // the value of the option
            text: 'Pilih kecamatan dilalui'
        }
    })
JS;

$this->registerJS($js);

?>


<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Input Data Jalan</h1>
                    </div>
    <div class="card card-body shadow">
    <form  id="form-jalan" class="form-jalan">
    <div class="row">
        <div class="col-4">
        <label for="">Nama Ruas </label>
            <input type="text" class="form-control" name="nama_ruas" placeholder="Masukan Nama Ruas" >
        </div>
        <div class="col-4">
            <label for="">Panjang (km)</label>
            <input type="text" name="panjang" class="form-control" placeholder="Masukan Panjang">
        </div>
        <div class="col-4">
            <label for="">Lebar (km)</label>
            <input type="text" class="form-control" name="lebar" placeholder="Masukan Lebar" >
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="kecamatan">Kecamatan yang dilalui</label>
            <select name="kecamatan" class="form-control js-states w-100" multiple="multiple" id="kecamatan">
                <?php foreach($kecamatan as $kec) : ?>
                    <option value="<?= $kec["id"] ?>"><?= $kec["nama"] ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <label for="kecamatan">Tipe Permukaan (kosongkan input jika tidak terdapat data)</label>
            <?php foreach($tipePermukaan as $tp) : ?>
            <div id="container-tipe" class="my-2">
                <div class="row ">
                    <div class="col-4">
                        <input type="text" class="form-control" value="<?= $tp["nama"] ?>" disabled >
                        <input type="text" name="tipePermukaan" class="form-control" value="<?= $tp["id"] ?>" hidden >
                    </div>
                    <div class="col-4">
                        <input type="text" placeholder="Input Jumlah (km)" class="form-control" name="tipePermukaan-<?= $tp["id"] ?>" >
                    </div>
                   
                </div>
            </div>
            <?php endforeach ?>

        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12"  >
            <label for="kecamatan" >Kondisi (kosongkan input jika tidak terdapat data)</label>
            <?php foreach($kondisi as $kd) : ?>
            <div class="my-2" >
                <div class="row">
                    <div class="col-4">
                        <input type="text" class="form-control" value="<?= $kd["nama"] ?>" disabled >
                        <input type="text" name="kondisi" class="form-control" value="<?= $kd["id"] ?>" hidden >
                    </div>
                    <div class="col-4">
                        <input type="text" placeholder="Input Jumlah (km)" class="form-control" name="kondisi-<?= $kd["id"] ?>" >
                    </div>
                   
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>



    <div class="form-group mt-3">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    </form>

    </div>
</div>