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

    'accepted'             => 'The %s must be accepted.',
    'active_url'           => 'The %s is not a valid URL.',
    'after'                => 'The %s must be a date after :date.',
    'after_or_equal'       => 'The %s must be a date after or equal to :date.',
    'alpha'                => 'The %s may only contain letters.',
    'alpha_dash'           => 'The %s may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The %s may only contain letters and numbers.',
    'array'                => 'The %s must be an array.',
    'before'               => 'The %s must be a date before :date.',
    'before_or_equal'      => 'The %s must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'The %s must be between :min and :max.',
        'file'    => 'The %s must be between :min and :max kilobytes.',
        'string'  => 'The %s must be between :min and :max characters.',
        'array'   => 'The %s must have between :min and :max items.',
    ],
    'boolean'              => 'The %s field must be true or false.',
    'confirmed'            => 'The %s confirmation does not match.',
    'date'                 => 'The %s is not a valid date.',
    'date_format'          => 'The %s does not match the format :format.',
    'different'            => 'The %s and :other must be different.',
    'digits'               => 'The %s must be :digits digits.',
    'digits_between'       => 'The %s must be between :min and :max digits.',
    'dimensions'           => 'The %s has invalid image dimensions.',
    'distinct'             => 'The %s field has a duplicate value.',
    'email'                => 'The %s must be a valid email address.',
    'exists'               => 'The selected %s is invalid.',
    'file'                 => 'The %s must be a file.',
    'filled'               => 'The %s field must have a value.',
    'image'                => 'The %s must be an image.',
    'in'                   => 'The selected %s is invalid.',
    'in_array'             => 'The %s field does not exist in :other.',
    'integer'              => 'The %s must be an integer.',
    'ip'                   => 'The %s must be a valid IP address.',
    'ipv4'                 => 'The %s must be a valid IPv4 address.',
    'ipv6'                 => 'The %s must be a valid IPv6 address.',
    'json'                 => 'The %s must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'The %s may not be greater than :max.',
        'file'    => 'The %s may not be greater than :max kilobytes.',
        'string'  => 'The %s may not be greater than :max characters.',
        'array'   => 'The %s may not have more than :max items.',
    ],
    'mimes'                => 'The %s must be a file of type: :values.',
    'mimetypes'            => 'The %s must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The %s must be at least :min.',
        'file'    => 'The %s must be at least :min kilobytes.',
        'string'  => 'The %s must be at least :min characters.',
        'array'   => 'The %s must have at least :min items.',
    ],
    'not_in'               => 'The selected %s is invalid.',
    'numeric'              => 'The %s must be a number.',
    'present'              => 'The %s field must be present.',
    'regex'                => 'The %s format is invalid.',
    'required'             => 'The %s field is required.',
    'required_if'          => 'The %s field is required when :other is :value.',
    'required_unless'      => 'The %s field is required unless :other is in :values.',
    'required_with'        => 'The %s field is required when :values is present.',
    'required_with_all'    => 'The %s field is required when :values is present.',
    'required_without'     => 'The %s field is required when :values is not present.',
    'required_without_all' => 'The %s field is required when none of :values are present.',
    'same'                 => 'The %s and :other must match.',
    'size'                 => [
        'numeric' => 'The %s must be :size.',
        'file'    => 'The %s must be :size kilobytes.',
        'string'  => 'The %s must be :size characters.',
        'array'   => 'The %s must contain :size items.',
    ],
    'string'               => 'The %s must be a string.',
    'timezone'             => 'The %s must be a valid zone.',
    'unique'               => 'The %s has already been taken.',
    'uploaded'             => 'The %s failed to upload.',
    'url'                  => 'The %s format is invalid.',

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

    'attributes' => [],

];
