<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/dox8qou.css">
    <link href="{{ asset('css/pagination.css') }}" rel="stylesheet">
    <title>Vino - @yield('title')</title>
    
</head>
<body>
    
      
            @yield('content')
       
            
    
    <nav class="main-nav">
        <ul class="main-nav-list">
            <li class="main-nav-item">        
                <a href="{{ route('welcome') }}">
                    <figure class="container-icons-navbar active">
                        <img src="{{ asset('assets/icons/home_icon.svg') }}" alt="Accueil">
                        <figcaption>accueil</figcaption>
                    </figure>
                </a>
            </li>
            <li class="main-nav-item">        
                <a href="{{ route('bouteille.index') }}">
                    <figure class="container-icons-navbar">
                        <img src="{{ asset('assets/icons/add_icon.svg') }}" alt="Recherche">
                        <figcaption class="icons-label">ajouter</figcaption>
                    </figure>
                </a>
            </li>
            <li class="main-nav-item">
                <a href="{{ route('liste.index') }}">
                    <figure class="container-icons-navbar">
                        <img src="{{ asset('assets/icons/list_icon.svg') }}" alt="Liste d'achats">
                        <figcaption>liste</figcaption>
                    </figure>
                </a>
            </li>
            <li class="main-nav-item">        
                <a href="{{ route('cellier.index') }}">
                    <figure class="container-icons-navbar">
                        <img src="{{ asset('assets/icons/cellars_icon.svg') }}" alt="Celliers">
                        <figcaption>celliers</figcaption>
                    </figure>
                </a>
            </li>
            <li class="main-nav-item">         
                <a href="#">
                    <figure class="container-icons-navbar">
                        <img src="{{ asset('assets/icons/profile_icon.svg') }}" alt="Profil">
                        <figcaption>profil</figcaption>
                    </figure>
                </a>
            </li>
        </ul>
    </nav>
    <script src="{{asset('assets/js/modalAjouter.js')}}" ></script>  

    <script src="{{asset('assets/js/sorting.js')}}"></script> 
    <script src="{{asset('assets/js/layoutApp.js')}}"></script> 
    <script src="{{asset('assets/js/index.js')}}"></script> 
    {{-- <script src="{{asset('assets/js/sorting.js')}}"></script>  --}}
     {{-- <script src="{{asset('assets/js/search.js')}}"></script>   --}}
     
    {{-- <script src="{{asset('assets/js/search.js')}}" ></script>  --}}
  

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Écoutez les changements dans le champ de recherche
            document.getElementById('search').addEventListener('input', function() {
                var route = document.getElementById('searchForm').getAttribute('action');
                var formData = new FormData(document.getElementById('searchForm'));
                var routeWithParams = route + '?' + new URLSearchParams(formData).toString();
                loadPage(routeWithParams);
            });

            // Fonction pour charger la page via une requête AJAX
            function loadPage(route) {
                fetch(route)
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById('app-container').innerHTML = html;
                    });
            }

            // Écoutez les clics sur les liens de bouteilles
            document.addEventListener('click', function(event) {
                if (event.target.classList.contains('bottle-link')) {
                    event.preventDefault();
                    var route = event.target.getAttribute('href');
                    loadPage(route);
                }
            });
        });
    </> --}}
    {{-- <script src="{{asset('assets/js/search.js')}}" ></script>   --}}
   
   
</body>
</html>







</body>
</html>
