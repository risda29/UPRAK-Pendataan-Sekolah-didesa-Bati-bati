<!DOCTYPE html>
<html>
<head>
    <title> Maps Leaflet </title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js">
    </script>  
</head>
<body>
    <h1> sebuah peta </h1>
    <div id="map" style="height: 600px;"></div>
    <hr>
    <script>
        var map = L.map ('map').setView ([-3.753201, 114.766961],18);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png',{ //ini menggunakan tema openstremap
            maxZoom: 19,
            attribution: '&copy; <a href="https://tile.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        //Define the custom icon
        const customIcon = L.icon({
            iconUrl: 'red-icon.png', 
            iconSize: [38, 38], 
            iconAnchor: [19, 38], 
            popupAnchor: [0, -38] 
        });

        document.addEventListener("DOMContentLoaded", function(){
            fetch("http://localhost//maps-leaflet/getLokasi.php")
            .then(response => response.json())
            .then(data => {
                if (data !== "0 results"){
                    data.forEach(item => {
                        var marker = L.marker([item.lat, item.lon], {
                            icon: customIcon }).addTo(map);
                        marker.bindPopup(item.keterangan);
                    });
                } else {
                    console.log("No results found.");
                }
            })
            .catch(error => console.error("Error fetching data:", error));
        });

        document.addEventListener("DOMContentLoaded", function(){
            fetch('map.geojson')
            .then(response => response.json())
            .then(data => {
                L.geoJSON(data, {
                    pointToLayer: function (feature, lating){
                        return L.marker(lating, { icon: customIcon});
                    },
                    onEachFeature: function(feature, layer){ // onEachFeature ini artinya menambah layer
                        if(feature.properties && feature.properties.nama_lokasi){
                            layer.bindPopup(feature.properties.nama_lokasi);
                        } else {
                            console.error("Property 'nama_lokasi' not found in GeoJSON feature:", feature);
                        }
                    },
                    style: function (feature){
                        console.log (feature.properties.jenis);
                        if (feature.properties.jenis=="lapangan"){
                            return {
                            fillOpacity: 0.5, //warna nya agak redup
                            weight: 3, // Tebal
                            opacity: 1, //dari sisi 0-1
                            color:"#ff0000" };
                        }
                        if (feature.properties.jenis=="taman"){
                            return {
                            fillOpacity: 0.5, 
                            weight: 3, 
                            opacity: 1, 
                            color:"#00ff00" };
                        }
                        if (feature.properties.jenis=="lapangan baru"){
                            return {
                            fillOpacity: 0.5, 
                            weight: 3, 
                            opacity: 1, 
                            color:"#ffffff" };
                        }
                        if (feature.properties.jenis=="kuburan"){
                            return {
                            fillOpacity: 0.5, 
                            weight: 3, 
                            opacity: 1, 
                            color:"#ffff00" };
                        }
                        if (feature.properties.jenis=="sekolah"){
                            return {
                            fillOpacity: 0.5, 
                            weight: 3,
                            opacity: 1, 
                            color:"#808080" };
                        }
                        if (feature.properties.jenis=="tentara"){
                            return {
                            fillOpacity: 0.5, 
                            weight: 3, 
                            opacity: 1, 
                            color:"#00ff00" };
                        }
                        if (feature.properties.jenis=="Taman Baru"){
                            return {
                            fillOpacity: 0.5, 
                            weight: 3, 
                            opacity: 1, 
                            color:"#00ff00" };
                        }
                        if (feature.properties.jenis=="Pasar"){
                            return {
                            fillOpacity: 0.5, 
                            weight: 3, 
                            opacity: 1, 
                            color:"#00ff00" };
                        }
                        if (feature.properties.jenis=="Olahraga"){
                            return {
                            fillOpacity: 0.5,
                            weight: 3, 
                            opacity: 1, 
                            color:"#00ff00" };
                        }
                        if (feature.properties.jenis=="stasion"){
                            return {
                            fillOpacity: 0.5, 
                            weight: 3, 
                            opacity: 1, 
                            color:"#00ff00" };
                        }
                        if (feature.properties.jenis=="Rumah sakit"){
                            return {
                            fillOpacity: 0.5, 
                            weight: 3, 
                            opacity: 1, //dari sisi 0-1
                            color:"#00ff00" };
                        }
                        if (feature.properties.jenis=="Lapangan 3"){
                            return {
                            fillOpacity: 0.5, //warna nya agak redup
                            weight: 3, // Tebal
                            opacity: 1, //dari sisi 0-1
                            color:"#00ff00" };
                        }
                        if (feature.properties.jenis=="Lapangan 2"){
                            return {
                            fillOpacity: 0.5, //warna nya agak redup
                            weight: 3, // Tebal
                            opacity: 1, //dari sisi 0-1
                            color:"#00ff00" };
                        }
                        if (feature.properties.jenis=="Kuburan 2"){
                            return {
                            fillOpacity: 0.5, //warna nya agak redup
                            weight: 3, // Tebal
                            opacity: 1, //dari sisi 0-1
                            color:"#00ff00" };
                        }
                        if (feature.properties.jenis=="terminal"){
                            return {
                            fillOpacity: 0.5, //warna nya agak redup
                            weight: 3, // Tebal
                            opacity: 1, //dari sisi 0-1
                            color:"#00ff00" };
                        }
                    }
                }).addTo(map);
            })
            .catch(error => console.error("Error fetching GeoJSON data:", error));
        });
        
    </script>
</body>
</html>
