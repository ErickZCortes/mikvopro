<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $fillable = ['name_profile', 'addpool_profile', 'vsubida_profile', 'vdescarga_profile','cost_profile','typet_profile'];
}
