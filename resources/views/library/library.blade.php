@extends('template.template')
@section('content')

@auth
<div class="div-library-card " >

    <a href="https://drive.google.com/folderview?id=1C4mMKVMJ1uBXlFdbNufdS__uclpZUEB7" class="text-decoration-none">
        <div class="card rounded div-card-library" style="width: 18rem;margin: 1rem; padding: 1rem; height: 100%;">
            <div class="card-body">
                <h5 class="card-title text-decoration-none">مكتبه الكترونيه : </h5>
                <p class="card-text">مكتبة تضم اكثر من 3000 كتاب في مختلف المجالات والمواضيع . انضم الان </p>
            </div>
        </div>
    </a>

    <a href="{{route('library_topics')}}" class="text-decoration-none">
        <div class="card rounded div-card-library"  style="width: 18rem; margin: 1rem; padding: 1rem; height: 100%;">
                <div class="card-body">
                    <h5 class="card-title">المواضيع : </h5>
                    <p class="card-text">نتحدث عن جميع المواضيع التي تهتم بها . انضم الان</p>
                </div>
            </div>
    </a>

</div>
@endauth
@endsection
