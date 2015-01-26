<?php
    class Imagen extends Eloquent
    {
        use SoftDeletingTrait;
        protected $table = 'imagenes';
        protected $dates = ['deleted_at'];
        public $errors;
        /**
         * [Relación]
         * @return [Relación] [imagenes pertenece a cliente]
         */
        public function cliente()
        {
            return $this->belongsTo('Cliente','cliente_id');
        }
    }