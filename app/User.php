<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App
 * @property array|Collection upVotes
 * @property array|Collection downVotes
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function downVotes()
    {
        return $this->belongsToMany(Gag::class, 'user_down_votes');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function upVotes()
    {
        return $this->belongsToMany(Gag::class, 'user_votes');
    }

    public function getVotes(Gag $gag)
    {
        $is_liked = $this->upVotes->contains($gag);
        $is_disliked = $this->downVotes->contains($gag);
        return [
            'is_user_liked'=>$is_liked,
            'is_user_disliked'=>$is_disliked
        ];
    }
}
