@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Insumo / Agrear
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'insumos.store']) !!}

                        @include('insumos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')

    <script>

        $('.select2').select2({
           multiple: true
        });

    </script>

@endsection