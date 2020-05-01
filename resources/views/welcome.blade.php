<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wodabest</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body>
    <div class="entry">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end">
                    <h1>Bienvenue sur Wodabest</h1>
                    <hr class="divider my-4" />
                </div>
                @if (Route::has('login'))
                @guest
                <div class="col-lg-8 align-self-baseline mb-1">
                    <p class="mb-5">Entrez dans la compétition en affrontant les étudiants les plus créatifs.</p>
                    <a href="{{ route('login') }}" class="button">S'authentifier</a>
                </div>
                @if (Route::has('register'))
                <div class="col-lg-8 align-self-baseline">
                    <p class="info" class="mb-5">Pas encore inscrit ? <a href="{{ route('register') }}"
                            class="info-link">Inscrivez-vous !</a></p>
                </div>
                @endif
                @else
                <div class="col-lg-8 align-self-baseline mb-1">
                    <p class="mb-5">{{ Auth::user()->name }}, vous êtes connecté.</p>
                    <a href="{{ route('login') }}" class="button w-80">Continuer</a>
                </div>
                @endguest
                @endif
            </div>
        </div>
    </div>
</body>

</html>