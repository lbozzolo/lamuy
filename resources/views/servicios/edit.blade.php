@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Servicio
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">

                   <div class="col-lg-6">
                       <div class="row">
                           {!! Form::model($servicio, ['route' => ['servicios.update', $servicio->id], 'method' => 'patch']) !!}

                                @include('servicios.fields')

                           {!! Form::close() !!}
                       </div>
                   </div>
                   <div class="col-lg-6">

                       @include('servicios.images')

                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection