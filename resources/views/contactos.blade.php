@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <a href="contactos/create" class="btn btn-primary">CREAR</a>
                        <table id="data-table-select" class="table table-sm table-hover" >
                            <thead>
                            <tr class="thead-light">
                                <th class="text-center col-md-2">Nombre</th>
                                <th class="text-center col-md-2">Apellido</th>
                                <th class="text-center col-md-1">Telefono</th>
                                <th class="text-center col-md-1">Celular</th>
                                <th class="text-center col-md-1">Mail</th>
                                <th class="text-center col-md-2">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contactos as $contacto)
                            <tr>
                                <td class="text-center">{{$contacto->nombre}}</td>
                                <td class="text-center">{{$contacto->apellido}}</td>
                                <td class="text-center">{{$contacto->telefono}}</td>
                                <td class="text-center">{{$contacto->celular}}</td>
                                <td class="text-center">{{$contacto->mail}}</td>
                                <td class="with-btn text-center">
                                    <a href="contactos/{{$contacto->id}}/edit" class="btn btn-dark btn-sm">Editar</a>
                                    {!! Form::open(['route'=>['contactos.destroy',$contacto->id],'method'=>'DELETE']) !!}
                                    <div class="form-group">
                                        {!! Form::submit('Eliminar',['class'=>'btn btn-primary btn-sm']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection