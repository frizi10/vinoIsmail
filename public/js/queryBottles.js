// document.getElementById("search-box").addEventListener("keyup", function () {
//     var query = this.value;
//     fetchData(query);
// });

// document.addEventListener("click", function (e) {
//     if (
//         e.target.tagName === "A" &&
//         e.target.parentElement.hasAttribute("data-page")
//     ) {
//         e.preventDefault();
//         var query = document.getElementById("search-box").value;
//         var page = e.target.parentElement.getAttribute("data-page");
//         fetchData(query, page);
//     }
// });

// function fetchData(query, page = 1) {
//     fetch(`/search?query=${query}&page=${page}`)
//     // fetch(`/bouteilles?query=${query}&page=${page}`)
//         .then((response) => response.json())
//         .then((data) => {
//             document.getElementById("search-results").innerHTML =
//                 data.resultsHtml;
//             document.getElementById("pagination").innerHTML =
//                 data.paginationHtml;
//             // Update pagination links to include data-page attribute
//             updatePaginationLinks();
//         })
//         .catch((error) => console.error("Error:", error));
// }

// function updatePaginationLinks() {
//     document.querySelectorAll("#pagination a").forEach(function (link) {
//         const url = new URL(link.href);
//         const page = url.searchParams.get("page");
//         link.parentElement.setAttribute("data-page", page);
//         link.href = "#";
//     });
// }


// document.addEventListener('DOMContentLoaded', function() {
//     function loadProducts() {
//         const formData = new FormData(document.getElementById('form-search'));
//         const params = new URLSearchParams(formData).toString();
//         fetch(`/search?${params}`)
//             .then(response => response.text())
//             .then(html => {
//                 document.getElementById('search-results').innerHTML = html;
//                 // attachPaginationEventListeners();
//             });
//     }

//     function attachEventListeners() {
//         document.getElementById('search-input').addEventListener('input', loadProducts);
//         // document.getElementById('category-select').addEventListener('change', loadProducts);
//         // document.getElementById('sort').addEventListener('change', loadProducts);
//         // document.getElementById('direction-select').addEventListener('change', loadProducts);
//     }

//     attachEventListeners();
//     // attachPaginationEventListeners();
// });

// document.addEventListener('DOMContentLoaded', function() {
//     function loadProducts() {
//         const searchInput = document.getElementById('search-input').value;
//         fetch(`/search?search=${encodeURIComponent(searchInput)}`)
//             .then(response => response.json()) // Modifié pour s'attendre à une réponse JSON
//             .then(data => {
//                 document.getElementById('search-results').innerHTML = data.resultsHtml; // Assurez-vous que cet ID est correct
//             });
//     }

//     document.getElementById('search-input').addEventListener('input', loadProducts);
// });

// document.addEventListener('DOMContentLoaded', function() {
//     function loadProducts() {
//         const searchInput = document.getElementById('search-input').value;
//         const sortValue = document.getElementById('sort').value; // Récupérer la valeur de tri
//         fetch(`/search?search=${encodeURIComponent(searchInput)}&sort=${encodeURIComponent(sortValue)}`)
//             .then(response => response.json())
//             .then(data => {
//                 document.getElementById('search-results').innerHTML = data.resultsHtml;
//             });
//     }

//     // Ajouter listener pour recherche et tri
//     document.getElementById('search-input').addEventListener('input', loadProducts);
//     document.getElementById('sort').addEventListener('change', loadProducts);
// });

// document.addEventListener('click', function(event) {
//     if (event.target.matches('#pagination a')) {
//         event.preventDefault(); // Empêcher le lien de charger la page

//         // Récupérez le numéro de la page à partir de l'URL du lien cliqué
//         var pageUrl = new URL(event.target.href);
//         var page = pageUrl.searchParams.get('page') || 1; // Si le paramètre 'page' n'existe pas, 1 sera par défaut.

//         loadProducts(pageUrl.searchParams.get('search'), pageUrl.searchParams.get('sort'), pageUrl.searchParams.get('page'));
//     }
// });

// function loadProducts(searchQuery, sortOption,  page = 1) {
//     fetch(`/search?search=${encodeURIComponent(searchQuery || '')}&sort=${encodeURIComponent(sortOption || '')}&page=${encodeURIComponent(page || '')}`)
//         .then(response => response.json())
//         .then(data => {
//             document.getElementById('search-results').innerHTML = data.resultsHtml;
//             window.history.pushState({}, '', `?search=${searchQuery}&sort=${sortOption}&page=${page}`);
//         });
// }

