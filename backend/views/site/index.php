<?php

/** @var yii\web\View $this */

$_jalan = json_encode($jalan);

$this->title = 'Sistem Informasi Geografis Jalan Garut';
$js = <<<JS
        var map = L.map('map', {
            zoom: 15
        });

        L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
	maxZoom: 17,
	attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
}).addTo(map);

    let jalan = $_jalan;

    console.log($_jalan);

var options = {
  enableHighAccuracy: true,
  timeout: 5000,
  maximumAge: 0
};

function success(pos) {
  var crd = pos.coords;

    map.setView([crd.latitude, crd.longitude], 13)

    let tes = L.marker([crd.latitude, crd.longitude]).addTo(map);
    jalan.map((e)=> {
        if(e.longitude && e.latitude){
            L.marker([e.longitude, e.latitude]).addTo(map)
        }
    })
    document.getElementById('akurasi').innerHTML = `Ketepatan lokasi kurang lebih ` + crd.accuracy + ` meters.`
    // L.popup()
    // .setLatLng([crd.latitude, crd.longitude])
    // .setContent("Lokasi anda saat ini.")
    // .openOn(map);
  console.log('Your current position is:');
  console.log(`Latitude : crd.latitude`);
  console.log(`Longitude: crd.longitude`);
  console.log(`More or less crd.accuracy meters.`);
}

function error(err) {
  console.warn(`ERROR(err.code}): err.message`);
  document.getElementById('akurasi').innerHTML = `ERROR(` + err.code + `): `+ err.message
}

navigator.geolocation.getCurrentPosition(success, error, options);

JS;

$this->registerJS($js);

?> <div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
<!-- Page Heading -->
<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Total Data Jalan</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">332</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-map fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Total Data Kecamatan</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">32</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-building fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Total Pengguna</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-user fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
</div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Map Jalan</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Detail Map <i
                class="fas fa-arrow-right fa-sm text-white-50"></i></a>
    </div>
    <div class="card card-body mt-3">
        <p id="akurasi" ></p>
        <div id="map" style="height: 50vh;" ></div>
    </div>

</div>


