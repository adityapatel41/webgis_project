<?php
// Optional PHP session logic here
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>WebGIS Map</title>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Basemap Switch Buttons -->
<div id="basemap-switcher">
    <button id="osmBtn">OpenStreetMap</button>
    <button id="satelliteBtn">Satellite</button>
</div>

<!-- Map Container -->
<div id="map"></div>

<!-- Layer Controls Panel -->
<div id="controlPanel" class="control-panel collapsed">
    <button class="toggle-btn" onclick="togglePanel()">▶ Controls</button>
    <div id="panelContent" class="collapsed-content">
        <h4>Overlay Layer Controls</h4>
        <div class="layer-control">
            <input type="checkbox" id="layer1Toggle" checked> Show GeoServer Layer
            <input type="range" id="layer1Opacity" min="0" max="1" step="0.1" value="1">
            <input type="number" id="layer1Z" value="10">
        </div>
        <div class="layer-control">
            <input type="checkbox" id="tiffToggle" checked> Show TIFF Layer
            <input type="range" id="tiffOpacity" min="0" max="1" step="0.1" value="1">
            <input type="number" id="tiffZ" value="11">
        </div>
    </div>
</div>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="script.js"></script>
</body>
</html>
