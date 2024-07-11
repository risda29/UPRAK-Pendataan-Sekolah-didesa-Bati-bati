<div class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <div id="map" style="width: 100%; height: 100vh;"></div>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="row">
                        <?php $errors = validation_errors() ?>
                        <?php echo form_open_multipart('Lokasi/insertData') ?>
                    <div class="form-group">
                        <label>Nama Sekolah</label>
                        <input class="form-control" name="nama_sekolah">
                        <p class=" text-danger"><?= isset($erros['nama_sekolah']) == isset($erros['nama_sekolah']) ? validation_show_error('nama_sekolah') :'' ?></p>
                    </div>
                    <div class="form-group">
                        <label>Jenis Sekolah</label>
                        <input class="form-control" name="jenis_sekolah">
                        <p class=" text-danger"><?= isset($erros['jenis_sekolah']) == isset($erros['jenis_sekolah']) ? validation_show_error('jenis_sekolah') :'' ?></p>
                    </div>
                    <div class="form-group">
                        <label>Latitude</label>
                        <input class="form-control" name="latitude">
                        <p class=" text-danger"><?= isset($erros['latitude']) == isset($erros['latitude']) ? validation_show_error('latitude') :'' ?></p>
                    </div>
                    <div class="form-group">
                        <label>Longitude</label>
                        <input class="form-control" name="longitude">
                        <p class=" text-danger"><?= isset($erros['longitude']) == isset($erros['longitude']) ? validation_show_error('longitude') :'' ?></p>
                    </div>
                    <div class="form-group">
                        <label>Foto Sekolah</label>
                        <input type="file" class="form-control" name="foto_sekolah">
                        <p class=" text-danger"><?= isset($erros['foto_sekolah']) == isset($erros['foto_sekolah']) ? validation_show_error('foto_sekolah') :'' ?></p>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="batal" class="btn btn-danger">Batal</button>
                    <?php echo form_close() ?>
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

const getColor = (jenis) => {
    switch(jenis) {
        case 'negeri': return "#ff0000"; // Merah
        case 'swasta': return "#00ff00"; // Hijau
        case 'internasional': return "#0000ff"; // Biru
        default: return "#ffffff"; // Putih sebagai default
    }
};

$.getJSON("<?= base_url('geojson/sekolah.geojson') ?>", function(data){
    L.geoJson(data, {
        style: function(feature) {
            return {
                fillOpacity: 0.5,
                weight: 3,
                opacity: 1,
                color: getColor(feature.properties.jenis)
            };
        },
        onEachFeature: function(feature, layer) {
            if (feature.properties && feature.properties.keterangan) {
                layer.bindPopup(feature.properties.keterangan);
            } else {
                console.error("Property 'keterangan' not found in GeoJSON feature:", feature);
            }
        }
    }).addTo(map);
});

</script>