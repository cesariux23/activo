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
    public function detalles()
    {
        return $this->hasMany('ActivoFijo\MovtosDetalle', 'Movto','Movto')->orderBy('FecMovto','DESC')->orderBy('IdDet','desc');
    }

    public function scopeClave($query, $clave)
    {
        # busca por clave
        if($clave!="")
            $query->where('Clave','LIKE','%'.$clave.'%');
    }

    public function scopeDescripcion($query, $desc)
    {
        # busca por scopeDescripcion
        if($desc!="")
            $query->where('DescArt','LIKE','%'.$desc.'%');
    }

     public function scopeNumInv($query, $numinv)
    {
        # busca por Número de Inventario
        if($numinv!="")
            $query->where('NumInv','LIKE','%'.$numinv.'%');
    }
}


