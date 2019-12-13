
@extends('../layouts.app')

@section('content')
    @include('../amenu1')
    <div class="container">
        <div class="card col-md-11 mt-5">
        @foreach ($users as $user)
            @if ($user->role_id == 2)
            <div class="row justify-content-centre p-1 border-top">
                <div class="col-md-1 mt-1">{{ $user->id }}</div>
                <div class="col-md-2">{{ $user->name }}</div>
                <div class="col-md-3">{{ $user->email }}</div>
                <div class="col-md-2">{{ $user->tel }}</div>
                <div class="col-md-2">
                    <form method="POST" action="{{ route('admin.store') }}">
                        @csrf
                        <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Legyen Admin') }}
                        </button>
                    </form>     
                </div>
                <div class="col-md-2">
                    <form method="POST" action="{{ route('admin.destroy') }}">
                        @csrf
                        <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">
                        <button type="submit" class="btn btn-danger">
                            {{ __('Ügyfél törlés') }}
                        </button>
                    </form> 
                </div>                         
            </div>
            @endif
        @endforeach 
        </div>
        <div class="card col-md-11 mt-5">
            @foreach ($users as $user)
                @if ($user->role_id == 1)
            <div class="row justify-content-centre p-1 border-top">    
                <div class="col-md-1">{{$user->id}}</div>
                <div class="col-md-2">{{ $user->name }}</div>
                <div class="col-md-3">{{ $user->email }}</div>
                <div class="col-md-2">{{ $user->tel }}</div>
                <div class="col-md-2"> Adminisztrátor </div>
                <div class="col-md-2">
                    <form method="POST" action="{{ route('admin.store') }}/{{ $user->id }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">
                        <button type="submit" class="btn btn-danger">
                            {{ __('Admin törlés') }}
                        </button>
                    </form>
                </div>
            </div>
                @endif
            @endforeach    
        </div>   
        <div class="offset-md-1"></div>
    </div>    
@endsection