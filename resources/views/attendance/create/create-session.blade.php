@extends('template.template')
@section('content')
    <div class="div-create-session" >
        <form method="POST" action="{{route('create-session')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-5" id="createSessionLabel">انشاء درس</h2>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="session-title" class="form-label">
                                <i class="fa-solid fa-signature"></i>
                                اسم الدرس
                            </label>
                            <input type="text" name="title" class="form-control" id="session-title">
                        </div>
                        <div class="mb-3">
                            <label for="session-title" class="form-label">
                                <i class="fa-solid fa-person-chalkboard"></i>
                                الدرس
                            </label>
                            <div class="form-floating">
                                <textarea id="post-editor"  name="body" class="text-end" placeholder="اكتب الدرس هنا " style="height: 100px"></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <i class="fa-solid fa-list-ol"></i>
                            <label for="session-title" class="form-label">اهم النقاط في الدرس</label>
                            <div class="form-floating">
                                <textarea  name="point" class="text-end w-100" placeholder="اكتب اهم النقاط  هنا"></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <i class="fa-solid fa-file-image"></i>
                            <label for="formFile"> ارفاق صوره</label>
                            <input class="form-control" name="file" type="file" id="formFile" multiple>
                        </div>
                        <i class="fa-solid fa-hospital-user"></i>
                        <label for="grade" class="form-label">الفصل</label>
                        <select class="form-select" id="grade" name="grade_id">
                            <option selected value="0">اختار الفصل</option>
                            @foreach($grades as $grade)
                                <option value="{{ $grade->id }}">{{ $grade->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer ms-3" style="justify-content: flex-start">
                        <button type="sumit" class="btn btn-success ">حفظ</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
