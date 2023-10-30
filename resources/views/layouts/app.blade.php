<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/dox8qou.css">
    <title>Vino - @yield('title')</title>
</head>
<body>
    @yield('content')
    <nav class="main-nav">
        <ul class="main-nav-list">
            <li class="main-nav-item">        
                <a href="#">
                    <figure class="container-icons-navbar active">
                        <img src="{{ asset('assets/icons/home_icon.svg') }}" alt="Accueil">
                        <figcaption>accueil</figcaption>
                    </figure>
                </a>
            </li>
            <li class="main-nav-item">        
                <a href="#">
                    <figure class="container-icons-navbar">
                        <img src="{{ asset('assets/icons/add_icon.svg') }}" alt="Recherche">
                        <figcaption class="icons-label">ajouter</figcaption>
                    </figure>
                </a>
            </li>
            <li class="main-nav-item">
                <a href="#">
                    <figure class="container-icons-navbar">
                        <img src="{{ asset('assets/icons/list_icon.svg') }}" alt="Liste d'achats">
                        <figcaption>liste</figcaption>
                    </figure>
                </a>
            </li>
            <li class="main-nav-item">        
                <a href="#">
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
</body>
</html>