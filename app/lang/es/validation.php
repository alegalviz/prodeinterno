<?php

return array(
	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| such as the size rules. Feel free to tweak each of these messages.
	|
	*/

	"accepted"         => "El atributo :attribute debe ser aceptado.",
	"active_url"       => "El atributo :attribute no es una URL válida.",
	"after"            => "El atributo :attribute debe ser una fecha posterior a :date.",
	"alpha"            => "El atributo :attribute puede contener solamente letras.",
	"alpha_dash"       => "El atributo :attribute puede contener letras, números y guiones.",
	"alpha_num"        => "El atributo :attribute puede contener letras y números.",
	"before"           => "El atributo :attribute debe ser una fecha anterior a :date.",
	"between"          => array(
		"numeric" => "El atributo :attribute debe estar entre :min - :max.",
		"file"    => "El atributo :attribute debe estar entre :min - :max kilobytes.",
		"string"  => "El atributo :attribute debe estar entre :min - :max caracteres.",
	),
	"confirmed"        => "El atributo :attribute confirmación no coincide.",
	"date"             => "El atributo :attribute no es una fecha válida.",
	"date_format"      => "El atributo :attribute no coincide con el formato :format.",
	"different"        => "El atributo :attribute y :other deben ser diferentes.",
	"digits"           => "El atributo :attribute must be :digits digits.",
	"digits_between"   => "El atributo :attribute must be between :min and :max digits.",
	"email"            => "El atributo :attribute format is invalid.",
	"exists"           => "El atributo selected :attribute is invalid.",
	"image"            => "El atributo :attribute must be an image.",
	"in"               => "El atributo selected :attribute is invalid.",
	"integer"          => "El atributo :attribute must be an integer.",
	"ip"               => "El atributo :attribute must be a valid IP address.",
	"max"              => array(
		"numeric" => "El atributo :attribute may not be greater than :max.",
		"file"    => "El atributo :attribute may not be greater than :max kilobytes.",
		"string"  => "El atributo :attribute may not be greater than :max characters.",
	),
	"mimes"            => "El atributo :attribute must be a file of type: :values.",
	"min"              => array(
		"numeric" => "El atributo :attribute must be at least :min.",
		"file"    => "El atributo :attribute must be at least :min kilobytes.",
		"string"  => "El atributo :attribute must be at least :min characters.",
	),
	"not_in"           => "El atributo selected :attribute is invalid.",
	"numeric"          => "El atributo :attribute must be a number.",
	"regex"            => "El atributo :attribute format is invalid.",
	"required"         => "El atributo :attribute field is required.",
	"required_if"      => "El atributo :attribute field is required when :other is :value.",
	"required_with"    => "El atributo :attribute field is required when :values is present.",
	"required_without" => "El atributo :attribute field is required when :values is not present.",
	"same"             => "El atributo :attribute and :other must match.",
	"size"             => array(
		"numeric" => "El atributo :attribute must be :size.",
		"file"    => "El atributo :attribute must be :size kilobytes.",
		"string"  => "El atributo :attribute must be :size characters.",
	),
	"unique"           => "El atributo :attribute has already been taken.",
	"url"              => "El atributo :attribute format is invalid.",

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

	'custom' => array(),

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

	'attributes' => array(),

);
