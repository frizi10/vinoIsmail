<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Vino</title>
</head>
<body>
    <nav>
        <a href="#">
            <figure>
                <img src="" alt="Accueil">
                <figcaption>accueil</figcaption>
            </figure>
        </a>
        <a href="#">
            <figure>
                <img src="" alt="Recherche">
                <figcaption>recherche</figcaption>
            </figure>
        </a>
        <a href="#">
            <figure>
                <img src="" alt="Liste d'achats">
                <figcaption>liste</figcaption>
            </figure>
        </a>
        <a href="#">
            <figure>
                <img src="" alt="Celliers">
                <figcaption>celliers</figcaption>
            </figure>
        </a>
        <a href="#">
            <figure>
                <img src="" alt="Profil">
                <figcaption>profil</figcaption>
            </figure>
        </a>
    </nav>
    @yield('content')
</body>
</html>