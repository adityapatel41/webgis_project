// Wait for DOM to be ready
document.addEventListener('DOMContentLoaded', function() {
    // First define the base layers
    const osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    });

    const satellite = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0','mt1','mt2','mt3'],
        attribution: '© Google'
    });

    // Then initialize the map with the base layer
    var map = L.map('map', {
        center: [23.03, 72.58],
        zoom: 10,
        layers: [osm] // Now osm is defined before being used
    });

    // Define overlay layers
    const sampleLayer = L.tileLayer.wms("http://localhost:8080/geoserver/Drone_Image/wms", {
        layers: 'Drone_Image:sample_points',
        format: 'image/png',
        transparent: true,
        attribution: 'Sample Points'
    }).addTo(map);

    const tiffLayer = L.tileLayer.wms("http://localhost:8080/geoserver/Drone_Image/wms", {
        layers: 'Drone_Image:AUDA_Revised_2022_0A', // Removed extra whitespace
        format: 'image/png',
        transparent: true,
        attribution: 'AUDA Revised 2022'
    }).addTo(map);

    // Layer Controls - safely adding event listeners
    document.getElementById('layer1Toggle').addEventListener('change', function() {
        this.checked ? sampleLayer.addTo(map) : map.removeLayer(sampleLayer);
    });
    
    document.getElementById('layer1Opacity').addEventListener('input', function() {
        sampleLayer.setOpacity(this.value);
    });
    
    document.getElementById('layer1Z').addEventListener('input', function() {
        if (map.hasLayer(sampleLayer)) {
            setTimeout(() => {
                const container = sampleLayer.getContainer();
                if (container) {
                    container.style.zIndex = this.value;
                }
            }, 100);
        }
    });

    document.getElementById('tiffToggle').addEventListener('change', function() {
        this.checked ? tiffLayer.addTo(map) : map.removeLayer(tiffLayer);
    });
    
    document.getElementById('tiffOpacity').addEventListener('input', function() {
        tiffLayer.setOpacity(this.value);
    });
    
    document.getElementById('tiffZ').addEventListener('input', function() {
        if (map.hasLayer(tiffLayer)) {
            setTimeout(() => {
                const container = tiffLayer.getContainer();
                if (container) {
                    container.style.zIndex = this.value;
                }
            }, 100);
        }
    });

    // Basemap Switch Buttons
    document.getElementById('osmBtn').addEventListener('click', function() {
        map.removeLayer(satellite);
        osm.addTo(map);
    });

    document.getElementById('satelliteBtn').addEventListener('click', function() {
        map.removeLayer(osm);
        satellite.addTo(map);
    });
});

// Panel toggle function - keep this outside the DOMContentLoaded event
let isCollapsed = true;
function togglePanel() {
    const panel = document.getElementById('controlPanel');
    const content = document.getElementById('panelContent');
    const button = panel.querySelector('.toggle-btn');

    if (isCollapsed) {
        panel.classList.remove('collapsed');
        content.style.display = 'block';
        button.innerHTML = '▼ Hide Controls';
    } else {
        panel.classList.add('collapsed');
        content.style.display = 'none';
        button.innerHTML = '▶ Controls';
    }
    isCollapsed = !isCollapsed;
}