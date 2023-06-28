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

    'accepted' => 'Laukam :attribute jābūt pieņemtam.',
    'accepted_if' => 'Laukam :attribute jābūt pieņemtam, ja :other ir :value.',
    'active_url' => 'Laukam :attribute jābūt derīgai URL adresei.',
    'after' => 'Laukam :attribute jābūt datumam pēc :date.',
    'after_or_equal' => 'Laukam :attribute jābūt datumam pēc vai vienādam ar :date.',
    'alpha' => 'Lauks :attribute drīkst saturēt tikai burtus.',
    'alpha_dash' => 'Lauks :attribute drīkst saturēt tikai burtus, ciparus, domuzīmes un pasvītras.',
    'alpha_num' => 'Lauks :attribute drīkst saturēt tikai burtus un ciparus.',
    'array' => 'Laukam :attribute jābūt masīvam.',
    'before' => 'Laukam :attribute jābūt datumam pirms :date.',
    'before_or_equal' => 'Laukam :attribute jābūt datumam pirms vai vienādam ar :date.',
    'between' => [
        'numeric' => 'Lauka :attribute vērtībai jābūt starp :min un :max.',
        'file' => 'Lauka :attribute izmēram jābūt starp :min un :max kilobaitiem.',
        'string' => 'Lauka :attribute garumam jābūt starp :min un :max rakstzīmēm.',
        'array' => 'Laukam :attribute jābūt starp :min un :max vienumiem.',
    ],
    'boolean' => 'Laukam :attribute jābūt patiesam vai nepatiesam.',
    'confirmed' => 'Lauka :attribute apstiprinājums nesakrīt.',
    'current_password' => 'Parole nav pareiza.',
    'date' => 'Laukam :attribute jābūt derīgam datumam.',
    'date_equals' => 'Laukam :attribute jābūt datumam vienādam ar :date.',
    'date_format' => 'Lauks :attribute neatbilst formātam :format.',
    'declined' => 'Laukam :attribute jābūt noraidītam.',
    'declined_if' => 'Laukam :attribute jābūt noraidītam, ja :other ir :value.',
    'different' => 'Lauka :attribute un :other vērtībām jābūt atšķirīgām.',
    'digits' => 'Laukam :attribute jāsatur :digits ciparus.',
    'digits_between' => 'Lauka :attribute vērtībai jābūt starp :min un :max cipariem.',
    'dimensions' => 'Laukam :attribute ir nederīgi attēla izmēri.',
    'distinct' => 'Laukam :attribute ir dublēta vērtība.',
    'email' => 'Laukam :attribute jābūt derīgai e-pasta adresei.',
    'ends_with' => 'Laukam :attribute jābeidzas ar vienu no šiem: :values.',
    'enum' => 'Izvēlētā :attribute vērtība ir nederīga.',
    'exists' => 'Izvēlētais :attribute ir nederīgs.',
    'file' => 'Laukam :attribute jābūt failam.',
    'filled' => 'Laukam :attribute jābūt aizpildītam.',
    'gt' => [
        'numeric' => 'Lauka :attribute vērtībai jābūt lielākai par :value.',
        'file' => 'Lauka :attribute izmēram jābūt lielākam par :value kilobaitiem.',
        'string' => 'Lauka :attribute garumam jābūt lielākam par :value rakstzīmēm.',
        'array' => 'Laukam :attribute jāsatur vairāk kā :value vienumi.',
    ],
    'gte' => [
        'numeric' => 'Lauka :attribute vērtībai jābūt lielākai vai vienādai ar :value.',
        'file' => 'Lauka :attribute izmēram jābūt lielākam vai vienādam ar :value kilobaitiem.',
        'string' => 'Lauka :attribute garumam jābūt lielākam vai vienādam ar :value rakstzīmēm.',
        'array' => 'Laukam :attribute jāsatur :value vienumi vai vairāk.',
    ],
    'image' => 'Laukam :attribute jābūt attēlam.',
    'in' => 'Izvēlētais :attribute ir nederīgs.',
    'in_array' => 'Laukam :attribute nav :other vērtība.',
    'integer' => 'Laukam :attribute jābūt veselam skaitlim.',
    'ip' => 'Laukam :attribute jābūt derīgai IP adresei.',
    'ipv4' => 'Laukam :attribute jābūt derīgai IPv4 adresei.',
    'ipv6' => 'Laukam :attribute jābūt derīgai IPv6 adresei.',
    'json' => 'Laukam :attribute jābūt derīgai JSON virknei.',
    'lt' => [
        'numeric' => 'Lauka :attribute vērtībai jābūt mazākai par :value.',
        'file' => 'Lauka :attribute izmēram jābūt mazākam par :value kilobaitiem.',
        'string' => 'Lauka :attribute garumam jābūt mazākam par :value rakstzīmēm.',
        'array' => 'Laukam :attribute jāsatur mazāk par :value vienumiem.',
    ],
    'lte' => [
        'numeric' => 'Lauka :attribute vērtībai jābūt mazākai vai vienādai ar :value.',
        'file' => 'Lauka :attribute izmēram jābūt mazākam vai vienādam ar :value kilobaitiem.',
        'string' => 'Lauka :attribute garumam jābūt mazākam vai vienādam ar :value rakstzīmēm.',
        'array' => 'Laukam :attribute nedrīkst būt vairāk kā :value vienumi.',
    ],
    'mac_address' => 'Laukam :attribute jābūt derīgai MAC adresē.',
    'max' => [
        'numeric' => 'Lauka :attribute vērtība nedrīkst pārsniegt :max.',
        'file' => 'Lauka :attribute izmērs nedrīkst pārsniegt :max kilobaitus.',
        'string' => 'Lauka :attribute garums nedrīkst pārsniegt :max rakstzīmes.',
        'array' => 'Laukā :attribute nedrīkst būt vairāk kā :max vienumi.',
    ],
    'mimes' => 'Laukam :attribute jābūt failam ar šādu tipu: :values.',
    'mimetypes' => 'Laukam :attribute jābūt failam ar šādu tipu: :values.',
    'min' => [
        'numeric' => 'Lauka :attribute vērtībai jābūt vismaz :min.',
        'file' => 'Lauka :attribute izmēram jābūt vismaz :min kilobaitiem.',
        'string' => 'Lauka :attribute garumam jābūt vismaz :min rakstzīmēm.',
        'array' => 'Laukam :attribute jāsatur vismaz :min vienums.',
    ],
    'multiple_of' => 'Lauka :attribute vērtībai jābūt vairāku skaitļu reizinājumam.',
    'not_in' => 'Izvēlētais :attribute ir nederīgs.',
    'not_regex' => 'Lauka :attribute formāts ir nederīgs.',
    'numeric' => 'Laukam :attribute jābūt skaitlim.',
    'password' => 'Nepareiza parole.',
    'present' => 'Laukam :attribute jābūt esošam.',
    'prohibited' => 'Lauks :attribute ir aizliegts.',
    'prohibited_if' => 'Lauks :attribute ir aizliegts, ja :other ir :value.',
    'prohibited_unless' => 'Lauks :attribute ir aizliegts, ja :other nav :values.',
    'regex' => 'Lauka :attribute formāts ir nederīgs.',
    'relatable' => 'Šis :attribute varbūt nav saistāms ar šo resursu.',
    'required' => 'Lauks :attribute ir obligāts.',
    'required_if' => 'Lauks :attribute ir obligāts, ja :other ir :value.',
    'required_unless' => 'Lauks :attribute ir obligāts, ja :other nav :values.',
    'required_with' => 'Lauks :attribute ir obligāts, ja ir norādīts :values.',
    'required_with_all' => 'Lauks :attribute ir obligāts, ja ir norādīts :values.',
    'required_without' => 'Lauks :attribute ir obligāts, ja nav norādīts :values.',
    'required_without_all' => 'Lauks :attribute ir obligāts, ja nav norādīts neviens no :values.',
    'same' => 'Laukiem :attribute un :other jāsakrīt.',
    'size' => [
        'numeric' => 'Lauka :attribute vērtībai jābūt :size.',
        'file' => 'Lauka :attribute izmēram jābūt :size kilobaitiem.',
        'string' => 'Lauka :attribute garumam jābūt :size rakstzīmēm.',
        'array' => 'Laukam :attribute jāsatur :size vienums.',
    ],
    'starts_with' => 'Laukam :attribute jāsākas ar vienu no šiem: :values.',
    'string' => 'Laukam :attribute jābūt virknei.',
    'timezone' => 'Laukam :attribute jābūt derīgai laika zonai.',
    'unique' => 'Lauks :attribute jau ir aizņemts.',
    'uploaded' => 'Lauku :attribute neizdevās augšupielādēt.',
    'url' => 'Lauka :attribute formāts ir nederīgs.',
    'uuid' => 'Laukam :attribute jābūt derīgam UUID.',

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
