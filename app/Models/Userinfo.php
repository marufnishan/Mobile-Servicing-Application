<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'fathername',
        'mothername',
        'trainingname',
        'cirtificateno',
        'village',
        'postoffice',
        'province',
        'district',
        'nid',
        'birthdate',
        'phone',
        'parentphone',
        'emailfb',
        'picture',
        'phone_model'
    ];
}
