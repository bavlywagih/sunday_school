<div class="post-actions mt-4 mb-3 d-flex items-center">
    @auth
        @if ($checkuser)
            <a href="{{$edit}}"   class="edit" ><i class="fa-solid fa-pencil text-dark p-2"></i></a>
            <a href="{{$delete}}" class="delete" ><i class="fa-solid fa-trash text-dark p-2"></i></a>
        @endif
    @endauth
        <input   style="display: none;" value="http://127.0.0.1:8000/post/{{$postlink}}" id="myInput{{$postlink}}">
        <button class="border-0 bg-white "  onclick="myFunction{{$postlink}}()">
            <i class="fa-solid fa-share"></i>
        </button>
</div>
<script>
function myFunction{{$postlink}}() {
  var copyText = document.getElementById("myInput{{$postlink}}");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  navigator.clipboard.writeText(copyText.value);
//   alert("Copied the text: " + copyText.value);
}
</script>
