<?php namespace ActivoFijo;

use Illuminate\Database\Eloquent\Model;

class Rubro extends Model {

	//
	protected $table = '05rubros';
	public $timestamps = false;
	protected $primaryKey = 'IdRub';
	protected $fillable = ['DescRub'];

	public function movimiento()
    {
        return $this->hasMany('ActivoFijo\Movimiento', 'Movto','Movto');
    }

}