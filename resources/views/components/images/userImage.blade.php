<div class="mix col-md-6 col-lg-3">
    <a href="{{ route('images.show', $image->id) }}" class="portfolio-item text-center">
        <img src="../img/uploads/{{ $image->filename }}">
        <div class="pi-inner">
            <h2>Voir +</h2>
        </div>
    </a>
    <div class="portfolio-edit">
        <a href="{{ route('images.edit', $image->id) }}" class="rkmd-btn btn-fab-mini btn-dark"><span
                class="fa fa-pencil"></span></a>
        {!! Form::open(['route' => ['images.destroy', $image->id], 'method' => 'DELETE']) !!}
        <button class="rkmd-btn btn-fab-mini btn-pink"><span class="fa fa-trash"></span></button>
        {!! Form::close() !!}
    </div>
    <div class="portfolio-meta">
        <h2>{{ $image->title }}</h2>
        <p>par {{ $image->user->name }}</p>
    </div>
</div>