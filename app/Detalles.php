<?php namespace ActivoFijo;

use Illuminate\Database\Eloquent\Model;

class Detalles extends Model {

	//
	protected $table = 'detalles';
	public $timestamps = false;
	protected $primaryKey = 'IdDet';


	public function getNumeroInventarioAttribute()
	{
			# Concatena el numero de inventario
		# code...
			switch ($this->TpoBien) {
					case 'E':
							# code...
							$tipo= "IVEA";
							break;
					case 'F':
							# code...
							$tipo=  "INEA";
							break;

					default:
							# code...
							$tipo=  "OTRO";
							break;
			}
			return $tipo.'-'.$this->Gpo.'-'.$this->Clave.'-'.sprintf('%05d', $this->NumInv).'-'.substr($this->AnoPrg, 2,2) ;
	}

}
