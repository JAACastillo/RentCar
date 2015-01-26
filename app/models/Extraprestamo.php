<?php
    class Extraprestamo extends Eloquent {
        
        use SoftDeletingTrait;

        protected $dates = ['deleted_at'];
        protected $table = 'extra_prestamo';
    }