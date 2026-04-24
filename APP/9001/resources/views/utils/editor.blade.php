@extends('masterineditor')
@section('title', 'Tester in View Mode')
@section('content')

    </br>

    <form method="post">
      <textarea id="summernote" name="hola"></textarea>
    </form>

    <script type="text/javascript">

      $('#summernote').summernote({
              toolbar: [
              // [groupName, [list of button]]
              ['style', ['style','bold', 'italic', 'underline', 'clear']],
              ['font', ['strikethrough', 'superscript', 'subscript']],
              ['fontsize', ['fontsize']],
              ['color', ['color']],
              ['para', ['ul', 'ol', 'paragraph']],
              ['height', ['height']],
              ['insert', ['picture','link','video','table','hr']],
              ['misc', ['fullscreen','codeview','undo','redo','help']]
              ],
        lang: 'es-ES',
        tabsize: 2,
        height: 200
      });
    </script>

@endsection
