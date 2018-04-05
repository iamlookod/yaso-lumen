<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'unit_member';

    public $timestamps = false;

    protected $primaryKey = 'unit_member_id';
}
