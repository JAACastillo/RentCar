<?php
/**
 * [Editar Contrato] [Formulario]
 * @return [type]     [JSON]
 */
Route::get('contrato/{id}/edit',[
    'as' => 'contratoEditar',
    'uses' => 'PdfController@edit'
]);
/**
 * [Contrato de Arrendamiento]
 * @return [vista]     [pdfs/contrato]
 */
Route::patch('/contrato/{id}',[
    'as' => 'pdfContrato',
    'uses' => 'PdfController@contrato'
]);
/**
 * [Pagare]
 * @return [vista]     [pdfs/pagare]
 */
Route::patch('/pagare/{id}',[
    'as' => 'pdfPagare',
    'uses' => 'PdfController@pagare'
]);