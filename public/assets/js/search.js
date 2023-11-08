var searchInput = document.getElementById('search');

// Ajoutez un écouteur d'événements pour le changement d'entrée dans le champ de recherche
searchInput.addEventListener('input', function () {
    // Soumettez automatiquement le formulaire lorsqu'il y a un changement dans le champ de recherche
    document.getElementById('searchForm').submit();
});