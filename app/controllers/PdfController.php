<?php
class PdfController extends BaseController
{
    /**
     * [Editar Contrato] [Formulario]
     * @param  [type] $id [ID del prestamo]
     * @return [type]     [JSON]
     */
    public function edit($id)
    {
        $prestamo = Prestamo::find($id);

        if(!empty($prestamo))
            return $prestamo;
        else
            return 0;
    }
    /**
     * [Contrato de Arrendamiento]
     * @param  [type] $id [ID del Prestamo]
     * @return [vista]     [pdfs/contrato]
     */
    public function contrato($id)
    {
        $prestamo = Prestamo::find($id);

        if(is_null($prestamo))
            App::abort(404);

        $data = Input::all();
        $prestamo->modelo->color = $data['color'];
        $prestamo->modelo['placa'] = $data['placa'];
        $prestamo->modelo['valor'] = $data['valor'];
        $pdf = App::make('dompdf');
        $pdf->loadView('pdfs.contrato', compact('prestamo'))->setPaper('legal');
        return $pdf->stream();
    }
    /**
     * [Pagare]
     * @param  [type] $id [ID del Prestamo]
     * @return [vista]     [pdfs/pagare]
     */
    public function pagare($id)
    {
        $prestamo = Prestamo::find($id);

        if(is_null($prestamo))
            App::abort(404);

        $data = Input::all();
        $prestamo->modelo['conductor'] = $data['conductor'];
        $prestamo->modelo['valor'] = $data['valor'];
        $pdf = App::make('dompdf');
        $pdf->loadView('pdfs.pagare', compact('prestamo'))->setPaper('letter');
        return $pdf->stream();
    }
}