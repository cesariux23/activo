<?php namespace ActivoFijo;

use Illuminate\Database\Eloquent\Model;

class MovtosDetalle extends Model {

	//
	protected $table = 'movtosdetal';
	public $timestamps = false;
	protected $primaryKey = 'IdDet';
	protected $fillable = ['DescEmp'];


	public function movimiento()
    {
        return $this->belongsTo('ActivoFijo\Movimiento', 'Movto','Movto');
    }

    public function empleado()
    {
        return $this->belongsTo('ActivoFijo\Empleado', 'IdEmp','IdEmp');
    }

    public function ubicacion()
    {
        return $this->belongsTo('ActivoFijo\Oficina', 'Ubicac','IdOfna');
    }
}