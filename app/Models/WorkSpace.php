<?php

namespace App\Models;

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

    use HasFactory;

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

        'latitude',

        'longitude',

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

        'name' => [],

        'region' => [],

        'zipCode' => [],

        'departement' => [],

        'city' => [],

        'latitude' => [],

        'longitude' => [],

        'featuresId' => [],

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
