@php
    $name = $library->user->username ;
    $usertopic = explode(" ", $name);
    $nameusertopic = $usertopic[0];
@endphp
<div class="post card w-50 m-auto mt-4 mobile-width rounded" >
    <div class="card-body">
        <div class="post-content ">
            <h5 class="card-title gap-2 my-2">
                <div class="post-content-d-flex">
                    <div class="username d-flex align-items-center gap-2">{{$nameusertopic}}</div>
                </div>
            </h5>
            <hr>
            <div class="fullbody">
                <h3 class="card-text text-secondary h5 ">{{$library->address}}</h3>
                <div class="library" id="library">
                    <p class="content">{{$library->content}}</p>
                    <button onclick="readMore(this)" type="button" class="btn btn-primary library">قراءه لمزيد</button>
                </div>
                

            </div>    
        </div>
    </div>
</div>

