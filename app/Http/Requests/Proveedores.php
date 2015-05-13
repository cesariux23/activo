<?php namespace ActivoFijo\Http\Requests;

use ActivoFijo\Http\Requests\Request;

class Proveedores extends Request {

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
			
			"IdProv"=>"required|unique:03proveed,IdProv,".$this->input('IdProv').",IdProv|min:6",
			"DescProv"=>"required",
			//"IdOfna"=>"required"
		];
	}

/*public function messages()
	{
		return[
			'IdEmp.required' => 'El campo ID es requerido!',
	        'IdEmp.max' => 'El campo ID no puede tener mas de 6 carácteres',
			'IdEmp.min' => 'El campo ID no puede tener menos de 6 carácteres',
			'DescEmp.required' => 'El campo Nombre Completo es requerido!',
	        
		];
	}
*/
}