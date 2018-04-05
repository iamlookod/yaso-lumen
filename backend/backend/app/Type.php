<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'type_member';

    public $timestamps = false;

    protected $primaryKey = 'type_member_id';
}
