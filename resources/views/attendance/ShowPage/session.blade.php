@extends('template.template')
@section('content')
    <div class="card m-2 session-card" >
        <div class="card-body">
            <div class="d-flex justify-content-between ">
                <h2>  اسم الدرس : <span> {{ $sessions->title }}</span>   </h2>
                <div class="dropdown"  >
                    <button class="border-0 bg-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="material-symbols-outlined">more_vert</span>
                    </button>
                    <ul class="dropdown-menu">
                        @if (Auth::user()->role == '1')<li><a class="dropdown-item text-end" href="#">تعديل</a></li>@endif
                        <input  style="display: none;" value="http://127.0.0.1:8000/session/{{$sessions->id}}" id="myInput{{$sessions->id}}">
                        <button class="border-0 bg-white w-100 padding-0   "  onclick="myFunction{{$sessions->id}}()"><li><a class="dropdown-item text-end" href="#">مشاركه</a></li></button>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="accordion" id="accordionExample">
            @if($sessions->file != '' )
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingfive"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="true" aria-controls="collapsefive">صوره الدرس</button></h2>
                    <div id="collapsefive" class="accordion-collapse collapse " aria-labelledby="headingfive" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div><img src="http://127.0.0.1:8000\{{ $sessions->file }}" style="width: 50%;margin: auto;display: block;"></div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne"><button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">الدرس</button></h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body kashkol">
                            <div class="card-body content"><p>{!! $sessions->body !!}</p></div>
                            <button onclick="readMore(this)" type="button" class="btn btn-primary">قراءه لمزيد</button>
                        </div>
                    </div>
                </div>
                @php $attendedUsersIds = [] @endphp
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">الحضور</button></h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @forelse ($sessions->attentances as $attentance)
                                {{  $attentance->user->username }} <br>
                                @php array_push($attendedUsersIds, $attentance->user->id) @endphp
                            @empty
                                لا يوجد حضور
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">الغياب</button></h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @forelse ($sessions->grade->users->whereNotIn('id', $attendedUsersIds)->whereNotNull('grade_id') as $user)
                                {!! $user->username !!} <br>
                            @empty
                                لا يوجد غياب
                            @endforelse
                        </div>
                    </div>
                </div>
                @php $attendedUsersIds = [] @endphp
            </div>
            <br>
            <div class="d-flex justify-content-between ">
                <h2>  اهم نقاط الدرس    </h2>
                <br>
                <br>
            </div>
            <h3> {{ $sessions->point }}</h3>

        </div>
    </div>
    <script>
        function myFunction{{$sessions->id}}() {
            var copyText = document.getElementById("myInput{{$sessions->id}}");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.value);
            alert("Copied the text: " + copyText.value);
        }
        let noOfCharac = 700;
        let contents = document.querySelectorAll(".content");
        contents.forEach(content => {
            if(content.textContent.length < noOfCharac){
                content.nextElementSibling.style.display = "none";
            }
            else{
                let displayText = content.textContent.slice(0,noOfCharac);
                let moreText = content.textContent.slice(noOfCharac);
                content.innerHTML = `${displayText}<span class="dots">...</span><span class="hide more">${moreText}</span>`;
            }
        });

        function readMore(btn){
            let kashkol = btn.parentElement;
            kashkol.querySelector(".dots").classList.toggle("hide");
            kashkol.querySelector(".more").classList.toggle("hide");
            btn.textContent == "قراءه لمزيد" ? btn.textContent = "أقرأ أقل" : btn.textContent = "قراءه لمزيد";
        }

    </script>
@endsection
