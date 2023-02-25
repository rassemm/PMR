<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;


    protected $fillable =['titre','description','ste','class','status',
];


    public function user(){
        return $this->belongsToMany('App\Models\User');
    }
    public function soutenance()
    {
        return $this->hasOne(Soutenance::class);
    }
     public function createSoutenance()
{
    $this->soutenance()->create([
        'status_t' => 'pending',
        'status' => 0,
    ]);
}
}
