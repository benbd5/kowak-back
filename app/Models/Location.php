<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Class Location
 * @package App\Models
 *
 * @property integer $workSpaceId
 * @property integer $userId
 * @property string $startDate
 * @property string $endDate
 */
class Location extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'location';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'locationId';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

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
        'locationId',
        'workSpaceId',
        'userId',
        'startDate',
        'endDate',
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

        'locationId' => [],

        'workSpaceId' => [],

        'userId' => [],

        'startDate' => [],

        'endDate' => [],

    ];


}
