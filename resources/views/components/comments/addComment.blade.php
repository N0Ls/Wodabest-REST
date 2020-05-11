{{-- Form to add to add new comment --}}
<div>
    {!! Form::open(['route' => ['comments.store', $image->id], 'method' => 'POST']) !!}

    {{ Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Ajoutez votre commentaire']) }}

    <div class="row justify-content-center mt-3">
        <div class="col-sm-6">
            <button type="submit" class="button w-100">Poster</button>
        </div>
    </div>

    {!! Form::close() !!}
</div>