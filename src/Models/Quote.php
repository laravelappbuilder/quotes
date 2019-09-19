<?php

namespace Quotes\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $table = 'quotes';
    protected $fillable = ['category','quote','author'];
}
