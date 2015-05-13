<?php namespace ActivoFijo;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model {

//
	protected $table = '03proveed';
	public $timestamps = false;
	protected $primaryKey = 'IdProv';
	protected $fillable = ['Descprov'];


	public function movimiento()
    {
        return $this->hasMany('ActivoFijo\Movimiento', 'Movto','Movto');
    }

   /* public function getNumeroProveedoresAttribute()
    {
    	# Regresa el numero de proveedores
    	return $this->proveedores()->where('Baja', 0)->count();
    }*/
}
