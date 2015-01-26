<?php
    class Modelo extends Eloquent
    {
        // use SoftDeletingTrait;
        public $errors;
        protected $table = 'modelos';
        // protected $dates = ['deleted_at'];
        protected $perPage = 5;

        protected $fillable = [
            'modelo',
            'año',
            'motor',
            'transmision',
            'puertas',
            'color',
            'capacidad',
            'km_galon',
            'tipo_combustible',
            'equipamiento',
            'existencias',
            'estado',
            'marca_id',
            'tipo_id'
        ];

        
        public function marca()
        {
            return $this->belongsTo('Marca','marca_id');
        }
    }