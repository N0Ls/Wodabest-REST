@extends('layouts.app')

@section('title', 'Upload | Wodabest')

@section('content')

@component('components.title', ['title' => 'Éditer une image'])@endcomponent

<section class="form-section">
    <div class="container">
        <div class="row">
            <div class="offset-sm-3 col-sm-6">
                <form id="editForm">
                    <label for="title" class="control-label"></label>
                    <input name="title" placeholder="Titre du projet" class="form-control form-control-lg">
                    <label for="description"></label>
                    <textarea name="description" placeholder="Description du projet" class="form-control"></textarea>
                    <div class="row justify-content-center mt-3">
                        <div class="col-sm-6">
                            <button type="submit" class="button w-100">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection