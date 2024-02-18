<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = [
        'route_id',
        'role_id',
        'name',
    ];

    /**
     * The role that the permission belongs to.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * The route that the permission belongs to.
     */
    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}
