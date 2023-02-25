<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    use HasFactory;

    protected $fillable = ['soutenance_id', 'date', 'salle','note','mention'];

    protected $attributes = [
        'note' => 0,
        'mention' => 'Ajourne',
    ];
    public function users()
    {
        return $this->BelongsToMany(User::class);
    }
    public function soutenance()
    {
        return $this->belongsTo(Soutenance::class);
    }


}
