<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commet extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $guarded = [];
    public $timestamps = false;
}
