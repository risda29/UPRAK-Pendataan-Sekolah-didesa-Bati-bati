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

        L.marker([-3.608034004225829, 114.69932552379747])
        .bindPopup("<img src='<?= base_url('gambar/darussalim.jpg')?>' width='250px'> <br>"+
<<<<<<< HEAD
=======
            // "<b> lokasi </b> <br>" + 
>>>>>>> dbddb0282d3259d01f90da41ea026e18747bf644
             "Nama Sekolah:Pondok Pesantren Darussalim <br>" +
        "Alamat :jalan darussalim <br>")
        .addTo(map);

<<<<<<< HEAD
        //     L.circle([-3.608034004225829, 114.69932552379747], {
        //     radius: 70, // radius lingkaran dalam meter
        //     color: 'yellow', // warna garis lingkaran
        //     fillColor: '#f00', // warna isi lingkaran
        //     fillOpacity: 0.5 // opacity isi lingkaran
        // })
        // .bindPopup("<img src='<?= base_url('gambar/darussalim.jpg')?>' width='250px'> <br>"+
        //         "Nama Sekolah: Pondok Pesantren Darussalim <br>" +
        //         "Alamat: Jalan Darussalim <br>")
        // .addTo(map);

            //      L.polygon([
            //     [-3.608034004225829, 114.69932552379747],
            //     [-3.5996889193491706, 114.70374048198136],
            //     [-3.6057629732546457, 114.70551078720082]
            // ])
            // .bindPopup("<img src='https://example.com/gambar/darussalim.jpg' width='250px'> <br>"+
            //         "Nama Sekolah: Pondok Pesantren Darussalim <br>" +
            //         "Alamat: Jalan Darussalim <br>")
            // .addTo(map);



=======
>>>>>>> dbddb0282d3259d01f90da41ea026e18747bf644
        L.marker([-3.601376333402981, 114.69953557184017])
        .bindPopup("<img src='<?= base_url('gambar/ubudiyah.jpg')?>' width='250px'> <br>"+
            "<b> lokasi </b> <br>" + 
        "Alamat :jalan ubudiyah <br>" + 
        "Kec: bati-bati <br>")
        .addTo(map);

L.marker([-3.5996889193491706, 114.70374048198136]).addTo(map);
L.marker([-3.6057629732546457, 114.70551078720082]).addTo(map);
L.marker([-3.615619639507791, 114.69926833527367]).addTo(map);
<<<<<<< HEAD
</script>

=======
</script>
>>>>>>> dbddb0282d3259d01f90da41ea026e18747bf644
