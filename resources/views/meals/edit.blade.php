@extends('main')

@section('title', '| Edit Jelo')

@section('content')

    <div class="row">
        {!! Form::model($meal, ['route'=>['meals.update', $meal->id], 'method'=>'PUT']) !!}
        <div class="col-md-6">

            {{Form::label('title', 'Title:')}}<br><br>
            {{ Form::text('title', null, ['class' => 'form-control']) }}<br><br>

            {{Form::label('description', 'Description:')}}<br><br>
            {{ Form::text('description', null, ['class' => 'form-control']) }}<br><br>

            {{Form::label('category_id', 'Category:')}}<br><br>
            {{ Form::text('category_id'), null, ['class' => 'form-control'] }}<br><br>

            {!!Form::label('language_id', 'Language:')!!}<br><br>
            {!!Form::password('language_id', null, ['class' => 'form-control'])!!}<br><br>


        </div>
        <div class="col-md-6">
            <div class="well">
                <dl class="dl-horizontal">

                    <dt>Jelo kreirano:</dt>
                    <dd>{{ date( 'j M, Y H:i', strtotime($meal->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">

                    <dt>Jelo ažurirano:</dt>
                    <dd>{{ date( 'j M, Y H:i', strtotime($meal->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        {!! Html::linkRoute('meals.show', 'Cancle', array($meal->id), ['class' => 'btn btn-danger btn-block']) !!}

                    </div>
                    <div class="col-md-6">

                        {{Form::submit('Save', ['class'=>'btn btn-success btn-block'])}}

                    </div>
                </div>

            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection