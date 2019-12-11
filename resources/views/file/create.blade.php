@extends('../layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Fájl feltöltés') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="userid" class="col-md-4 col-form-label text-md-right">{{ __('Ügyfél neve') }}</label>

                                <div class="col-md-6">
                                        <select name="userid" id="userid" class="form-control">
                                                <option selected> Felhasználók </option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                        </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="filename" class="col-md-4 col-form-label text-md-right">{{ __('Fájlnév') }}</label>
    
                                <div class="col-md-6">
                                    <input id="filename" type="text" class="form-control" name="filename" required autocomplete="name" autofocus>
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Feltöltés') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection