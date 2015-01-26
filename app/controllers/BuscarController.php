<?php
class BuscarController extends BaseController
{
    /**
     * [Buscar Cliente]
     * @param  [type] $dato [description]
     * @return [vista] [buscar/cliente]
     */
    public function formCliente()
    {
        $paso = 1;

        $data = [
            'nombre' => 'Nombre',
            'doc_unico' => 'Documento único',
            'email' => 'Correo electrónico',
            'fecha_nac' => 'Fecha de nacimiento',
            'pasaporte' => 'Pasaporte',
            'licencia' => 'Número de licencia'
        ];

        return View::make('buscar.cliente',compact('paso','data'));
    }
    /**
     * [Buscar Prospecto]
     * @param  [type] $dato [description]
     * @return [vista] [buscar/prospecto]
     */
    public function formProspecto()
    {
        $paso = 2;

        $data = [
            'nombre' => 'Nombre',
            'doc_unico' => 'Documento único',
            'email' => 'Correo electrónico',
            'fecha_nac' => 'Fecha de nacimiento'
        ];

        return View::make('buscar.prospecto',compact('paso','data'));
    }
    /**
     * [Buscar Prestamo]
     * @param  [type] $dato [description]
     * @return [vista] [buscar/prestamo]
     */
    public function formPrestamo()
    {
        $paso = 3;

        $data = [
            'horario_rsv' => 'Fecha y hora de reserva',
            'horario_dvl' => 'Fecha y hora de devolución'
        ];

        return View::make('buscar.prestamo',compact('paso','data'));
    }
    /**
     * [Buscar Datos]
     * @return [route] [Buscar Datos Según La Tabla]
     */
    public function busqueda()
    {
        $dato = Input::all();

        switch ($dato['tabla']) {
            case 'cliente':
            case 'prospecto':
                if(!empty($dato['texto_1']) || !empty($dato['texto_2']))
                {
                    if(!empty($dato['texto_1']) || empty($dato['texto_2'])) {
                        return Redirect::route('buscar',array($dato['tabla'],$dato['campo'],$dato['texto_1']));
                    } else if(empty($dato['texto_1']) || !empty($dato['texto_2'])) {
                        $dato['texto_1'] = date('Y-m-d', strtotime($dato['texto_2']));
                        return Redirect::route('buscar',array($dato['tabla'],$dato['campo'],$dato['texto_1']));
                    } else
                        return Redirect::back();
                } else
                    return Redirect::back();
            break;
            case 'prestamo':
                if(!empty($dato['fecha_1']) && !empty($dato['fecha_2'])) {
                    $dato['fecha_1'] = date('Y-m-d H:i', strtotime($dato['fecha_1']));
                    $dato['fecha_2'] = date('Y-m-d H:i', strtotime($dato['fecha_2']));
                    return Redirect::route('buscar',array($dato['tabla'],$dato['campo'],$dato['fecha_1'],$dato['fecha_2']));
                }
                else
                    return Redirect::back();
            break;
            default:
            break;
        }
    }
    /**
     * [Buscar Usuario]
     * @param  [type] $dato [description]
     * @return [vista] [user/list]
     */
    public function buscar($tabla,$campo,$texto1,$texto2 = null)
    {
        $tabla = ucwords($tabla);

        if($tabla != 'Prestamo') {
            $datos = $tabla::where($campo,'LIKE',"%".$texto1."%")
                ->orderBy('created_at','dsc')
                ->paginate();
        } else {
            $datos = $tabla::whereBetween($campo,array($texto1,$texto2))
                ->orderBy('created_at','dsc')
                ->paginate();
        }

       switch ($tabla) {
            case 'Cliente':
                $cliente = $datos;
                return View::make('cliente.list', compact('cliente'));
            break;
            case 'Prospecto':
                $prospecto = $datos;
                return View::make('prospecto.list', compact('prospecto'));
            break;
            case 'Prestamo':
                $prestamo = $datos;

                $form_data = [
                    'class' => 'form-horizontal',
                    'method' => 'patch',
                    'id' => 'formContrato',
                    'target' => '_blank'
                ];

                $form_data_2 = [
                    'class' => 'form-horizontal',
                    'method' => 'patch',
                    'id' => 'formPagare',
                    'target' => '_blank'
                ];
        
                $data = [
                    '' => '',
                    'Cliente' => 'Cliente',
                    'Adicional' => 'Conductor Adicional'
                ];

                $mensaje = 'El campo no tiene que quedar vacío';
                return View::make('prestamo.list', compact('prestamo','form_data','form_data_2','data','mensaje'));
            break;
            default:
            break;
        }
    }
}