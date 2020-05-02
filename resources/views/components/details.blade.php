<section class="details-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <figure class="pic-frame">
                    <img src="../../img/uploads/{{ $image->filename }}" alt="">
                </figure>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <p>{{ $image->description }}</p>
                <div class="row mt-5 text-center">
                    <div class="col-md-4">
                        <div class="milestone">
                            <h2>{{ $image->wins +  $image->losses}}<span>Matchs</span></h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="milestone">
                            <h2>{{ $image->wins }}<span>Victoires</span></h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="milestone">
                            <h2>{{ $image->losses }}<span>Défaites</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>