@extends('template.template')
@section('content')
    @include('library/library_topics_new')
    @foreach ($librarys as $library)
    {{-- @dd($library) --}}
    @include('library/library_topics_content')
    @endforeach
    

<script>
    let noOfCharac = 150;
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
    let library = btn.parentElement;
    library.querySelector(".dots").classList.toggle("hide");
    library.querySelector(".more").classList.toggle("hide");
    btn.textContent == "قراءه لمزيد" ? btn.textContent = "أقرأ أقل" : btn.textContent = "قراءه لمزيد";
    }
</script>

@endsection
