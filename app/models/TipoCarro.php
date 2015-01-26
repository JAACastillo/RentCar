<?php
    class TipoCarro extends Eloquent
    {
        // use SoftDeletingTrait;
        public $errors;
        protected $table = 'tipoCarros';
        // protected $dates = ['deleted_at'];
        // protected $perPage = 5;
        protected $fillable = ['tipo'];

        public function isValid($data)
        {
            $rules = [
                'tipo'=>'required|max:100|unique:tipos'
            ];

            if($this->exists)
                $rules['tipo'] .= ',tipo,' . $this->id;

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
         * @return [Relación] [Tipo tiene muchos Modelos]
         */
        public function modelos()
        {
            return $this->hasmany('Modelo','tipo_id');
        }
    }