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

    'accepted' => ':attribute қабылдануы керек.',
    'accepted_if' => ':other :value өге сайкес болғанда :attribute қабылдануы керек.',
    'active_url' => ':attribute жарамды URL емес.',
    'after' => ':attribute мына күннен кейін болуы керек :date.',
    'after_or_equal' => ':attribute мына күннен кейін немесе тең болуы керек :date.',
    'alpha' => ':attribute тек әріптер болуы керек.',
    'alpha_dash' => ':attribute тек әріптер, сандар, сызықшалар мен _ керек.',
    'alpha_num' => ':attribute тек әріптер мен сандарды қамтуы керек.',
    'array' => ':attribute массив болуы керек.',
    'before' => ':attribute мына күннен бұрын болуы керек :date.',
    'before_or_equal' => ':attribute мына күннен бұрын немесе оған тең болуы керек :date.',
    'between' => [
        'array' => ':attribute :min және :max арасындағы элементтерді қамтуы керек.',
        'file' => ':attribute :min және :max килобайтқа дейін болуы керек.',
        'numeric' => ':attribute :min және :max арасында болу керек.',
        'string' => ':attribute :min және :max таңбалары арасында болуы керек.',
    ],
    'boolean' => ':attribute шын немесе жалған болуы керек.',
    'confirmed' => ':attribute растауы сәйкес келмейді.',
    'current_password' => 'Құпия сөз қате.',
    'date' => ':attribute күн емес.',
    'date_equals' => ':attribute мына күн болу керек :date датой.',
    'date_format' => ':attribute :format форматына сәйкес келмейді.',
    'declined' => ':attribute қабылданбауы керек.',
    'declined_if' => ':attribute :other тең :value болған кезде қабылданбауы керек.',
    'different' => ':attribute және :other екеуі әр түрлі болуы керек.',
    'digits' => ':attribute :digits сандары болуы керек.',
    'digits_between' => ':attribute :min жане :max арасында болуы керек .',
    'dimensions' => ':attribute жарамсыз кескін өлшемдері бар.',
    'distinct' => ':attribute өрісі қайталанатын мәнге ие.',
    'doesnt_end_with' => ':attribute келесі мәндердің бірімен аяқталмауы мүмкін following: :values.',
    'doesnt_start_with' => ':attribute келесі мәндердің біреуінен басталмауы мүмкін following: :values.',
    'email' => ':attribute жарамды электрондық пошта мекенжайы болуы керек.',
    'ends_with' => ':attribute келесі мәндердің бірімен аяқталуы керек following: :values.',
    'enum' => 'Таңдалған :attribute жарамсыз.',
    'exists' => 'Таңдалған :attribute жарамсыз.',
    'file' => ':attribute файл болу керек.',
    'filled' => ':attribute толтырылуы керек.',
    'gt' => [
        'array' => ':attribute :value мәнінен үлкен болуы керек.',
        'file' => ':attribute :value килобайт мәнінен үлкен болуы керек.',
        'numeric' => ':attribute :value мәнінен үлкен болуы керек.',
        'string' => 'The :attribute must be greater than :value characters.',
    ],
    'gte' => [
        'array' => ':attribute :value элементтері құрамында немесе одан көп болуы керек.',
        'file' => ':attribute :value килобайттан үлкен немесе тең болуы керек.',
        'numeric' => ':attribute келесі мәннен үлкен немесе тең болуы керек :value.',
        'string' => ':attribute :value таңбалардан үлкен немесе тең болуы керек.',
    ],
    'image' => ':attribute сурет болуы керек.',
    'in' => 'Таңдалған :attribute жарамсыз.',
    'in_array' => ':attribute :other арасында жоқ.',
    'integer' => ':attribute бүтін сан болуы керек.',
    'ip' => ':attribute жарамды IP мекенжайы болуы керек.',
    'ipv4' => ':attribute жарамды IPv4 мекенжайы болуы керек.',
    'ipv6' => ':attribute жарамды IPv6 мекенжайы болуы керек.',
    'json' => ':attribute жарамды JSON жолы болуы керек.',
    'lt' => [
        'array' => ':attribute :value мәнінен аз элементтер болуы керек.',
        'file' => ':attribute :value килобайттан  аз болуы керек.',
        'numeric' => ':attribute келесі мәннен аз болуы керек :value.',
        'string' => ':attribute :value таңбаларынан кішірек болуы керек .',
    ],
    'lte' => [
        'array' => ':attribute :value мәнінен артық элементтер болмауы керек.',
        'file' => ':attribute :value килобайттан аз немесе оған тең болуы керек.',
        'numeric' => ':attribute келесі мәнге кем немесе тең болуы керек :value.',
        'string' => ':attribute :value таңбалардан аз немесе оған тең болуы керек.',
    ],
    'mac_address' => ':attribute жарамды MAC мекенжайы болуы керек.',
    'max' => [
        'array' => ':attribute :max элементтерінен артық болмауы керек.',
        'file' => ':attribute :max килобайттан аспауы керек.',
        'numeric' => ':attribute :max мәнінен аспауы керек.',
        'string' => ':attribute :max таңбаларынан аспауы керек .',
    ],
    'max_digits' => ':attribute :max санынан артық болмауы керек.',
    'mimes' => ':attribute келесідей файл түрі болуы керек: :values.',
    'mimetypes' => ':attribute келесідей файл түрі болуы керек: :values.',
    'min' => [
        'array' => ':attribute кем дегенде :min элеметтері болуы керек.',
        'file' => ':attribute кем дегенде :min килобайт болуы керек.',
        'numeric' => ':attribute :min санынан кем емес болуы керек.',
        'string' => ':attribute кем дегенде :min таңбалары болуы керек.',
    ],
    'min_digits' => ':attribute - та :min сандары кем дегенде болуы керек.',
    'multiple_of' => ':attribute :value мәніне еселік болуы керек.',
    'not_in' => 'Таңдалған :attribute жарамсыз.',
    'not_regex' => ':attribute форматы жарамсыз.',
    'numeric' => ':attribute сан болуы керек.',
    'password' => [
        'letters' => ':attribute кем дегенде бір әріп қамтуы керек.',
        'mixed' => ':attribute кем дегенде бір бас әріп пен бір кіші әріп қамтуы керек.',
        'numbers' => ':attribute кем дегенде бір сан қамтуы керек',
        'symbols' => ':attribute кем дегенде бір таңба қамтуы керек.',
        'uncompromised' => 'Берілген :attribute деректердің бұзылуынан пайда болды. Басқа :attribute таңдаңыз',
    ],
    'present' => ':attribute бар болуы керек.',
    'prohibited' => ':attribute қабылданбайды.',
    'prohibited_if' => ':other және :value бірдей болғанда :attribute қабылданбайды.',
    'prohibited_unless' => ':other және :values бірдей болғанда :attribute қабылданбайды.',
    'prohibits' => ':other болмағанда :attribute қабылданбайды.',
    'regex' => ':attribute формат қолайсыз.',
    'required' => ':attribute өрісі маңызды.',
    'required_array_keys' => ':attribute толтырылуы керек: :values.',
    'required_if' => ':other :value болғанда :attribute  маңызды.',
    'required_if_accepted' => ':other қабылданғанда :attribute маңызды.',
    'required_unless' => ':other :values ішінде болғанда :attribute маңызды болады.',
    'required_with' => ':values бар кезде :attribute маңызды',
    'required_with_all' => ':values бар кезде :attribute маңызды.',
    'required_without' => ':values болмаған кезде :attribute маңызды.',
    'required_without_all' => 'Егер :values бір-де бірі жоқ болса :attribute маңызды болып табылады.',
    'same' => ':attribute және :other сәйкес келуі керек.',
    'size' => [
        'array' => ':attribute :size элемент қамтуы керек.',
        'file' => ':attribute өлшемі :size килобайт болуы керек.',
        'numeric' => ':attribute :size өлшемді болуы керек.',
        'string' => ':attribute өлшемі :size болуы керек.',
    ],
    'starts_with' => ':attribute келесілердің бірінен басталуы керек: :values.',
    'string' => ':attribute жол(string) болуы керек.',
    'timezone' => ':attribute рұқсат етілген уақыт белдеуі болуы керек.',
    'unique' => ':attribute бұрыннан қолданылған .',
    'uploaded' => ':attribute төлсипатты жүктеу мүмкін болмады.',
    'url' => ':attribute жарамды URL болуы керек.',
    'uuid' => ':attribute жарамды UUID болуы керек.',

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
