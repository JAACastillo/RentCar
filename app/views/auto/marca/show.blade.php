@extends('index')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class='text-center'>Marca: {{ $nombreMarca }}</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Modelos de Autos</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped"> 
                        <tr class="active">
                            <th>Modelo</th>
                        </tr>
                        @foreach ($modelo as $modelos)
                            <tr>
                                <td>{{ $modelos->modelo }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="panel-footer">
                {{ $modelo->links() }}
            </div>
        </div>
    </div>
</div>
@stop