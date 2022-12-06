<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cust_store extends Model
{
    use HasFactory;
    /**
* The table associated with the model.
*
* @var string
*/
protected $table = 'furniture';
/**
* The attributes that aren't mass assignable.
*
* @var array
*/
protected $guarded = [];
/**
* Indicates if the model should be timestamped.
*
* @var bool
*/
public $timestamps = false;
}
