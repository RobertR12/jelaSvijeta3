@extends('main')

@section('title', '| All Jela')

@section('content')

    <div class="row">

        <div class="col-md-6">
            <h1>All Jela</h1>
        </div>
        <div class="col-md-4">
            <a href="{{route('meals.create')}}" class="btn btn-lg btn-block btn-primary">Create new Jelo</a>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-10">

            <table class="table">
                <thead>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Kategorija</th>
                <th>Jezik</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th></th>
                </thead>
                <tbody>
                @foreach($mealsRepo as $meal)
                    <tr>
                        <th>{{ $meal->id }}</th>
                        <td>{{ $meal->title }}</td>
                        <td>{{ $meal->description }}</td>
                        <td>{{ $meal->category_id }}</td>
                        <td>{{ $meal->language_id }}</td>
                        <td>{{ date('j M, Y, H:i', strtotime($meal->created_at )) }}</td>
                        <td>{{ date('j M, Y, H:i', strtotime($meal->updated_at )) }}</td>

                        <td>
                            <a href="{{ route('meals.show', $meal->id) }}" class="btn btn-default btn-sm">View</a>
                            <a href="{{ route('meals.edit', $meal->id) }}" class="btn btn-default btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>


@endsection