@extends('index')
@section('content')
<br/>
<div class="row"  style="border-bottom: 1px inset #DDDDDD">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <h3>Datos del Cliente</h3>
    </div>
    <div class="col-md-offset-3 col-md-3 col-sm-offset-3 col-sm-3 hidden-xs">
        <h3>Datos del Contácto</h3>
    </div>
    <div class="col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-2 text-right col-xs-6">
        <br/>
        <a href="{{ route('clienteImagenes', $cliente->id) }}" class="showFoto" data-modal='#showImagen'>Imagenes</a> |
        <a href="{{ route('clienteEditar', $cliente->id) }}">Editar</a>
    </div>
</div>
<br/>
<div class="row" style="border-bottom: 1px inset #DDDDDD">
    <div class="col-md-4 col-sm-6">
        <dl class="dl-horizontal">
            <p>
                <dt class="text-left">{{ Form::label('Nombre:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->nombre) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Dirección Local:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->direccion) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Dirección Extrangero:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->direccion_2) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Documento Identidad:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->doc_unico) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Sexo:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->sexo) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Correo Electrónico:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->email) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Fecha Nacimiento:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->fecha_nac) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Teléfono Local:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->telefono) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Teléfono Extrangero:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->telefono_2) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Celular:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->celular) }}</dd>
            </p>
        </dl>
    </div>
    <div class="col-md-4 col-sm-6">
        <dl class="dl-horizontal">
            <p>
                <dt class="text-left">{{ Form::label('Pasaporte:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->pasaporte) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Número Licencia:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->licencia) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Fecha Emi. Licencia:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->fecha_emi_lic) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Fecha Ven. Licencia:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->fecha_ven_lic) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Tarjeta de Crédito:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->targeta_credito) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Fecha Ven. Tarj-Cred:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->fecha_ven_cre) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Tipo Cliente:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->tipo) }}</dd>
            </p>
        </div>
        <div class="col-md-4">
            @if($cliente->emergencia_id)
                <p>En caso de emergencias cominicarse con:</p>

                <div id='emergencia'>
                    <p>
                        <dt class="text-left">Nombre: </dt>
                        <dd class="text-left">{{$cliente->emergencia->nombre}}</dd>
                    </p>
                    <p>
                        <dt class="text-left">Dirección: </dt>
                        <dd class="text-left">{{$cliente->emergencia->direccion}}</dd>
                    </p>
                    <p>
                        <dt class="text-left">Telefono: </dt>
                        <dd class="text-left">{{$cliente->emergencia->telefono}}</dd>
                    </p>
                </div>
            @endif
            @if($cliente->adicional_id)
                <p>Conductor Adicional:</p>
                <div >
                    <p>
                        <dt class="text-left">Nombre: </dt>
                        <dd class="text-left">{{ Form::label($cliente->conductor->nombre) }}</dd>
                    </p>
                    <p>
                        <dt class="text-left">Direccion: </dt>
                        <dd class="text-left">{{ Form::label($cliente->conductor->direccion) }}</dd>
                    </p>
                    <p>
                        <dt class="text-left">Telefono: </dt>
                        <dd class="text-left">{{ Form::label($cliente->conductor->telefono) }}</dd>
                    </p>
                    <p>
                        <dt class="text-left">Licencia: </dt>
                        <dd class="text-left">{{ Form::label($cliente->conductor_femilic) }}</dd>
                    </p>
                </div>
            @endif
        </dl>
    </div>
</div>
<br/>
<div class="row" style="border-bottom: 1px inset #DDDDDD">     
    <div class="col-md-6 col-sm-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Comentarios</h3>
            </div>
            <div class="list-group">
                @foreach($cliente->comentarios as $comment)
                  <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">{{$comment->texto}}</h4>
                    <p class="list-group-item-text">{{$comment->created_at}}</p>
                  </a>
                @endforeach
            </div>
        </div>
    </div>    
</div>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <h3 class='text-center'>Historial de Prestamos</h3>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <tr class="active">
                    <th>Modelo</th>
                    <th>Horario de Reserva</th>
                    <th>Horario de Devolución</th>
                    <th>Estado</th>
                </tr>
                @foreach ($prestamos as $prestamo)
                    <tr>
                        <td>
                            @if($prestamo->carro_id)
                                {{ $prestamo->carro->modelo->nombre }}
                            @endif
                        </td>
                        <td>{{ $prestamo->fechaReserva }}</td>
                        <td>{{ $prestamo->fechaDevolucion }}</td>
                        <td>
                            <a href="{{route($prestamo->estado->url, $prestamo->id)}}" data-content="{{$prestamo->estado->popUpText}}" data-placement="bottom" class="tool"> 
                              {{ $prestamo->estado->nombre }}
                            </a>
                        </td>                        
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="panel-footer">
        {{ $prestamos->links() }}
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-mds-12">
         @include('cliente/modal/show')
    </div>
</div>
@stop