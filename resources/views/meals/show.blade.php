@extends('main')

@section('title', '| View Meals')

@section('content')

<div class="row">
    <div class="col-md-12">

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

                    <tr>
                        <th>{{ $meals->id }}</th>
                        <td>{{ $meals->title }}</td>
                        <td>{{ $meals->description }}</td>
                        <td>{{ $meals->description }}</td>

                        <td>{{ date('j M, Y, H:i', strtotime($meals->created_at )) }}</td>
                        <td>{{ date('j M, Y, H:i', strtotime($meals->updated_at )) }}</td>

                        <td>
                            <a href="{{ route('meals.edit', $meals->id) }}" class="btn btn-default btn-sm">Edit</a>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection



