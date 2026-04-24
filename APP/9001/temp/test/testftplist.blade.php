@extends('masterin')
@section('title', 'Tester in View Mode')
@section('content')

</br>

    @foreach ($files as $key => $value)
        <p> Key: {{ $key }} : Value: {{ $value }}</p>
    @endforeach

@endsection
