@extends('layouts.app')

@section('title', 'Upload | Wodabest')

@section('content')

@component('components.title', ['title' => 'Uploader une image'])@endcomponent

{{--<section class="form-section">
    <div class="container">
        <div class="row">
            <div class="offset-sm-3 col-sm-6">

                {!! Form::open(['method' => 'STORE', 'action' => 'ImageController@store', 'enctype' =>
                'multipart/form-data']) !!}

                {{ Form::label('title', 'Titre du projet', ['class' => 'control-label']) }}
{{ Form::text('title', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Titre du projet']) }}

{{ Form::label('description', 'Description du projet', ['class' => 'control-label mt-3']) }}
{{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description du projet']) }}

@foreach ($categories as $category)
{{ Form::label('category_id', $category["name"], ['class' => 'control-label mt-3']) }}
{{ Form::radio('category_id', $category["id"]) }}
@endforeach

<!--{{ Form::label('image', 'Image', ['class' => 'custom-file-label']) }}-->
{{ Form::file('image', null, ['class' => 'custom-file-input']) }}

<div class="row justify-content-center mt-3">
    <div class="col-sm-6">
        <button type="submit" class="button w-100">Créer</button>
    </div>
</div>

{!! Form::close() !!}

</div>
</div>
</div>
</section>--}}

<div class="container mb-5">
    <div class="row">
        <div class="offset-sm-3 col-sm-6">

            <form id="uploadForm">

                <label for="title" class="control-label"></label>
                <input name="title" class="form-control form-control-lg" placeholder="Titre du projet">

                <label for="description" class="control-label mt-3"></label>
                <input name="description" class="form-control" placeholder="Description du projet">

                {{--@foreach ($categories as $category)
            {{ Form::label('category_id', $category["name"], ['class' => 'control-label mt-3']) }}
                {{ Form::radio('category_id', $category["id"]) }}
                @endforeach--}}

                <div id="categories" class="mt-3"></div>

                <div class="input-group mt-3">
                    <div class="custom-file">
                        <input name="file" type="file" class="custom-file-input" id="file"
                            aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choisissez un fichier</label>
                    </div>
                </div>

                <div class="row justify-content-center mt-3">
                    <div class="col-sm-6">
                        <button type="submit" class="button w-100">Créer</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection