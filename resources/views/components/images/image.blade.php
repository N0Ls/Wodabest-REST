<div class="mix col-md-6 col-lg-3">
    <a href="{{ route('images.show', $image->id) }}" class="portfolio-item text-center">
        <img src="../img/uploads/{{ $image->filename }}">
        <div class="pi-inner">
            <h2>Voir +</h2>
        </div>
    </a>
    <div class="portfolio-meta">
        <h2>{{ $image->title }}</h2>
        <p>par {{ $image->user->name }}</p>
    </div>
</div>