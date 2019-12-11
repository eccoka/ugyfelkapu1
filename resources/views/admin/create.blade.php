@extends('layouts.app')

@section('content')
    @include('../amenu1')
    <br>
    @include('../amenu2')
    <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header">{{ __('Admin létrehozása') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.store') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="userid" class="col-md-4 col-form-label text-md-right">{{ __('Ügyfél neve') }}</label>
            
                                        <div class="col-md-6">
                                            <select name="user_id" id="user_id" class="form-control">
                                                <option selected> Felhasználók </option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Létrehoz') }}
                                                </button>
                                            </div>
                                        </div>
                            </form>
                        </div>
                    </div>   
                </div>
                <div class="col-md-1">
                </div>   
            </div>
        </div>
@endsection