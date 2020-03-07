class LeafletMap {

    constructor() {
        const infos = document.querySelector(".infos");
        this.infoName = infos.querySelector('.name');
        this.infoCity = infos.querySelector('.city');
        this.map = L.map("leaflet-map");
        this.currentStation = null;
        this.stationsList = document.querySelectorAll(".station");
        this.stationsContainer = document.querySelector(".stations-container");

        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '©️ OpenStreetMap contributors'
        }).addTo(this.map);

        const points = [];

        // Add a marker to the map for each station
        for (let station of this.stationsList) {
            const { bikes, slots, name, city } = station.dataset;
            const icon = VliveImage.getInstance(bikes, slots).getLeafletIcon();
            const geo = JSON.parse(station.dataset.geo);
            const marker = L.marker(geo, { icon });
            const popupTxt = `<strong>${name}</strong><br><center>${city}</center>`;

            marker.addTo(this.map).bindPopup(popupTxt);
            this.setupStationListeners(station, marker, this.map);
            points.push(geo);
        }

        // fit map bounds to the list of points
        if (points.length > 0) this.map.fitBounds(points);

        // Set the first station as the current one
        this.stationsList[0].click();

        this.setStationsContainerMaxHeight();

        window.addEventListener("resize", () => {
            this.setStationsContainerMaxHeight()
        });
    }

    // Setup the listeners for a given station (click on it and on its marker)
    setupStationListeners(station, marker, map) {
        station.addEventListener("click", () => {
            marker.openPopup();
            this.setCurrentStation(station);
            map.setView(marker.getLatLng(), 15);
        });

        marker.on("click", () => {
            this.setCurrentStation(station);

            this.stationsContainer.scroll({
                top: station.offsetTop - this.stationsContainer.offsetTop,
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

        for (let info of document.querySelectorAll('.info')) {
            const prop = info.dataset.property;
            info.querySelector('.info-value').textContent = station.dataset[prop];
        }
    }

    // Set the correct height for the .stations-container div in order to have
    // the scroll bar.
    setStationsContainerMaxHeight() {
        const container = this.stationsContainer;
        const mainStyle = getComputedStyle(document.querySelector("main"));
        const mainHeight = parseInt(mainStyle.height);
        container.style.maxHeight = (mainHeight - container.offsetTop) + "px";
    }
}

window.addEventListener("DOMContentLoaded", () => { new LeafletMap() })