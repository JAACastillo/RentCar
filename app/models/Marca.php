<?php
    class Marca extends Eloquent
    {
        // use SoftDeletingTrait;
        public $errors;
        protected $table = 'marcas';
        // protected $dates = ['deleted_at'];
        public $timestamps = false;
        protected $perPage = 5;
        protected $fillable = ['nombre'];

        public function isValid($data)
        {
            $rules = [
                'nombre'=>'required|max:100|unique:marcas'
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
        /**
         * [Relación]
         * @return [Relación] [Marca tiene muchos modelos]
         */
        public function modelos()
        {
            return $this->hasmany('Modelo','marca_id');
        }
    }