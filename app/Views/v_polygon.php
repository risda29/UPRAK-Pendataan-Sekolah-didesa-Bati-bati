<div id="map" style="width: 100%; height: 100vh;"></div>
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

    // Tambahkan polygon
    var polygon = L.polygon([
        [-3.608205273321787, 114.699149333917],
        [-3.6077723336584286, 114.69941088947334],
        [-3.6081097719431856, 114.70033271332429],
        [-3.608638212778854, 114.70026891928617],
        [-3.608205273321787, 114.699149333917],
    ], {
        color: 'red'
    }).addTo(map);

    // Tambahkan marker di tengah-tengah polygon
    var markerPosition = polygon.getBounds().getCenter();
    var marker = L.marker(markerPosition).addTo(map)
        .bindPopup("<img src='<?= base_url('gambar/darussalim.jpg')?>' width='250px'> <br>" +
            "Nama Sekolah: Pondok Pesantren Darussalim <br>" +
            "Alamat: jalan darussalim <br>");

    // Bind popup polygon juga jika diperlukan
    polygon.bindPopup("<b>Area Sekolah</b>");

    // Atur zoom agar polygon dan marker terlihat dengan jelas
    map.fitBounds(polygon.getBounds());
</script>
