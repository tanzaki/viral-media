<?php
/**
 * Created by PhpStorm.
 * User: qtvha
 * Date: 6/27/2017
 * Time: 4:02 AM
 */

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Gag
 * @package App
 * @mixin \Eloquent
 * @property array|Collection upVotes
 * @property array|Collection downVotes
 */
class Gag extends Model
{
    public function countVotes()
    {
        return ($this->upVotes->count() - $this->downVotes->count());
    }

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
}
