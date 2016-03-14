<?php namespace ActivoFijo\Http\Requests;

use ActivoFijo\Http\Requests\Request;

class Empleados extends Request {

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
			
			"IdEmp"=>"required|unique:02empleados,IdEmp,".$this->input('IdEmp').",IdEmp|min:4",
			"DescEmp"=>"required",
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