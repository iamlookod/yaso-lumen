<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status_member';

    public $timestamps = false;

    protected $primaryKey = 'status_member_id';
}
