<?php

/** @var yii\web\View $this */

$this->title = 'Sistem Informasi Geografis Jalan Garut';
$js = <<<JS
        var map = L.map('map', {
            zoom: 13
        });

        L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
	maxZoom: 17,
	attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
}).addTo(map);

var options = {
  enableHighAccuracy: true,
  timeout: 5000,
  maximumAge: 0
};

function success(pos) {
  var crd = pos.coords;

    map.setView([crd.latitude, crd.longitude], 13)
    let tes = L.marker([crd.latitude, crd.longitude]).addTo(map);
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

?>

<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Map Jalan</h1>
        
    </div>
    <div class="row">
      <div class="col-2">
        <div class="card">
          <div class="card-header">
            <h5>Jalan yang tersedia : </h5>
          </div>
          <div class="card-body">

          </div>
        </div>
      </div>
      <div class="col-8">
        <div class="card card-body ">
            <p id="akurasi" ></p>
            <div id="map" style="height: 50vh;" ></div>
        </div>
      </div>
      <div class="col-2">
        <div class="card  ">
          <div class="card-header">
            <h5>Filter Berdasarkan : </h5>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="">Nama Ruas</label>
              <input type="text" placeholder="Input Nama Ruas"  class="form-control">
            </div>
            <div class="form-group">
              <label for="">Kecamatan Dilalui</label>
              <select name="" id="" class="form-control" >
                <option value=""    >Pilih Kecamatan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Tipe Permukaan</label>
              <select name="" id="" class="form-control" >
                <option value=""  >Pilih Tipe</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Kondisi</label>
              <select name="" id="" class="form-control" >
                <option value=""  >Pilih Kondisi</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>