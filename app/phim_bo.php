<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class phim_bo extends Model
{
    use SoftDeletes;
    protected $table = 'phim_bos';
}
