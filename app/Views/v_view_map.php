<div id="map" style="width: 100%; height: 70vh;"></div>
<script>
            const map = L.map('map').setView([-3.604252179824871, 114.69929968326329], 13); //semakin besar angkanya, semakin zoom
        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
</script>