@extends('masterout')
@section('title', 'Welcome')
@section('content')

<div class="container-fluid">

      <div class="row">

            <div class="offset-md-9 offset-lg-9 offset-xl-9 col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">

              @if (Route::has('login'))
                  <div class="text-right">
                      @auth
                        <br><br>
                        <a href="{{ url('/home') }}"><h3><i class="material-icons">home</i>Inicio</h3></a>
                      @else
                        <br><br>
                        <a href="{{ route('login') }}"><h3><i class="material-icons">fingerprint</i>Login</h3></a>
                      @endauth
                  </div>
              @endif

            </div>

      </div>

      <br><br><br><br>

      <div class="row justify-content-center">

            <div class="col-12">

                  <div  class="text-center d-none d-lg-block">

                      <p class="display-1">{{ config('catware.applargename') }}</p>

                  </div>

                  <div class="text-center d-lg-none">

                      <h1>{{ config('catware.applargename') }}</h1>

                  </div>

            </div>

      </div>

      <br><br>


<!--
      <div class="row justify-content-center">

            <div class="col-5 d-none d-lg-block">

                  <div>

                    <blockquote class="blockquote">

                      <ul>
                          <li>Lorem ipsum dolor sit amet</li>
                          <li>Consectetur adipiscing elit</li>
                          <li>Integer molestie lorem at massa</li>
                          <li>Facilisis in pretium nisl aliquet</li>
                      </ul>

                      <footer class="blockquote-footer">
                        Developer by <cite title="Source Title">Cat.DEV</cite>
                      </footer>

                    </blockquote>

                  </div>

            </div>

            <div class="d-lg-none">

                      <ul>
                          <li>Lorem ipsum dolor sit amet</li>
                          <li>Consectetur adipiscing elit</li>
                          <li>Integer molestie lorem at massa</li>
                          <li>Facilisis in pretium nisl aliquet</li>
                      </ul>

                      Developer by <cite title="Source Title">Cat.DEV</cite>

            </div>

      </div>
-->

</div>



@endsection
