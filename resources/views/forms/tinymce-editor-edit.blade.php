@if ($nameandrole)
<div style="width: 50%;margin: auto; " class="rounded div-round-tiym">
    <div class="m-2 tinymce-editor-create ">
        <h1 class="container text-center h1-tinymce-editor">صفحه تعديل المنشور </h1>
        <div>
            <form method="post" action="{{ $routepostid }}" class="form-new" id="create-post-form">
                @csrf
                <div class="w-50 m-auto mt-0 mobile-width div-tinymce-editor-create " >
                    <input type="hidden" name="user_id" value="{{$Authid}}">
                    <textarea id="post-editor"   name="body" class="text-end border" placeholder="{{$AuthUsername}} اكتب ما تفكر فيه هنا" cols="50">{!! $bodypost !!}</textarea>
                    <button type="submit" class="btn btn-primary w-100 mt-3 ">ارسال</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

