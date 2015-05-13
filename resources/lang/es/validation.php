<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => "El campo :attribute must be accepted.",
	"active_url"           => "El campo :attribute is not a valid URL.",
	"after"                => "El campo :attribute must be a date after :date.",
	"alpha"                => "El campo :attribute may only contain letters.",
	"alpha_dash"           => "El campo :attribute may only contain letters, numbers, and dashes.",
	"alpha_num"            => "El campo :attribute may only contain letters and numbers.",
	"array"                => "El campo :attribute must be an array.",
	"before"               => "El campo :attribute must be a date before :date.",
	"between"              => [
		"numeric" => "El campo :attribute must be between :min and :max.",
		"file"    => "El campo :attribute must be between :min and :max kilobytes.",
		"string"  => "El campo :attribute must be between :min and :max characters.",
		"array"   => "El campo :attribute must have between :min and :max items.",
	],
	"boolean"              => "El campo :attribute field must be true or false.",
	"confirmed"            => "El campo :attribute confirmation does not match.",
	"date"                 => "El campo :attribute is not a valid date.",
	"date_format"          => "El campo :attribute does not match the format :format.",
	"different"            => "El campo :attribute and :other must be different.",
	"digits"               => "El campo :attribute must be :digits digits.",
	"digits_between"       => "El campo :attribute must be between :min and :max digits.",
	"email"                => "El campo :attribute must be a valid email address.",
	"filled"               => "El campo :attribute field is required.",
	"exists"               => "El campo selected :attribute is invalid.",
	"image"                => "El campo :attribute must be an image.",
	"in"                   => "El campo selected :attribute is invalid.",
	"integer"              => "El campo :attribute must be an integer.",
	"ip"                   => "El campo :attribute must be a valid IP address.",
	"max"                  => [
		"numeric" => "El campo :attribute may not be greater than :max.",
		"file"    => "El campo :attribute may not be greater than :max kilobytes.",
		"string"  => "El campo :attribute may not be greater than :max characters.",
		"array"   => "El campo :attribute may not have more than :max items.",
	],
	"mimes"                => "El campo :attribute must be a file of type: :values.",
	"min"                  => [
		"numeric" => "El campo :attribute must be at least :min.",
		"file"    => "El campo :attribute must be at least :min kilobytes.",
		"string"  => "El campo <b>:attribute</b> debe tener mínimo :min caracteres.",
		"array"   => "El campo :attribute must have at least :min items.",
	],
	"not_in"               => "El campo selected :attribute is invalid.",
	"numeric"              => "El campo :attribute must be a number.",
	"regex"                => "El campo :attribute format is invalid.",
	"required"             => "El campo <b>:attribute</b> es requerido.",
	"required_if"          => "El campo :attribute field is required when :other is :value.",
	"required_with"        => "El campo :attribute field is required when :values is present.",
	"required_with_all"    => "El campo :attribute field is required when :values is present.",
	"required_without"     => "El campo :attribute field is required when :values is not present.",
	"required_without_all" => "El campo :attribute field is required when none of :values are present.",
	"same"                 => "El campo :attribute and :other must match.",
	"size"                 => [
		"numeric" => "El campo :attribute must be :size.",
		"file"    => "El campo :attribute must be :size kilobytes.",
		"string"  => "El campo :attribute must be :size characters.",
		"array"   => "El campo :attribute must contain :size items.",
	],
	"unique"               => "El <b>:attribute</b> ya existe en la base de datos.",
	"url"                  => "El campo :attribute format is invalid.",
	"timezone"             => "El campo :attribute must be a valid zone.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	//'attributes' => [],

	'attributes' => [
    	'IdOfna' => 'ID',
  		'DescOfna' => 'Nombre',
  		'DirOfna'  => 'Dirección',
  		'IdTipAdq'  => 'Adquisición',
  		'DescAdq'  => 'Descripción Adquisición',
  		'IdEmp' => 'ID',
  		'DescEmp' => 'NOMBRE COMPLETO',

  	]
];
