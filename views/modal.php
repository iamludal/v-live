<div class="modal">
    <div class="modal-content">
        <form action="" method="GET">
            <h2 class="subtitle">
                Rechercher une station <i class="fa fa-map-signs"></i>
            </h2>

            <label for="name">Nom(s) <small>(Séparés pas des virgules)</small></label>
            <input type="text" name="name" id="name">

            <label for="city">Commune(s) <small>(Séparées pas des virgules)</small></label>

            <input type="text" name="city" id="city">

            <div class="numbers">
                <div class="col">
                    <label for="bikes">
                        Nombre de vélos disponibles <small>(minimal)</small>
                    </label>
                    <input type="number" min="0" name="bikes" id="bikes">
                </div>
                <div class="col">
                    <label for="slots">
                        Nombre d'emplacements disponibles <small>(minimal)</small>
                    </label>
                    <input type="number" min="0" name="slots" id="slots">
                </div>
                <div class="col">
                    <label for="state">
                        État
                    </label>
                    <select name="state" id="state">
                        <option value="" selected>Toutes</option>
                        <option value="EN%20SERVICE">En service</option>
                        <option value="HORS%20SERVICE">Hors service</option>
                    </select>
                </div>
            </div>

            <!-- To keep the current selected sort method -->
            <input type="hidden" name="sort" value="<?= $sort ?>">

            <button class="btn btn-submit">Rechercher <i class="fa fa-search"></i></button>
        </form>
    </div>
</div>

<script src="js/modal.js"></script>