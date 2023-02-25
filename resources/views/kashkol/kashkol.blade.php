@extends('template.template')
@section('content')

<div class="card w-50 m-auto">
    <div class="card-body m-auto ">
        <a href="{{route('Kashkol.create')}}">
            <button type="button" class="btn btn-success">انشاء تحضير جديد</button>
        </a>
    </div>
</div>
@include('kashkol/kashkol_prop')

{{--
@foreach ($kashkols as $kashkol)
<h2>{{$kashkol->user->username}}</h2>
@endforeach --}}

@endsection
