@extends('layouts.app')

@section('title', 'Game | Wodabest')

@section('content')

@component('components.title', ['title' => 'Le titre de l\'image'])@endcomponent

{{--@component('components.gallery.statsgallery')@endcomponent

@component('components.details', ['image' => $image])@endcomponent

@component('components.comments.comments', ['image' => $image, 'comments' => $comments])@endcomponent--}}

@stop