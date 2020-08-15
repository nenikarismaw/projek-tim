@extends('adminlte.master')

@section('title', 'Edit Pertanyaan')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h1>Edit Pertanyaan</h1>

      <div class="card">
        <div class="card-body">

          @include('layouts.inc.messages')

          <form action="{{ route('pertanyaan.update', $question->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label>Judul</label>
              <input type="text" class="form-control" name="title" value="{{ old('title', $question->title) }}">
            </div>

            <div class="form-group">
              <label>Pertanyaan</label>
              <textarea class="ckeditor" id="content" name="content" rows="5">{{ old('content', $question->content) }}</textarea>
            </div>

            <div class="form-group">
              <label>Tag</label>
              <input type="text" class="form-control" name="tag" value="{{ old('tag', $question->tag) }}">
              <small class="form-text text-muted">Pisahkan tag dengan koma</small>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-outline-primary" href="{{ route('pertanyaan.show', $question->id) }}">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- CK EDITOR -->
<script type="text/javascript" src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
$(function() {
    $('#content').ckeditor({
        toolbar: 'Full',
        enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P
    });
});

    $("#inputFile").change(function(event) {
      fadeInAdd();
      getURL(this);
    });

    $("#inputFile").on('click',function(event){
      fadeInAdd();
    });

    function getURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        var filename = $("#inputFile").val();
        filename = filename.substring(filename.lastIndexOf('\\')+1);
        reader.onload = function(e) {
          debugger;
          $('#imgView').attr('src', e.target.result);
          $('#imgView').hide();
          $('#imgView').fadeIn(500);
          $('.custom-file-label').text(filename);
        }
        reader.readAsDataURL(input.files[0]);
      }
      $(".alert").removeClass("loadAnimate").hide();
    }

    function fadeInAdd(){
      fadeInAlert();
    }
    function fadeInAlert(text){
      $(".alert").text(text).addClass("loadAnimate");
    }
    CKEDITOR.replace('keterangan', {
    enterMode: Number(2),
    });

</script>
@endsection
