<?php
return [
  //TODO: terminar validaciones
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

  'accepted' => 'El campo ' . mb_strtoupper(':attribute') . ' debe ser aceptado.',
  'active_url' => 'El campo ' . mb_strtoupper(':attribute') . ' no es una URL válida.',
  'after' => 'El campo ' . mb_strtoupper(':attribute') . ' debe ser una fecha posterior a :date.',
  'after_or_equal' => 'El campo ' . mb_strtoupper(':attribute') . ' debe ser una fecha posterior o igual a :date.',
  'alpha' => 'El campo ' . mb_strtoupper(':attribute') . ' solamente puede contener letras.',
  'alpha_dash' => 'El campo ' . mb_strtoupper(':attribute') . ' solamente puede contener letras, números, guiones y guiones bajos.',
  'alpha_num' => 'El campo ' . mb_strtoupper(':attribute') . ' solamente puede contener letras y números.',
  'array' => 'El campo ' . mb_strtoupper(':attribute') . ' debe ser un arreglo.',
  'before' => 'El campo ' . mb_strtoupper(':attribute') . ' debe ser una fecha anterior a :date.',
  'before_or_equal' => 'El campo ' . mb_strtoupper(':attribute') . ' debe ser una fecha anterior o igual a :date.',
  'between' => [
    'numeric' => 'El campo ' . mb_strtoupper(':attribute') . ' debe estar entre :min y :max.',
    'file' => 'El campo ' . mb_strtoupper(':attribute') . ' debe estar entre :min y :max kilobytes.',
    'string' => 'El campo ' . mb_strtoupper(':attribute') . ' debe tener entre :min y :max caracteres.',
    'array' => 'El campo ' . mb_strtoupper(':attribute') . ' debe tener entre :min y :max elementos.',
  ],
  'boolean' => 'El campo ' . mb_strtoupper(':attribute') . ' debe ser falso o verdadero.',
  'confirmed' => 'El campo de confirmación ' . mb_strtoupper(':attribute') . ' no coincide.',
  'date' => 'El campo ' . mb_strtoupper(':attribute') . ' no es una fecha válida.',
  'date_equals' => 'El campo ' . mb_strtoupper(':attribute') . ' debe ser una fecha igual a :date.',
  'date_format' => 'El campo ' . mb_strtoupper(':attribute') . ' no coincide con el formato :format.',
  'different' => 'El campo ' . mb_strtoupper(':attribute') . ' y :other deben ser diferentes.',
  'digits' => 'El campo ' . mb_strtoupper(':attribute') . ' debe tener :digits dígitos.',
  'digits_between' => 'El campo ' . mb_strtoupper(':attribute') . ' debe estar entre :min y :max dígitos.',
  'dimensions' => 'El campo ' . mb_strtoupper(':attribute') . ' tiene dimensiones de imagen inválidas.',
  'distinct' => 'El campo ' . mb_strtoupper(':attribute') . ' tiene un valor duplicado.',
  'email' => 'El campo ' . mb_strtoupper(':attribute') . ' debe ser un correo electrónico válido.',
  'exists' => 'El campo seleccionado ' . mb_strtoupper(':attribute') . ' es inválido.',
  'file' => 'El campo ' . mb_strtoupper(':attribute') . ' debe ser un archivo.',
  'filled' => 'El campo ' . mb_strtoupper(':attribute') . ' debe tener un valor.',
  'gt' => [
    'numeric' => 'El campo ' . mb_strtoupper(':attribute') . ' debe ser mayor que :value.',
    'file' => 'El campo ' . mb_strtoupper(':attribute') . ' debe ser mayor que :value kilobytes.',
    'string' => 'El campo ' . mb_strtoupper(':attribute') . ' debe ser mayor que :value caracteres.',
    'array' => 'El campo ' . mb_strtoupper(':attribute') . ' must have more than :value items.',
  ],
  'gte' => [
    'numeric' => 'El campo ' . mb_strtoupper(':attribute') . ' debe ser mayor que or equal :value.',
    'file' => 'El campo ' . mb_strtoupper(':attribute') . ' debe ser mayor que or equal :value kilobytes.',
    'string' => 'El campo ' . mb_strtoupper(':attribute') . ' debe ser mayor que or equal :value caracteres.',
    'array' => 'El campo ' . mb_strtoupper(':attribute') . ' must have :value items or more.',
  ],
  'image' => 'El campo ' . mb_strtoupper(':attribute') . ' debe ser una imagen.',
  'in' => 'El campo seleccionado ' . mb_strtoupper(':attribute') . ' es inválido.',
  'in_array' => 'El campo ' . mb_strtoupper(':attribute') . ' field does not exist in :other.',
  'integer' => 'El campo ' . mb_strtoupper(':attribute') . ' must be an integer.',
  'ip' => 'El campo ' . mb_strtoupper(':attribute') . ' must be a valid IP address.',
  'ipv4' => 'El campo ' . mb_strtoupper(':attribute') . ' must be a valid IPv4 address.',
  'ipv6' => 'El campo ' . mb_strtoupper(':attribute') . ' must be a valid IPv6 address.',
  'json' => 'El campo ' . mb_strtoupper(':attribute') . ' must be a valid JSON string.',
  'lt' => [
    'numeric' => 'El campo ' . mb_strtoupper(':attribute') . ' must be less than :value.',
    'file' => 'El campo ' . mb_strtoupper(':attribute') . ' must be less than :value kilobytes.',
    'string' => 'El campo ' . mb_strtoupper(':attribute') . ' must be less than :value caracteres.',
    'array' => 'El campo ' . mb_strtoupper(':attribute') . ' must have less than :value items.',
  ],
  'lte' => [
    'numeric' => 'El campo ' . mb_strtoupper(':attribute') . ' must be less than or equal :value.',
    'file' => 'El campo ' . mb_strtoupper(':attribute') . ' must be less than or equal :value kilobytes.',
    'string' => 'El campo ' . mb_strtoupper(':attribute') . ' must be less than or equal :value caracteres.',
    'array' => 'El campo ' . mb_strtoupper(':attribute') . ' must not have more than :value items.',
  ],
  'max' => [
    'numeric' => 'El campo ' . mb_strtoupper(':attribute') . ' no debería ser más grande que :max.',
    'file' => 'El campo ' . mb_strtoupper(':attribute') . ' no debería pesar más de :max kilobytes.',
    'string' => 'El campo ' . mb_strtoupper(':attribute') . ' no debería tener más de :max caracteres.',
    'array' => 'El campo ' . mb_strtoupper(':attribute') . ' no debería tener más de :max elementos.',
  ],
  'mimes' => 'El campo ' . mb_strtoupper(':attribute') . ' debe ser un archivo de tipo: :values.',
  'mimetypes' => 'El campo ' . mb_strtoupper(':attribute') . ' debe ser un archivo de tipo: :values.',
  'min' => [
    'numeric' => 'El campo ' . mb_strtoupper(':attribute') . ' must be at least :min.',
    'file' => 'El campo ' . mb_strtoupper(':attribute') . ' must be at least :min kilobytes.',
    'string' => 'El campo ' . mb_strtoupper(':attribute') . ' must be at least :min caracteres.',
    'array' => 'El campo ' . mb_strtoupper(':attribute') . ' must have at least :min items.',
  ],
  'not_in' => 'El campo seleccionado ' . mb_strtoupper(':attribute') . ' es inválido.',
  'not_regex' => 'El formato de ' . mb_strtoupper(':attribute') . ' es inválido.',
  'numeric' => 'El campo ' . mb_strtoupper(':attribute') . ' debe ser numérico',
  'present' => 'El campo ' . mb_strtoupper(':attribute') . ' field debe estar presente.',
  'regex' => 'El formato del campo ' . mb_strtoupper(':attribute') . ' es inválido.',
  'required' => 'El campo ' . mb_strtoupper(':attribute') . ' es obligatorio.',
  'required_if' => 'El campo ' . mb_strtoupper(':attribute') . ' es obligatorio cuando :other es :value.',
  'required_unless' => 'El campo ' . mb_strtoupper(':attribute') . ' es obligatorio al menos que :other esté en :values.',
  'required_with' => 'El campo ' . mb_strtoupper(':attribute') . ' es obligatorio cuando :values está presente.',
  'required_with_all' => 'El campo ' . mb_strtoupper(':attribute') . ' es obligatorio cuando :values están presentes.',
  'required_without' => 'El campo ' . mb_strtoupper(':attribute') . ' es obligatorio cuando :values no está presente',
  'required_without_all' => 'El campo ' . mb_strtoupper(':attribute') . ' es obligatorio cuando ninguno de los valores: :values está presente.',
  'same' => 'El campo ' . mb_strtoupper(':attribute') . ' y :other deben coincidir.',
  'size' => [
    'numeric' => 'El campo ' . mb_strtoupper(':attribute') . ' must be :size.',
    'file' => 'El campo ' . mb_strtoupper(':attribute') . ' must be :size kilobytes.',
    'string' => 'El campo ' . mb_strtoupper(':attribute') . ' must be :size caracteres.',
    'array' => 'El campo ' . mb_strtoupper(':attribute') . ' debe contener :size elementos.',
  ],
  'starts_with' => 'El campo ' . mb_strtoupper(':attribute') . ' con uno de los siguientes valores: :values',
  'string' => 'El campo ' . mb_strtoupper(':attribute') . ' debe ser una cadena.',
  'timezone' => 'El campo ' . mb_strtoupper(':attribute') . ' debe ser una zona horaria válida.',
  'unique' => 'El campo ' . mb_strtoupper(':attribute') . ' ya existe.',
  'uploaded' => 'Error al subir ' . mb_strtoupper(':attribute') . '.',
  'url' => 'El formato de ' . mb_strtoupper(':attribute') . ' es inválido.',
  'uuid' => 'El campo ' . mb_strtoupper(':attribute') . ' debe ser un UUID válido.',

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

  'attributes' => [],

];