// document.getElementById('search-input').addEventListener('input', function(event) {
//     loadProducts(event.target.value, document.getElementById('sort').value);
// });

// document.getElementById('sort').addEventListener('change', function(event) {
//     loadProducts(document.getElementById('search-input').value, event.target.value);
// });


// ===========================
// document.addEventListener('click', function(event) {
//     if (event.target.matches('#pagination a')) {
//         event.preventDefault();

//         // Récupérez le numéro de la page à partir de l'URL du lien cliqué
//         var pageUrl = new URL(event.target.href);
//         var page = pageUrl.searchParams.get('page') || 1; // Si le paramètre 'page' n'existe pas, 1 sera par défaut.

//         // Mise à jour pour utiliser les valeurs actuelles de la recherche et du tri
//         loadProducts(getSearchQuery(), getSortOption(), page);
//     }
// });

// // Modification: Ajout d'un paramètre par défaut 'page' pour la fonction loadProducts
// function loadProducts(searchQuery, sortOption, page = 1) {
//     // Mise à jour pour construire l'URL dynamiquement sans encodage manuel
//     let fetchUrl = `/search?search=${encodeURIComponent(searchQuery || '')}&sort=${encodeURIComponent(sortOption || '')}&page=${page}`;
    
//     fetch(fetchUrl)
//         .then(response => response.json())
//         .then(data => {
//             document.getElementById('search-results').innerHTML = data.resultsHtml;
//             // Modification: Mise à jour pour construire l'URL dynamiquement
//             updateUrl(searchQuery, sortOption, page);
//         });
// }

// // Fonctions pour récupérer les valeurs actuelles de la recherche et du tri
// function getSearchQuery() {
//     return document.getElementById('search-input').value || '';
// }

// function getSortOption() {
//     return document.getElementById('sort').value || '';
// }

// // Fonction pour mettre à jour l'URL
// function updateUrl(searchQuery, sortOption, page) {
//     let newUrl = `?search=${searchQuery}&sort=${sortOption}&page=${page}`;
//     window.history.pushState({}, '', newUrl);
// }

// document.getElementById('search-input').addEventListener('input', function(event) {
//     loadProducts(event.target.value, getSortOption());
// });

// document.getElementById('sort').addEventListener('change', function(event) {
//     loadProducts(getSearchQuery(), event.target.value);
// });

// ============================

document.addEventListener('click', function(event) {
    if (event.target.matches('#pagination a')) {
        event.preventDefault(); // Empêcher le lien de charger la page

        // Récupérez le numéro de la page à partir de l'URL du lien cliqué
        var pageUrl = new URL(event.target.href);
        var page = pageUrl.searchParams.get('page') || 1; // Si le paramètre 'page' n'existe pas, 1 sera par défaut.

        var searchQuery = document.getElementById('search-input').value;
        var sortOption = document.getElementById('sort').value;

        loadProducts(searchQuery, sortOption, page);
    }
});

function loadProducts(searchQuery, sortOption, page = 1) {
    var query = searchQuery || '';
    var sort = sortOption || '';
    var url = `/search?search=${encodeURIComponent(query)}&sort=${encodeURIComponent(sort)}&page=${encodeURIComponent(page)}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            document.getElementById('search-results').innerHTML = data.resultsHtml;
            updateUrl(query, sort, page);
        });
}

document.getElementById('search-input').addEventListener('input', function(event) {
    loadProducts(event.target.value, document.getElementById('sort').value);
});

document.getElementById('sort').addEventListener('change', function(event) {
    loadProducts(document.getElementById('search-input').value, event.target.value);
});

// Pour que les paramètres vides ("") ne s'affiche pas dans l'url
function updateUrl(searchQuery, sortOption, page) {
    let params = new URLSearchParams();

    // Ajouter le paramètre de recherche à l'URL seulement s'il n'est pas vide
    if (searchQuery) {
        params.append('search', searchQuery);
    }
    // Ajouter le paramètre de tri à l'URL seulement s'il n'est pas vide
    if (sortOption) {
        params.append('sort', sortOption);
    }
    // Toujours ajouter le paramètre de page car il a une valeur par défaut (1)
    params.append('page', page);

    let newUrl = `${window.location.pathname}?${params.toString()}`;
    window.history.pushState({}, '', newUrl);
}
