@extends('../layouts.app')

@section('content')
    @include('../amenu1')
    <br>
    @include('../mmenu')
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-md-11">
                @include('flash-message')
                <table class="table">
                    <thead>
                        <tr>
                            <th>Címzett</th>
                            <th>Tárgy</th>
                            <th>Üzenet</th>
                            <th>Létrehozva</th>
                            <th>Olvasva</th>
                            <th>Szerkeszt</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $message)
                            <tr>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->title }}</td>
                                <td><a class="btn btn-primary" data-toggle="collapse" href="#collapse{{ $message->mid }}" role="button" aria-expanded="false" aria-controls="collapse{{ $message->mid }}">Üzenet szövege</a></td>
                                <td>{{ $message->created_at }}</td>
                                <td>{{ $message->read }}</td>
                                <td>
                                    @if( $buttons == 1)
                                    <form method="GET" action="message/{{ $message->mid }}/edit">
                                    @else
                                    <form method="POST" action="message/{{ $message->mid }}">
                                        @method('DELETE')
                                    @endif
                                        @csrf
                                        <input type="hidden" name="m_id" value="{{ $message->mid }}">
                                        @if( $buttons == 1)
                                        <button type="submit" class="btn btn-danger"> {{ __('Szerkeszt') }}</button>
                                        @else
                                        <button type="submit" class="btn btn-danger"> {{ __('Törlés') }}</button>
                                        @endif
                                    </form>    
                                </td>
                            </tr>
                            <tr class="collapse" id="collapse{{ $message->mid }}">
                                <td colspan="6">{!! $message->body !!}</td>
                            </tr>    
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="offset-md-1"></div>
        </div>
    </div>
@endsection