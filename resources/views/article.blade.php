@extends('layouts.app')

@section('title',$article->title)

@section('content')

<div class="card shadow">

@if($article->thumbnail)

<img src="{{ asset('storage/'.$article->thumbnail) }}"
     class="card-img-top">

@endif

<div class="card-body">

<span class="badge bg-primary">

{{ $article->category->name }}

</span>

<h2 class="mt-3">

{{ $article->title }}

</h2>

<p class="text-muted">

Ditulis oleh

<strong>{{ $article->user->name }}</strong>

|

{{ $article->created_at->format('d M Y H:i') }}

</p>

<hr>

{!! nl2br(e($article->content)) !!}

</div>

</div>

@endsection