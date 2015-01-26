<?php

	class BoletinController extends BaseController

    {

    /**

     * [Tabla de Boletines]

     * @return [vista] [boletin/list]

     */

    public function lista()

    {

        $boletin = Boletin::orderBy('created_at','dsc')

            ->paginate();



        return View::make('boletin.list', compact('boletin'));

    }

}