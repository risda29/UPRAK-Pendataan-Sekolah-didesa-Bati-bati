<div id="map" style="width: 100%; height: 70vh;"></div>
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
    center: [-3.6093790887583572, 114.70113468412184], 
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
    switch(jenis) {
        case 'negeri': return "#ff0000";
        case 'swasta': return "#00ff00";
        case 'internasional': return "#0000ff"; 
        default: return "#ffffff"; 
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
