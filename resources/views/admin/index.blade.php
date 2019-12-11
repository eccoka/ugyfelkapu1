
@extends('../layouts.app')

@section('content')
    @include('../amenu1')
    <br>
    <div class="container">
        <div class="row justify-content-centre">
            <div class="card col-md-11">
                <div class="card-body">

                        @foreach ($users as $user)
                            <tr>
                                <th scope="row"> {{$user->id}} </th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->tel }}</td>
                                <td>{{ $user->role_id }}</td>
                            </tr>
                        @endforeach    
                </div>
            </div>
            <div class="offset-md-1"></div>
        </div>
    </div>    
@endsection