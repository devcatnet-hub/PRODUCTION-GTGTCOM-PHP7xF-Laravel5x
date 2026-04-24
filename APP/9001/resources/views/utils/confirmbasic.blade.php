@extends('masterin')
@section('title', 'Verificar Accion')
@section('content')

<div class="container-fluid">

    </br></br>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card card-default">
                <div class="card-header"><h3 class="text-danger">{!! GetHTML::Icons($data['icon']) !!} {!!$data['title']!!}</h3></div>

                <div class="card-body">
                    <form method="POST" target="_blank">
                        @csrf

                        <!- Form Group #1 ----------------------------------------------------------------------------------–>
                        <div class="form-row">

                          <div class="col-md-1"></div>

                          <div class="col-md-10">
                              <div class="p-3 mb-2 bg-danger text-white">{!!$data['message']!!}</div>
                          </div>

                          <div class="col-md-1"></div>

                        </div>

                        </br>

                        <!- Form Group #1 ----------------------------------------------------------------------------------–>
                        <div class="form-row">

                          <div class="col-md-1"></div>

                          <div class="col-md-10">

                            @if($data['cancel'] == 'back')
                                <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
                            @else

                            @endif

                            @if($data['confirm'] == 'null')

                            @else
                                <a class="btn btn-danger" href="{!!$data['confirm']!!}"
                                  {!! GetHTML::Tooltip($data['delete']) !!}>
                                  {!! GetHTML::Icons($data['deleteicon']) !!} {!!$data['delete']!!}
                                </a>
                            @endif
                          </div>

                        </div>

                        </br>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

</br></br>

@endsection
