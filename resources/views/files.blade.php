@extends('../layouts.app')

@section('content')
    @include('menu')
        <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="card col-md-11">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <th scope="col">Fájlnév</th>
                              <th scope="col">Létrehozva</th>
                              <th scope="col">Letöltés</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($files as $file)
                            <tr>
                                <td>{{ $file->filename }}</td>
                                <td>{{ $file->created_at }}</td>
                                <td><a href="{{ $file->filepath }}/{{ $file->filename }}" download>Letöltés</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            <div class="offset-md-1"></div>
            </div>
        </div>    
@endsection