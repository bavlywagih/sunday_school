@extends('template.template')
@section('content')
    <div>
        <x-forms.tinymce-editor/>
        <div class="posts-container" id="posts-container">
            @forelse($posts as $post)
                <x-posts.post :post="$post"></x-posts.post>
            @empty
                <x-posts.no-posts></x-posts.no-posts>
            @endforelse
        </div>
    </div>
@endsection
