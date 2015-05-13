<?php namespace ActivoFijo;

use Illuminate\Database\Eloquent\Model;

class TipoAdquisicion extends Model {

	//
	protected $table = '04tipadq';
	public $timestamps = false;
	protected $primaryKey = 'IdTipAdq';
	protected $fillable = ['DescAdq'];


	public function movimiento()
    {
        return $this->hasMany('ActivoFijo\Movimiento', 'Movto','Movto');
    }
}

