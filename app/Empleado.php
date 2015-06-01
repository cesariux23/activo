<?php namespace ActivoFijo;

use Illuminate\Database\Eloquent\Model;
//use DB;

class Empleado extends Model {

	//
	protected $table = '02empleados';
	public $timestamps = false;
	protected $primaryKey = 'IdEmp';
	protected $fillable = ['DescEmp'];


	public function oficina()
    {
        return $this->belongsTo('ActivoFijo\Oficina', 'IdOfna','IdOfna');
    }

     //regresa los valores relacionados
    public function bienes()
    {
        return $this->hasMany('ActivoFijo\MovtosDetalle','IdEmp','IdEmp')
        ->where('ultimo',1)
        ->whereRaw("NOT EdodelBien like '%BAJA%'");
        //->get();
    }

    public function getTotalmovimientosAttribute()
    {
        # code...
        return \DB::table('movtosdetal')->where('IdEmp',$this->IdEmp)->count();
        //return 1;
    }

    public function getNumeroBienesAttribute()
    {
        # Regresa el numero de bienes en la adscripcion
        return $this->bienes()->count();
    }



    //Busqueda

    public function scopeNombre($query, $nombre)
    {
    	# busca por nombre
    	if($nombre!="")
    		$query->where('DescEmp','LIKE','%'.$nombre.'%');
    }

    public function scopeId($query, $id)
    {
    	# busca por id
    	if($id!="")
    		$query->where('IdEmp',$id);
    }
    public function scopeOficina($query, $id)
    {
    	# busca por id
    	if($id!="")
    		$query->where('IdOfna',$id);
    }
}
