<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soutenance extends Model
{
    use HasFactory;
    protected $fillable =['project_id','status_t','status'];


    protected $attributes = [
        'status_t' => 'pending',
        'status' => 0,
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function planning()
    {
        return $this->hasMany(Planning::class);
    }
}
