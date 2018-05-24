@extends('main');

@section('title', '| View Meals');

@section('content');

<div class="row">
    <div class="col-md-6">

        <div class="col-md-10">

            <table class="table">
                <thead>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Kategorija</th>
                <th></th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th>{{ $user->Id }}</th>
                        <td>{{ $user->First_name }}</td>
                        <td>{{ $user->Last_name }}</td>
                        <td>{{ $user->Email }}</td>
                        <td>{{ $user->Email }}</td>
                        <td> {{$user->lokacija->Title}}</td>
                        <td>{{ date('j M, Y, H:i', strtotime($user->created_at )) }}</td>
                        <td>{{ date('j M, Y, H:i', strtotime($user->updated_at )) }}</td>

                        <td>
                            <a href="{{ route('user.show', $user->Id) }}" class="btn btn-default btn-sm">View</a>
                            <a href="{{ route('user.edit', $user->Id) }}" class="btn btn-default btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection



