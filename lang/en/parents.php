<?php

use App\Enums\JobType;
use App\Enums\ParentType;

return [
    'title' => 'Parents',
    'subtitle' => 'Natural parents of the applicant',
    'parent_type' => 'Parent part',
    'lastname' => 'Lastname',
    'firstname' => 'Firstname',
    'birthday' => 'Birthday',
    'telefon' => 'Phonenumber',
    'address' => 'Street and house number',
    'plz_ort' => 'Postal code and city',
    'since' => 'Resident since',
    'job_type' => 'Employment relationship',
    'job' => 'Occupation',
    'employer' => 'Employer',
    'married_since' => 'Married since',
    'separated_since' => 'Separated since',
    'divorced_since' => 'Divorced since',
    'death' => 'Year of death',
    'addParents' => '+ Additional parent parts',

    'parent_type_name' => [
        ParentType::father->name => 'Father',
        ParentType::mother->name => 'Mother',
        ParentType::stepfather->name => 'Stepfather',
        ParentType::stepmother->name => 'Stepmother',
    ],

    'job_type_name' => [
        JobType::selbststaendig->name => 'self-employed',
        JobType::angestellt->name => 'employed',
    ]
];
