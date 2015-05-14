<?php namespace ActivoFijo\Http\Requests;

use ActivoFijo\Http\Requests\Request;

class ActivoFijos extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			
			"Gpo"=>"required|unique:movimientos,Gpo,".$this->input('Gpo').",Gpo|min:1",
			"Clave"=>"required",
			"NumInv"=>"required",
			"AnoPrg"=>"required",
			//"TpoBien"=>"required",
			"Denomin"=>"required",
			"FecAlta"=>"required",
			"DescArt"=>"required",
			//"IdProv"=>"required",
			"NumFact"=>"required",
			"FecFact"=>"required",
			"Costo"=>"required",
			//"IdTipAdq"=>"required",
			//"IdRub"=>"required",
			"Edo"=>"required",
			//"Localiz"=>"required"
		];
	}
}