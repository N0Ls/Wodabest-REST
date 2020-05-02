<section class="game-section">
    <div class="container-fluid pr-5 pl-5">
        <div class="row">
            @if($images->count() == $limit)
            <div class="offset-md-2 col-md-4">
                <form class="form-horizontal" id="form1">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="winner" id="{{ $images->first()->id }}"
                            value="{{ $images->first()->id }}"></input>
                        <input type="hidden" class="form-control" name="loser" id="{{ $images->last()->id }}"
                            value="{{ $images->last()->id }}"></input>
                    </div>
                    <div>
                        <button id="game-submit1" type="submit" class="portfolio-item text-center">
                            <img id="img1" src="{{ asset('../img/uploads/' . $images->first()->filename) }}">
                        </button>
                        <div class="portfolio-meta">
                            <h2 id="title1">{{ $images->first()->title }}</h2>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <form class="form-horizontal" id="form2">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="winner" id="{{ $images->last()->id }}"
                            value="{{ $images->last()->id }}"></input>
                        <input type="hidden" class="form-control" name="loser" id="{{ $images->first()->id }}"
                            value="{{ $images->first()->id }}"></input>
                    </div>
                    <div>
                        <button type="submit" class="portfolio-item text-center">
                            <img id="img2" src="{{ asset('../img/uploads/' . $images->last()->filename) }}">
                        </button>
                        <div class="portfolio-meta">
                            <h2 id="title2">{{ $images->last()->title }}</h2>
                        </div>
                    </div>
                </form>
            </div>
            @else
            <p>Pas assez d'images pour créer l'affichage.</p>
            @endif
        </div>
    </div>
</section>