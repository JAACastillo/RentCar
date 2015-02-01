@extends('index')

@section('content')

<div class="row">

    <div class="col-md-12">

        <h1 class='text-center'>Colores</h1>

    </div>

</div>


<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12 col-sm-1">
            <p class="hidden-lg"></p>
                <a href='{{route("colorNuevo")}}'>
                    <span class="glyphicon glyphicon-file"></span> Nuevo
                </a>
            </div>
        </div>
    </div>

    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <tr class="active">
                    <th>Color</th>
                    <th>Acciones</th>
                </tr>

                @foreach ($colores as $color)

                    <tr>
                        <td> {{$color->color}}</td>
                        <td>
                            <a href="{{ route('colorEditar', array($color->id)) }}" class=" glyphicon glyphicon-edit tool"> </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="panel-footer">
        {{ $colores->links() }}
    </div>
</div>
@stop