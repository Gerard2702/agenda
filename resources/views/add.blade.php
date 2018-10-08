@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        {!! Form::open(['route' => 'contactos.store', 'method' => 'POST','autocomplete'=>'off']) !!}
                        <div class="form-group">
                            {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre','required'=>'true']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Apellido','required'=>'true']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Telefono','required'=>'true']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::text('celular',null,['class'=>'form-control','placeholder'=>'Celular','required'=>'true']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::text('mail',null,['class'=>'form-control','placeholder'=>'Mail','required'=>'true']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Agregar Contacto',['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection