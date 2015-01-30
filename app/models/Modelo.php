<?php
    class Modelo extends Eloquent
    {
        // use SoftDeletingTrait;
        public $errors;
        protected $table = 'modelos';
        public $timestamps = false;
        protected $fillable = [
            'nombre',
            'marca_id'
        ];

        

         public function isValid($data)
        {
             $rules = [
            'nombre'    => 'required',
            'marca_id'  => 'required|integer'
        ];

            // if($this->exists)
            //     $rules['marca'] .= ',marca,' . $this->id;

            $validator = Validator::make($data,$rules);

            if($validator->passes())
                return true;

            $this->errors = $validator->errors();
            return false;
        }

        public function validAndSave($data)
        {
            if($this->isValid($data))
            {
                $this->fill($data);
                $this->save();
                return true;
            }
            return false;
        }

        public function marca()
        {
            return $this->belongsTo('Marca','marca_id');
        }
    }