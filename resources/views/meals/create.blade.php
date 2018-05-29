@extends('main')

@section('title', '| Create New Meal')


@section('content')



    {!! Form::open(['action' => 'MealsController@store']) !!}

        {{Form::label('title', 'title:')}}
        {{Form::text('title', null, array('class' => 'form-control'))}}<br>

        {{Form::label('slug', 'slug:')}}
        {{Form::text('slug', null, array('class' => 'form-control'))}}<br>



        {{Form::label('category_id', 'category_id:')}}
        <select name="category_id" class="form-control">
            @foreach($kategorije as $kata)
                <option value='{{$kata->id}}'>{{$kata->title}}</option>
            @endforeach
        </select><br><br>

        {{Form::label('description', 'description:')}}
        {{Form::textarea('description', null, array('class' => 'form-control'))}}<br>

        {{Form::label('language_id', 'language_id:')}}
        <select name="language_id" class="form-control">
            @foreach($language as $lang)
                <option value='{{$lang->id}}'>{{$lang->title}}</option>
            @endforeach
        </select><br><br>


        {{Form::submit('Create Meal', $arrayName = array('class' => 'btn btn-success btn-lg btn-block'  ))}}<br>

    {!! Form::close() !!}



@endsection

