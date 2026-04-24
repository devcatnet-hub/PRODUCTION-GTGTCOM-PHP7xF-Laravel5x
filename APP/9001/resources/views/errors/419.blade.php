@extends('masterout')
@section('title', '419')
@section('content')

<div class="container">

    <div class="row justify-content-center align-items-center catware-div-height">
        <div class="col-md-7">

            <h1 class="display-1">{!! GetHTML::Icons('backspace') !!} Whoops!</h1></br>
            <h1 class="display-4">Error 419: La pagina ha expirado <a href="/home">[Home]</a>.</h1>
            <p></p>

        </div>
    </div>
</div>

@endsection
