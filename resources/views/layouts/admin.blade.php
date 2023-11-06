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
    @if(session('success'))
        <div role="alert">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif
    @if(!$errors->isEmpty())
        <div role="alert">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
    @endif
    @yield('content')
    <nav class="main-nav">
        <ul class="main-nav-list">
            <li class="main-nav-item">        
                <a href="#">
                    <figure class="container-icons-navbar active">
                        <img src="{{ asset('assets/icons/admin_users_icon.svg') }}" alt="Accueil">
                        <figcaption>utilisateurs</figcaption>
                    </figure>
                </a>
            </li>
            <li class="main-nav-item">        
                <a href="#">
                    <figure class="container-icons-navbar">
                        <img src="{{ asset('assets/icons/add_icon.svg') }}" alt="Recherche">
                        <figcaption class="icons-label">bouteilles</figcaption>
                    </figure>
                </a>
            </li>
            <li class="main-nav-item">
                <a href="#">
                    <figure class="container-icons-navbar">
                        <img src="{{ asset('assets/icons/admin_stats_icon.svg') }}" alt="Liste d'achats">
                        <figcaption>statistiques</figcaption>
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