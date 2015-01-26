<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SoftDeletingTrait;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'users';
	protected $dates = ['deleted_at'];
    public $errors;
    protected $perPage = 5;

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'tipo',
        'empresa_id'
        ];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function getRememberToken()
	{
    	return $this->remember_token;
	}


	public function setRememberToken($value)
	{
    	$this->remember_token = $value;
	}


	public function getRememberTokenName()
	{
    	return 'remember_token';
	}


	public function isValid($data)
    {
        $rules = [
            'nombre'    => 'required|max:100',
            'email'     => 'email|required|max:75|unique:users',
            'password'  => 'required|min:8|confirmed',
            'tipo'      => 'required'
            ];

        if ($this->exists)
        	$rules['email'] .= ',email,' . $this->id;
        else
            $rules['password'] .= '|required';

        $validator = Validator::make($data, $rules);

        if ($validator->passes())
            return true;

        $this->errors = $validator->errors();
        return false;
    }

    public function validAndSave($data)
    {
        if($this->isValid($data))
        {
            $data['password'] = Hash::make($data['password']);
            $this->fill($data);
            $this->save();
            return true;
        }
        return false;
    }
    /**
     * [Relación]
     * @return [Relación] [Usuario tiene muchas Bitacoras]
     */
	public function bitacoras()
    {
		return $this->hasmany('Bitacora','usuario_id');
	}

    public function empresa(){
        return $this->belongsTo('empresa');
    }
}