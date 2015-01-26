<?php
class Boletin extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'boletin';
    protected $dates = ['deleted_at'];
    protected $perPage = 5;

}