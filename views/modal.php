<div class="modal">
    <div class="modal-content">
        <form action="">
            <h2 class="subtitle">
                Rechercher une station <i class="fas fa-directions"></i>
            </h2>

            <label for="name">Nom</label>
            <input type="text" name="name" id="name">

            <label for="city">Commune</label>
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
            </div>

            <button class="btn-submit">Rechercher <i class="fas fa-search"></i></button>
        </form>
    </div>
</div>