<?php
class prestamoPaso_4Controller extends BaseController
{
    public function pago($id)
    {
        $prestamo = Prestamo::with('extras', 'extras.definicion')
                            ->find($id);
        // $pago = new Pago;
        $form = new Formulario;

        if(is_null($prestamo))
            App::abort(404);

        $precio = $prestamo->precio;
        $precioAuto = $prestamo->precio;
        $form_data = $form->formData(array('precioStore',$id),'GET',false);

        $tipoDePago = ['Efectivo' => 'Efectivo',   'Tarjeta' => 'Tarjeta'  ];

        $paso = 4;
        
        $cliente = $prestamo->cliente;
        $cliente->como = 1; //1 = Cliente
        $cliente->save();

        // $
        // $resultado = $pago->formaPago($prestamo,$precioAuto,$form_data,$data,$paso);
        return View::make('prestamo.pago', compact('prestamo', 'form_data', 'tipoDePago', 'paso'));
    }
    /**
     * [Guardar Datos Del Prestamo]
     * @return [route] [prestamoShow]
     */
    public function store($id)
    {
        $prestamo = Prestamo::find($id);

        if(is_null($prestamo))
            App::abort(404);
            
        if($prestamo->validarPago(Input::all())){
            if($prestamo->estado_id == 4){
                $prestamo->estado_id = 5;
                $prestamo->save();
            }
            return Redirect::back();
        }

        return Redirect::back()
            ->withInput()
            ->withErrors($prestamo->errors);
    }
}