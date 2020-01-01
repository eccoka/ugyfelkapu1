@extends('../layouts.app')

@section('content')
<script type="text/javascript" src="scripts/widgEditor.js"></script>
    @include('../amenu1')
    <br>
    @include('../mmenu')
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-md-11">
                @include('flash-message')
                <form method="post" action="{{ route('message.store') }}">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="m_user">Címzett</label>
                        <select class="form-control" name="m_user" id="m_user">
                            @foreach($users as $user)
                                @if ($user->role_id == 2)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="m_title">Tárgy</label>
                        <input id="m_title" class="form-control" type="text" name="m_title">
                    </div>
                    <div class="form-group">
                        <textarea id="noise" name="m_body" class="widgEditor nothing form-control"></textarea>
                    </div>
                    <button class="btn btn-primary mb-3" type="submit">Küldés</button>
                </form>
            </div>
            <div class="offset-md-1"></div>
        </div>
    </div>
@endsection