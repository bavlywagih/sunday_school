<div class="card  m-auto mt-2  kashkol-create-d-mt w-50 h-50 rounded" >
    <div class="kashkol-create-b-g-r-d rounded ">
        <h2 class="m-3 kashkol-create-color">انشاء مواضيع جديده</h2>
    </div>
    <div class="card-body">
        <form action="{{route('library.create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <div class="mb-3">
                <label for="address" class="form-label ">العنوان</label>
                <input type="text" placeholder="اكتب عنوان الدرس هنا" name="address" class="form-control input-form-kashkol" id="address" >
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">المحتوي</label>
                <textarea id="content" placeholder="اكتب المحتوي هنا" name="content" rows="5" cols="30" class="form-control textarea-Kashkol"></textarea>
            </div>
            <button class="btn btn-success w-50 m-auto d-block"  type="submit">ارسال</button>
        </form>
    </div>
</div>