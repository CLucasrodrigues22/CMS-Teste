@extends('layouts.app')

@section('content')
@auth
<home-component></home-component>
@endauth
@endsection
