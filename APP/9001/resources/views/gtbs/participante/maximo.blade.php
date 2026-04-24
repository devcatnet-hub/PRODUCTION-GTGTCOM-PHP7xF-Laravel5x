@extends('mastergtbs')
@section('title', 'Tema sin cupo')
@section('content')

<div class="container-fluid">

    </br></br>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-dark">

                <![[[[[[[[[[[[[[[[[[[[[[[[[[FORM]]]]]]]]]]]]]]]]]]]]]]]]]]>
                <div class="card-body">

                    <form method="POST"  class="was-validated">
                        @csrf

                              <![[[[[HEADER]]]]]>

                              <div class="card-header border-dark">

                                  <h2 class="text-dark">
                                        Grant Thornton - Business School
                                  </h2>
                                  <h3 class="text-dark">
                                        Tema: {{$tema->tema}}
                                  </h3>
                                  <h3 class="text-dark">
                                        Lo sentimos pero ya no hay cupo para este tema, lo invitamos seguirnos en nuestras redes sociales para estar al tanto de nuestros próximos eventos.
                                  </h3>

                              </div>

                              </br>

                    </form>

                </div>
                <![[[[[[[[[[[[[[[[[[[[[[[[[[FORM]]]]]]]]]]]]]]]]]]]]]]]]]]>

            </div>
        </div>
    </div>

</div>

</br></br>

@endsection