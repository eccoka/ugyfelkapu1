@extends('layouts.app')

@section('content')
    @role('admin')
    @include('amenu1')
    <!-- You are logged in as {{ Auth::user()->name  }} --> 
    @endrole
@endsection
