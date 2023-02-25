@extends('template.template')
@section('content')

    <div class="card  m-auto mt-4 card-create-info-div" style="width: 90% ;" >
        <div class="card-body m-auto">
            <h2 >
                اضافه بعض المعلومات
            </h2>
        </div>
        <div>
            <form action="{{route('information_update' , $user->id )}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="address" class="form-label" style="padding-right: 65px;">عنوان المنزل:</label>
                    <input type="text" style="width: 90% ; "  class="form-control m-auto" id="address" name="address"   @if($user->address == 0) placeholder="لا يوجد عنوان المنزل هنا "@else value=" {{$user->address}} " @endif >
                </div>
                <div class="mb-3">
                    <label for="facebook" class="form-label" style="padding-right: 65px;">الفيسبوك:</label>
                    <input type="url"  style="width: 90% ;"  class="form-control m-auto"  id="facebook" name="facebook" @if($user->facebook == 0) placeholder="لا يوجد رابط فيسبوك هنا "@else value=" {{$user->facebook}} " @endif >
                </div>
                <div class="mb-3">
                    <label for="nu_father" class="form-label" style="padding-right: 65px;">رقم ولى الامر:</label>
                    <input type="text"  style="width: 90% ;"  class="form-control m-auto" id="nu_father" name="nu_father" @if($user->nu_father == 0) placeholder="لا يوجد رقم ولي امر هنا "@else value=" {{$user->nu_father}} " @endif>
                </div>
                <div class="mb-3">
                    <label for="our_father" class="form-label" style="padding-right: 65px;">اسم اب الاعتراف:</label>
                    <input type="text"  style="width: 90% ;"  class="form-control m-auto" id="our_father" name="our_father" @if($user->our_father == 0) placeholder="لا يوجد اسم اب اعتراف هنا "@else value=" {{$user->our_father}} " @endif>
                </div>
                <div class="mb-3 ">
                    <div style="display: flex; justify-content: center;">
                        <button type="submit" class="btn btn-success w-50 ">Success</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
