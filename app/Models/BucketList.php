<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BucketList extends Model
{
    use HasFactory;

    public $table = 'bucketLists';
    protected $fillable = [
        'name', 'price', 'type' 
    ];
}
