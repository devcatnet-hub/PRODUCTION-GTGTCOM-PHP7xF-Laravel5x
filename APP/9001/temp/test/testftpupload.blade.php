@extends('masterin')
@section('title', 'Tester in View Mode')
@section('content')

<form method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <br />
    <br />
    <input type="file" name="photos[]" multiple />
    <br /><br />
    <input type="submit" value="Upload" />
</form>

@endsection
