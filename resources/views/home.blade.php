@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {{--<div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>--}}
        </div>

        <table class="table">
            <thead>
            <th>#</th>
            <th>Title</th>
            <th>Description</th>
            <th>Kategorija</th>
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
                    <td>{{ $meal->Category->title}} </td>
                    <td>{{ date('j M, Y, H:i', strtotime($meal->created_at )) }}</td>
                    <td>{{ date('j M, Y, H:i', strtotime($meal->updated_at )) }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>



    </div>
</div>
@endsection



