?php namespace ActivoFijo;

use Illuminate\Database\Eloquent\Model;

class ActivoFederal extends Model {

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
}


