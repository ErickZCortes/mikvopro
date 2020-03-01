<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Router extends Model
{
    protected $table = 'routers';
    protected $fillable = ['model_router', 'router_description', 'ip_router', 'user_router'];
}