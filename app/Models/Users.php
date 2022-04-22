<?php

namespace App\Models;

use ChristianKuri\LaravelFavorite\Traits\Favoriteability;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Overtrue\LaravelFavorite\Traits\Favoriter;

/**
 * Class Users
 * @package App\Models
 *
 * @property integer $userId
 * @property string $firstName
 * @property string $lastName
 * @property string $phone
 * @property string $email
 * @property string $password
 */
class Users extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Favoriter;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'userId';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'userId',

        'firstName',

        'lastName',

        'phone',

        'email',

        'password',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    const RuleList = [

        'userId' => [],

        'firstName' => [],

        'lastName' => [],

        'phone' => [],

        'email' => [],

        'password' => [],

    ];

    public function workSpaceAppartenir(): BelongsToMany
    {
        return $this->belongsToMany(WorkSpace::class, 'appartenir', 'userId', 'workSpaceId');
    }

    public function workSpaceLocation(): BelongsToMany
    {
        return $this->belongsToMany(WorkSpace::class, 'location', 'userId', 'workSpaceId');
    }

    public function getFavoritesWorkspaces(): HasMany
    {
//        return $this->belongsToMany(WorkSpace::class, 'favorites', 'user_id', 'user_id');
        return $this->hasMany(WorkSpace::class, );
    }
}
