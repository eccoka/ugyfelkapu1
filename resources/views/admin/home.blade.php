@extends('layouts.app')

@section('content')
<div class="container">
    @role('admin')
    <div class="row justify-content-center">
        <div class="col-md-12"><h2>Admin Dashboard</h2></div>
    </div>
    <div class="row" style="font-size: 2rem;">
        <div class="card col-md-3">
            <div class="card-body">
                <i class="fas fa-user" ></i>
                <div class="card-title">User admin</div>
            </div>
        </div>
        <div class="card col-md-3 offset-md-1">
            <div class="card-body">
                <i class="fas fa-file"></i>
                <div class="card-title">Fájl admin</div>
            </div>
        </div>
        <div class="card col-md-3 offset-md-1">
            <div class="card-body">
                <i class="fas fa-envelope"></i>
                <div class="card-title">Üzenet admin</div>
            </div>
        </div>
    </div>
    <!-- You are logged in as {{ Auth::user()->name  }} -->
    @endrole    
</div>
@endsection
