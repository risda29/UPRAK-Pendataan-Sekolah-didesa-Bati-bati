<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <div id="map" style="width: 100%; height: 70vh;"></div>
        </div>
        <div class="col-sm-4">
            <div class="row">
                <?php if (session()->getFlashdata('pesan')): ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('pesan') ?>
                    </div>
                <?php endif; ?>
                <?php $errors = session()->get('errors'); ?>
                <?= form_open_multipart('Lokasi/updateData/' . $lokasi['id_lokasi']) ?>
                    <div class="form-group">
                        <label>Nama Sekolah</label>
                        <input class="form-control" name="nama_sekolah" value="<?= $lokasi['nama_sekolah'] ?>">
                        <p class="text-danger"><?= isset($errors['nama_sekolah']) ? $errors['nama_sekolah'] : '' ?></p>
                    </div>
                    <div class="form-group">
                        <label>Jenis Sekolah</label>
                        <input class="form-control" name="jenis_sekolah" value="<?= $lokasi['jenis_sekolah'] ?>">
                        <p class="text-danger"><?= isset($errors['jenis_sekolah']) ? $errors['jenis_sekolah'] : '' ?></p>
                    </div>
                    <div class="form-group">
                        <label>Latitude</label>
                        <input class="form-control" name="latitude" value="<?= $lokasi['latitude'] ?>">
                        <p class="text-danger"><?= isset($errors['latitude']) ? $errors['latitude'] : '' ?></p>
                    </div>
                    <div class="form-group">
                        <label>Longitude</label>
                        <input class="form-control" name="longitude" value="<?= $lokasi['longitude'] ?>">
                        <p class="text-danger"><?= isset($errors['longitude']) ? $errors['longitude'] : '' ?></p>
                    </div>
                    <div class="form-group">
                        <label>Foto Sekolah</label>
                        <input type="file" class="form-control" name="foto_sekolah">
                        <p class="text-danger"><?= isset($errors['foto_sekolah']) ? $errors['foto_sekolah'] : '' ?></p>
                        <img src="<?= base_url('foto/' . $lokasi['foto_sekolah']) ?>" width="200px">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('Lokasi/index') ?>" class="btn btn-danger">Batal</a>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>


<script>
    var accessToken = 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'; 

    var peta1 = L.tileLayer('https://tile.opentopomap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.opentopomap.org/">OpenTopoMap</a> contributors',
        maxZoom: 17, 
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
        center: [<?= $lokasi['latitude'] ?>, <?= $lokasi['longitude'] ?>], 
        zoom: 16,
        layers: [peta4]
    });

    const baseLayers = {
        "OpenTopoMap": peta1,
        "Satellite Map": peta2,
        "OpenStreetMap": peta3,
        "Dark Map": peta4
    };
    const layerControl = L.control.layers(baseLayers).addTo(map);

    const getColor = (jenis) => {
        switch (jenis) {
            case 'negeri': return "#ff0000"; 
            case 'swasta': return "#00ff00"; 
            case 'internasional': return "#0000ff"; 
            default: return "#ffffff"; 
        }
    };

    $.getJSON("<?= base_url('geojson/sekolah.geojson') ?>", function(data) {
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
                    layer.bindPopup('<b>' + feature.properties.keterangan + '</b><br>Jenis: ' + feature.properties.jenis);
                } else {
                    console.error("Property 'keterangan' or 'jenis' not found in GeoJSON feature:", feature);
                }
            }
        }).addTo(map);
    });

    
    L.marker([<?= $lokasi['latitude'] ?>, <?= $lokasi['longitude'] ?>])
        .bindPopup('<img src="<?= base_url('foto/' . $lokasi['foto_sekolah']) ?>" width="150px"><br>' +
            'Nama Sekolah: <b><?= $lokasi["nama_sekolah"] ?></b><br>' +
            'Jenis Sekolah: <?= $lokasi["jenis_sekolah"] ?><br>'
        )
        .addTo(map);
</script>
