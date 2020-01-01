@extends('../layouts.app')

@section('content')
    @include('../amenu1')
    <br>
    @include('../fmenu1')
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-md-11">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th scope="col">Fájlnév</th>
                          <th scope="col">Létrehozva</th>
                          <th scope="col">Név</th>
                          <th scope="col">Törlés</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->filename }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <form method="POST" action="file/{{ $user->fid }}">
                                        @csrf
                                        @method('DELETE')
                                <input type="hidden" name="u_id" value="{{ $user->id }}">
                                <input type="hidden" name="f_name" value="{{ $user->filename }}">
                                <input type="hidden" name="f_id" value="{{ $user->fid }}">
                                <button type="submit" class="btn btn-danger"> {{ __('Törlés') }}</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="offset-md-1"></div>
        </div>
    </div>    
@endsection