<?php


$this->title = 'Detail ' .$jalan->nama_ruas;
$_jalan = json_encode($js);
$js = <<<JS
        var map = L.map('map', {
            zoom: 15
        });

        L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
	maxZoom: 17,
	attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
}).addTo(map);

let jalan = $_jalan;


console.log(jalan);
map.setView([jalan.longitude, jalan.latitude], 15)

    let tes = L.marker([jalan.longitude, jalan.latitude]).addTo(map);



JS;

$this->registerJS($js);
?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail <?= $jalan->nama_ruas ?></h1>
    </div>
    <div class="card card-body mt-3">
        <p id="akurasi" ></p>
        <div id="map" style="height: 50vh;" ></div>
    </div>  
    <div class="row mt-3">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h5>Kecamatan Dilalui</h5>
                </div>
                <div class="card-body">
                    <ul>
                    <?php foreach($jalan->kecamatan as $kc) : ?>
                        <li><?= $kc->nama ?></li>
                    <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h5>Tipe Permukaan</h5>
                </div>
                <div class="card-body">
                    <ul>
                    <?php foreach($jalan->permukaan as $pm) : ?>
                        <li><?= $pm->detail->nama ?> = <?= $pm->value ?> <?= $pm->detail->satuan ?></li>
                    <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h5>Kondisi</h5>
                </div>
                <div class="card-body">
                    <ul>
                    <?php foreach($jalan->kondisi as $kd) : ?>
                        <li><?= $kd->detail->nama ?> = <?= $kd->value ?> <?= $kd->detail->satuan ?></li>
                    <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>