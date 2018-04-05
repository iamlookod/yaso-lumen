<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conditions extends Model
{
    protected $table = 'condition_member';

    public $timestamps = false;

    protected $primaryKey = 'condition_member_id';

    public $incrementing = false;
}
