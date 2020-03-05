class LeafletMap {

    constructor() {
        const ULILLE_POS = [50.61, 3.14];
        const infos = document.querySelector(".infos");
        this.infoName = infos.querySelector('.name');
        this.infoCity = infos.querySelector('.city');
        this.map = L.map("leaflet-map");
        this.currentStation = null
        this.stationsList = document.querySelectorAll(".station")

        // Set the first station as the current one
        this.setCurrentStation(this.stationsList[0]);

        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '©️ OpenStreetMap contributors'
        }).addTo(this.map);

        const points = [];

        // Add a marker to the map for each station
        for (let station of this.stationsList) {
            const name = station.dataset.name;
            const { bikes, slots } = station.dataset;
            const icon = VliveImage.getInstance(bikes, slots).getLeafletIcon();
            const geo = JSON.parse(station.dataset.geo);
            const marker = L.marker(geo, { icon })
            marker.addTo(this.map).bindPopup(`<strong>${name}</strong>`);
            this.setupStationListeners(station, marker, this.map)
            points.push(geo)
        }

        // fit map bounds to the list of points
        if (points.length > 0) this.map.fitBounds(points);

        this.map.setView(ULILLE_POS, 14);
        this.setStationsContainerMaxHeight();

        window.addEventListener("resize", () => {
            this.setStationsContainerMaxHeight()
        })
    }

    // Setup the listeners for a given station (click on it and on its marker)
    setupStationListeners(station, marker, map) {
        station.addEventListener("click", () => {
            marker.openPopup();
            this.setCurrentStation(station);
            map.setView(marker.getLatLng(), 15)
        })

        marker.on("click", () => {
            this.setCurrentStation(station);

            const firstStation = document.querySelector(".station");

            document.querySelector(".stations-container").scroll({
                top: station.offsetTop - firstStation.offsetTop,
                behavior: "smooth"
            });
            map.setView(marker.getLatLng(), 15);
        })
    }

    // Set the focus on the current station (highlight it)
    setCurrentStation(station) {
        if ((station === undefined) || (station === this.currentStation))
            return;
        else if (this.currentStation) // there is a current station
            this.currentStation.classList.remove("highlight");

        station.classList.add("highlight");
        this.currentStation = station;

        const mainName = document.querySelector('.infos-main-title .name');
        const mainCity = document.querySelector('.infos-main-title .city');
        mainName.textContent = station.dataset.name;
        mainCity.textContent = station.dataset.city;

        for (const info of document.querySelectorAll('.info')) {
            const prop = info.dataset.property;
            info.querySelector('.info-value').textContent = station.dataset[prop];
        }
    }

    // Set the correct height for the .stations-container div in order to have
    // the scroll bar.
    setStationsContainerMaxHeight() {
        const container = document.querySelector(".stations-container");
        const mainStyle = getComputedStyle(document.querySelector("main"));
        const mainHeight = parseInt(mainStyle.height);
        container.style.maxHeight = (mainHeight - container.offsetTop) + "px";
    }
}

window.addEventListener("DOMContentLoaded", () => { new LeafletMap() })