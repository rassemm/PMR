<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Cmgmyr\Messenger\Traits\Messagable;

class User extends Authenticatable
{
    use HasFactory,Messagable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }
    public function hasRole($role)
    {
        return $this->role()->where('title', $role)->exists();
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }


    static function boot(){
        parent::boot();

        static::created(function(Model $model){
            if($model->role_id == ""){
                $model->update([
                    'role_id' => Role::where('title','user')->first()->id,
                ]);
            }
        });

    }

    public function projects(){
        return $this->belongsToMany(Project::class);
    }
    public function soutenances(){
        return $this->belongsToMany(Soutenance::class);
    }
    public function plannings(){
        return $this->belongsToMany(Planning::class);
    }
}
