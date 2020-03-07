<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V'Live</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">

    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <link rel="stylesheet" href="styles/font-awesome/css/font-awesome.min.css">
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
</head>

<body>
    <header>
        <h1 class="main-title">
            <i class="fa fa-bicycle"></i> V'Live
        </h1>
        <button class="search subtitle" id="show-modal">
            <span>Recherche</span>
            <i class="fa fa-search"></i>
        </button>
        </form>
    </header>

    <main>
        <div class="stations">
            <h2 class="subtitle">
                Stations <i class="fa fa-map-signs"></i>
            </h2>

            <form action="" method="GET" class="sort-form">
                <div class="container">
                    <span>Trier par:</span>
                    <label>
                        <input type="radio" name="sort" value="name" <?= $sort === "name" ? "checked" : "" ?>>
                        Nom
                    </label>
                    <label>
                        <input type="radio" name="sort" value="city" <?= $sort === "city" ? "checked" : "" ?>>
                        Ville
                    </label>
                </div>
                <button class="btn">Trier <i class="fa fa-sort"></i></button>
            </form>

            <ul class="stations-container">
                <?php foreach ($stations as $station) : ?>
                    <?= create_station($station) ?>
                <?php endforeach ?>
            </ul>
        </div>
        <div class="map" id="leaflet-map">
        </div>
        <div class="infos">
            <h2 class="subtitle">
                <i class="fa fa-info-circle"></i> Infos
            </h2>

            <div class="infos-container">
                <div class="infos-main-title card highlight">
                    <span class="name"></span>
                    <span>
                        <i class="fa fa-map-marker"></i> <span class="city"></span>
                    </span>
                </div>

                <ul>
                    <?= create_info("fa-thumb-tack", "address", "Adresse") ?>
                    <?= create_info("fa-bicycle", "bikes", "Vélos disponibles") ?>
                    <?= create_info("fa-check", "slots", "Emplacements disponibles") ?>
                    <?= create_info("fa-cog", "state", "État") ?>
                </ul>
            </div>
        </div>
    </main>

    <footer>
        <span>Copyright © 2020 Ludovic Chombeau - Romain Follet</span>
        <a class="link" href="">Crédits</a>
    </footer>

    <?php require_once(__DIR__ . '/modal.php') ?>

    <script src="js/VliveImage.js"></script>
    <script src="js/map.js"></script>

</body>

</html>