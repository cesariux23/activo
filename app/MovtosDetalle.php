<?php namespace ActivoFijo;

use Illuminate\Database\Eloquent\Model;

class MovtosDetalle extends Model {

	//
	protected $table = 'movtosdetal';
	public $timestamps = false;
	protected $primaryKey = 'IdDet';
	protected $fillable = ['DescEmp'];


	public function bien()
    {
        return $this->belongsTo('ActivoFijo\ActivoFijo', 'Movto','Movto');
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