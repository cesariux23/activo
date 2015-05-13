<?php namespace ActivoFijo\Http\Requests;

use ActivoFijo\Http\Requests\Request;

class Rubros extends Request {

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
			
			"IdRub"=>"required|unique:05rubros,IdRub,".$this->input('IdRub').",IdRub|min:2",
			"DescRub"=>"required",
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