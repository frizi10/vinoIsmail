
    document.addEventListener('DOMContentLoaded', function () {
        const searchForm = document.getElementById('searchForm');
        const searchInput = document.getElementById('search');  

        if (searchForm) {
            searchInput.addEventListener('input', function () {
                // Réinitialiser les valeurs des filtres
                document.getElementById('couleur').value = '';
                document.getElementById('format').value = '';
                document.getElementById('prix_min').value = '';
                document.getElementById('prix_max').value = '';
                document.getElementById('pays').value = '';
                document.getElementById('region').value = '';
                document.getElementById('millesime').value = '';
                document.getElementById('cepage').value = '';

                // Réinitialiser la valeur du tri
                document.getElementById('sort').value = '';
            });
        }
    });

    



    