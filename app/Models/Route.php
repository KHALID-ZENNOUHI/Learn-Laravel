<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name'];

    /**
     * The permissions that belong to the route.
     */
    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
