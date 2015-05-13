<?php namespace ActivoFijo;

use Illuminate\Database\Eloquent\Model;

class ActivoFijo extends Model {

	//
	protected $table = 'movimientos';
	public $timestamps = false;
	protected $primaryKey = 'Movto';
	protected $fillable = ['Gpo', 'Clave'];


	public function proveedor()
    {
        return $this->belongsTo('ActivoFijo\Proveedor', 'IdProv','IdProv');
    }
	public function rubro()
    {
        return $this->belongsTo('ActivoFijo\Rubro', 'IdRub','IdRub');
    }
	public function tipadq()
    {
        return $this->belongsTo('ActivoFijo\TipoAdq', 'IdTipAdp','IdTipAdq');
    }

    public function getTipobAttribute()
    {
        # code...
        switch ($this->TpoBien) {
            case 'E':
                # code...
                return "ESTATAL";
                break;
            case 'F':
                # code...
                    return "FEDERAL";
                break;
            
            default:
                # code...
                    return "OTRO";
                break;
        }
    }

    public function getNumeroInventarioAttribute()
    {
        # Concatena el numero de inventario
        return $this->Gpo.'-'.$this->Clave.'-'.sprintf('%05d', $this->NumInv).'-'.substr($this->AnoPrg, 2,2) ;
    }
}


