<?php

namespace App\Models;
use App\Models\branch;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    public $fillable = array('branchid', 'cname');
}
