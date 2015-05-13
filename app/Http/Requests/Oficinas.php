<?php namespace ActivoFijo\Http\Requests;

use ActivoFijo\Http\Requests\Request;

class Oficinas extends Request {

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
			//
			"IdOfna"=>"required|unique:01ofnas,IdOfna,".$this->input('IdOfna').",IdOfna|min:4",
			"DescOfna"=>"required",
			"DirOfna"=>"required"
		];
	}

	public function messages()
	{
		return[
			'IdOfna.required' => 'El campo ID es requerido!',
	        'IdOfna.min' => 'El campo ID no puede tener menos de 4 carácteres',
			'IdOfna.min' => 'El campo ID no puede tener más de 4 carácteres',
			'DescOfna.required' => 'El campo Nombre es requerido!',
			'DirOfna.required' => 'El campo Direccion es requerido!',
	        
		];
	}

}
