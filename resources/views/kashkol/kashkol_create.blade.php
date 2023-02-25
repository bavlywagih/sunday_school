@extends('template.template')
@section('content')
<style>
    .textarea-Kashkol{
        background-image: url(https://www.almaqalah.com/theme/simpleX/img/note.png);
        border: 1px solid #c3e8f4;
        border-radius: 5px;
        box-shadow: 0 0 0 4px #f0fbff;
        box-sizing: border-box;
        color: #111;
        padding: 5px 10px;
        width: 100%;
    }
</style>
<div class="card w-75 m-auto mt-2  kashkol-create-d-mt">
    <div class="kashkol-create-b-g-r-d">
        <h2 class="m-3">انشاء تحضير جديد</h2>
    </div>
    <div class="card-body">
        <form action="{{route('Kashkol.create.post')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <div class="mb-3">
                <label for="address" class="form-label ">العنوان</label>
                <input type="text" name="address" class="form-control input-form-kashkol" id="address" >
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">المحتوي</label>
                <textarea id="content" name="content" rows="10" cols="30" class="form-control textarea-Kashkol"></textarea>
            </div>
            <div class="mb-3" style="display: flex;flex-direction: row; align-items: center;">
                <label class="select-file mt-2" for='image_src' role="button">
                    <input class="form-control custom-file-input   "  name="file" type="file" id="image_src" multiple>
                </label>
                <label for="image_src" role="button"> ارفاق ملف</label>
            </div>
            <button class="btn btn-success w-50 m-auto d-block  bg-transparent border-0 bu-kashkol-create" type="submit">ارسال</button>
        </form>
    </div>
</div>
@endsection
