<?php namespace ActivoFijo\Http\Requests;

use ActivoFijo\Http\Requests\Request;

class MovtosDetalles extends Request {

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
			
			"IdDet"=>"required|unique:movtosdetal,IdDet,".$this->input('IdDet').",IdDet|min:10",
			"DescAdq"=>"required",
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