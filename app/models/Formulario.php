<?php
class Formulario extends Eloquent
{
    /**
     * [Descripción]
     * @param  [type] $url  [Route]
     * @param  [type] $http [HTTP Verbs]
     * @param  [type] $bool [Boolean]
     * @return [type]       [Datos del Formulario]
     */
    public function formData($url,$http,$bool)
    {
        $form_data = [
            'route' => $url,
            'method' => $http,
            'class' => 'form-horizontal',
            'files' => $bool
            ];

        return $form_data;
    }
    /**
     * [Descripción]
     * @param  [type] $url  [Route]
     * @param  [type] $http [HTTP Verbs]
     * @param  [type] $bool [nombre de la clase]
     * @return [type]       [ID del formulario]
     */
    public function formData_2($url,$http,$cls,$id)
    {
        $form_data = [
            'route' => $url,
            'method' => $http,
            'class' => $cls,
            'id' => $id
            ];

        return $form_data;
    }
}