
<div class="card">
    <div class="card-body">
        <div class="d-flex flex-column align-items-center text-center">
            @if($adminRole)
                <div class="btn-profile">
                    <a href="{{ route('edit.profile') }}" class="btn btn-primary">تعديل</a>
                </div>
            @endif
                <div class="litter litter-profile" >
                    <span>{{$litterAuth}}</span>
                    @if($adminRole)
                        <div class="card-title d-flex align-items-center gap-2 " title="مشرف في الموقع ">
                            <span class="material-symbols-outlined icon-admin-profile rounded-circle">
                                <i class="fa-solid fa-check text-blue"></i>
                            </span>
                        </div>
                    @else
                        <div class=" d-flex align-items-center gap-2 user-admin " title="مستخدم في الموقع ">
                            <i class="fa-regular fa-user icon-user-profile rounded-circle person" style="font-size: 43px !important;width: 64px;height: 64px;"></i>
                        </div>
                    @endif
                </div>
        </div>
    </div>
</div>
