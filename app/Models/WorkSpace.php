<?php

namespace App\Models;

use Overtrue\LaravelFavorite\Traits\Favoriteable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class WorkSpace
 * @package App\Models
 *
 * @property integer $workSpaceId
 * @property string $name
 * @property string $region
 * @property string $zipCode
 * @property string $departement
 * @property string $city
 * @property string $latitude
 * @property string $longitude
 */
class WorkSpace extends Model
{

    use HasFactory, Favoriteable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'workSpace';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'workSpaceId';

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
        'workSpaceId',
        'name',
        'region',
        'zipCode',
        'departement',
        'city',
        'adress',
        'latitude',
        'longitude',
        'description',
        'surface',
        'desk',
        'computerScreen',
        'kitchen',
        'handicappedPersonsAccess',
        'parking',
        'projector',
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
        'workSpaceId' => [],
        'name' => ['required', 'string', 'max:255'],
        'region' => ['required', 'string', 'max:255'],
        'zipCode' => ['required', 'string', 'max:10'],
        'departement' => ['required', 'string', 'max:255'],
        'city' => ['required', 'string', 'max:255'],
        'adress' => ['required', 'string', 'max:255'],
        'latitude' => ['required'],
        'longitude' => ['required'],
        'description' => ['required', 'string'],
        'surface' => ['required', 'integer'],
        'desk' => ['required', 'integer'],
        'computerScreen' => ['required', 'integer'],
        'kitchen' => ['required', 'boolean'],
        'handicappedPersonsAccess' => ['required', 'boolean'],
        'parking' => ['required', 'boolean'],
        'projector' => ['required', 'boolean'],
    ];

    public function usersAppartenir(): BelongsToMany
    {
        return $this->belongsToMany(Users::class, 'appartenir', 'workSpaceId', 'userId');
    }

    public function usersLocation(): BelongsToMany
    {
        return $this->belongsToMany(Users::class, 'location', 'workSpaceId', 'userId');
    }

    public function features(): HasMany
    {
        return $this->hasMany(Features::class, 'workSpaceId', 'workSpaceId');
    }
}
