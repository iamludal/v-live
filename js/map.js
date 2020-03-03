window.addEventListener('DOMContentLoaded', () => { new LeafletMap() });

class LeafletMap {

    constructor() {
        const ULILLE_POS = [50.61, 3.14];
        this.map = L.map("leaflet-map");
        this.currentStation = null

        console.log(typeof this.map)

        // Set the first station as the current one
        this.setCurrentStation(document.querySelector(".station"))

        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '©️ OpenStreetMap contributors'
        }).addTo(this.map);

        const points = [];

        // Add a marker to the map for each station
        for (let station of document.querySelectorAll(".station")) {
            const name = station.dataset.name;
            const geo = JSON.parse(station.dataset.geo);
            const marker = L.marker(geo)
            marker.addTo(this.map).bindPopup(name);
            this.setupStationListeners(station, marker, this.map)
            points.push(geo)
        }

        // fit map bounds to the list of points
        if (points.length > 0) this.map.fitBounds(points);

        this.map.setView(ULILLE_POS, 14);
    }

    /**
     * Setup the click listeners for a given station
     * @param {Node} station 
     * @param {*} marker 
     * @param {*} map 
     */
    setupStationListeners(station, marker, map) {
        station.addEventListener("click", () => {
            marker.openPopup();
            this.setCurrentStation(station);
            map.setView(marker.getLatLng(), 15)
        })

        marker.on("click", () => {
            this.setCurrentStation(station);
            map.setView(marker.getLatLng(), 15);
        })
    }

    setCurrentStation(station) {
        if (station === this.currentStation) return;
        else if (this.currentStation)
            this.currentStation.classList.remove("highlight");

        station.classList.add("highlight");

        this.currentStation = station;
    }
}