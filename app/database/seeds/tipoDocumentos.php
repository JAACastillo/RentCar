<?php


class tipoDocumentos extends Seeder {
	public function run(){
		tipoDocumento::create(array('tipo' => 'Pasaporte'));
		tipoDocumento::create(array('tipo' => 'Licencia'));
		tipoDocumento::create(array('tipo' => 'Tarjeta'));
		tipoDocumento::create(array('tipo' => 'Documento'));
	}
}