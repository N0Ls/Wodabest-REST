@extends('layouts.app')

@section('title', 'Game | Wodabest')

@section('content')

@component('components.title', ['title' => 'Jeu'])@endcomponent

{{--
@if(count($images) == 2)
@component('components.filter', ['images' => $images, 'categories' => $categories,'path' => $path])@endcomponent
@endif--}}
<div class="container">
    <ul class="portfolio-filter">
        <li>Aucune catégorie à afficher.<li>
    </ul>
</div>

<section class="game-section">
    <div class="container-fluid pr-5 pl-5">
        <div class="row">
            <div class="offset-md-2 col-md-4">
                <form class="form-horizontal" id="form1">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="winner" id=""
                            value=""></input>
                        <input type="hidden" class="form-control" name="loser" id=""
                            value=""></input>
                    </div>
                    <div>
                        <button id="game-submit1" type="submit" class="portfolio-item text-center">
                            <img id="img1" src="">
                        </button>
                        <div class="portfolio-meta">
                            <h2 id="title1"></h2>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <form class="form-horizontal" id="form2">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="winner" id=""
                            value=""></input>
                        <input type="hidden" class="form-control" name="loser" id=""
                            value=""></input>
                    </div>
                    <div>
                        <button type="submit" class="portfolio-item text-center">
                            <img id="img2" src="">
                        </button>
                        <div class="portfolio-meta">
                            <h2 id="title2"></h2>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

{{--@component('components.gallery.gameGallery', ['images' => $images, 'limit' => $limit])@endcomponent--}}

@stop