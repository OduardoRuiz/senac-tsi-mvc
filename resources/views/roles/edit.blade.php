@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editar Perfil</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Voltar</a>
        </div>
    </div>
</div>
<br>

@if (count($errors) > 0)

<div class="alert alert-danger">
    <strong>Ops!</strong> Há algo errado com os dados passados.<br><br>
    <ul>
        @foreach ($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach
    </ul>
</div>

@endif

{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nome:</strong>

            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permissão:</strong>
            <br />

            @foreach($permission as $value)

            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}

                {{ $value->name }}</label>

            <br />

            @endforeach

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Gravar</button>
    </div>
</div>

{!! Form::close() !!}


@endsection
