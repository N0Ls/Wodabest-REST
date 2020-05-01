@extends('layouts.app')

@section('content')

<!-- banner part start-->
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-xl-6">
                <div class="banner_text">
                    <div class="banner_text_iner">
                        <h1>{{ date('H') <= 18 ? 'Bonjour' : 'Bonsoir' }} <span
                                class="banner_text_iner_name">{{ Auth::user()->name }}<span></h1>
                        <p>Uploadez vos plus beaux projets artistiques et entrez dans la compétition en affrontant les
                            étudiants les plus créatifs. Pensez à aller jeter un coup d'oeil aux statistiques et aux
                            classements.
                        </p>
                        <a id="game-link" class="button">Jouer</a>
                        <div class="banner_item">
                            <div class="single_item">
                                <h1 id="nb-users"></h1>
                                <h5>Utilistateurs</h5>
                            </div>
                            <div class="single_item">
                                <h1 id="nb-images"></h1>
                                <h5>Projets</h5>
                            </div>
                            <div class="single_item">
                                <h1 id="nb-games"></h1>
                                <h5>Matchs joués</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection