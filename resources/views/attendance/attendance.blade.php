@extends('template.template')
@section('content')
    @auth
        <div class="container">
            <div class="row justify-content-center attendance-div-cont">
                <div class="col-md-8 attendance-div-col">
                    <div class="card attendance-div-card">
                        <div class="card-body attendance-div-card-body">
                            @if (Auth::user()->role != 0  )
                                <x-attendance.Create.CreateGrade></x-attendance.Create.CreateGrade>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createGrade">
                                    انشاء فصل
                                </button>
                                <a href="{{route('create_session')}}" class="text-decoration-none">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createSession">
                                        انشاء درس
                                    </button>
                                </a>
                                @include('attendance/create/collectAttendance')
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#collectAttendance">
                                    وضع الحضور
                                </button>
                            @endif
                            <div class="d-flex align-items-start mt-3 attendance-div-prop">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active" id="v-pills-grades-tab" data-bs-toggle="pill" data-bs-target="#v-pills-grades" type="button" role="tab" aria-controls="v-pills-grades" aria-selected="true">الفصول</button>
                                    @if (Auth::user()->role != '0' )
                                        <button class="nav-link" id="v-pills-users-tab" data-bs-toggle="pill" data-bs-target="#v-pills-users" type="button" role="tab" aria-controls="v-pills-users" aria-selected="false">الاشخاص</button>
                                    @endif
                                </div>
                                <div class="tab-content w-100" id="v-pills-tabContent">
                                    @include('attendance/show/grade')
                                    @if (Auth::user()->role != '0' )
                                        @include('attendance/show/users')
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
