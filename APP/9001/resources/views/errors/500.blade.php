@extends('masterout')
@section('title', '500')
@section('content')

<div class="container">

    <div class="row justify-content-center align-items-center catware-div-height">
        <div class="col-md-7">

            <h1 class="display-1">{!! GetHTML::Icons('backspace') !!} Whoops!</h1></br>
            <h1 class="display-4">Mala suerte, parece que algo ha ido muy mal... </h1>
            <p></p>

        </div>
    </div>
</div>

@endsection