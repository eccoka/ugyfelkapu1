@extends('../layouts.app')

@section('content')
    @include('flash-message')
    @include('menu')
    <br>
    <div class="container">
        @foreach ($messages as $message)
        <div class="row justify-content-center">
            <div class="card col-md-11">
                <div class="card-header"><h5 class="card-title">{{$message->title}}</h5></div>
                <div class="card-body">
                    <p class="card-text">{!! $message->body !!}</p>
                @if ($message->read == 0)
                    <form method="POST" action="{{ route('read.messages') }}">
                        @csrf
                        <input type="hidden" name="mid" value="{{$message->mid}}">
                        <button type="submit" class="btn btn-primary">
                            {{  __('Üzenetet elolvastam')}}
                        </button>    
                    </form>
                @endif

                 <span class="float-right">létrehozva: {{$message->created_at}}</span>
                </div>
            </div>
            <div class="offset-md-1"></div>
        </div>
        <br>
        @endforeach
    </div>
@endsection