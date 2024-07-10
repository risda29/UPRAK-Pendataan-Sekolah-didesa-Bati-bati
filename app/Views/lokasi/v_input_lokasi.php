<div class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <div id="map" style="width: 100%; height: 100vh;"></div>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="form-group">
                        <label>Nama Sekolah</label>
                        <input class="form-control" name="nama_lokasi">
                    </div>
                    <div class="form-group">
                        <label>Alamat Sekolah</label>
                        <input class="form-control" name="alamat_lokasi">
                    </div>
                    <div class="form-group">
                        <label>Latitude</label>
                        <input class="form-control" name="latitude">
                    </div>
                    <div class="form-group">
                        <label>Longitude</label>
                        <input class="form-control" name="longitude">
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
 var accessToken = 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'; // Ganti dengan token akses Mapbox Anda

 var peta1 = L.tileLayer('https://tile.opentopomap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.opentopomap.org/">OpenTopoMap</a> contributors',
            maxZoom: 17, // OpenTopoMap supports up to zoom level 17
        });



var peta2 = L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            attribution: 'Map data &copy; <a href="https://www.google.com/maps/">Google Maps</a>',
            maxZoom: 18,
        });
var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
});

var peta4 = L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
            attribution: 'Map data &copy; <a href="https://www.google.com/maps/">Google Maps</a>',
            maxZoom: 18,
        });

const map = L.map('map', {
    center: [-3.604252179824871, 114.69929968326329], // Koordinat pusat
    zoom: 16,
    layers: [peta4] // Layer awal
});

const baseLayers = {
    "klll": peta1,
	"Satellite Map": peta2,
    "OpenStreetMap": peta3,
     "Dark Map": peta4
};
const layerControl = L.control.layers(baseLayers).addTo(map);

</script>