@extends('template.template')
@section('content')
    <h1 class="text-center h1-post-id">منشور ل {{$post->user->username}}</h1>
    <x-posts.post :post="$post"></x-posts.post>
@endsection


