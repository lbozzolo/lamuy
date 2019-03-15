@extends('layouts.app')

@section('content')

    <div class="card" id="form-fields">
        <div class="card-body">

            <h1>
                Categorías /
                <span class="text-warning">Editar</span>
            </h1>
            <div class="row">
                <div class="card-body">

                    {!! Form::model($categoria, ['route' => ['categorias.update', $categoria->id], 'method' => 'patch']) !!}

                    <div class="row">
                        @include('categorias.fields')
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>

        </div>
    </div>

@endsection