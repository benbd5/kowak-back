<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Class Features
 * @package App\Models
 *
 * @property integer $featuresId
 * @property integer $desk
 * @property integer $computerScreen
 * @property integer $kitchen
 * @property integer $handicappedPersonsAccess
 * @property integer $workSpaceId
 */
class Features extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'features';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'featuresId';

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
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'featuresId',
        'surface',
        'desk',
        'computerScreen',
        'kitchen',
        'handicappedPersonsAccess',
        'parking',
        'projector',
        'workSpaceId',
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
        'featuresId' => [],
        'surface' => [],
        'desk' => [],
        'computerScreen' => [],
        'kitchen' => [],
        'handicappedPersonsAccess' => [],
        'parking' => [],
        'projector' => [],
        'workSpaceId' => [],

//        'workSpaceId' => [
//            'relation' => 'workSpace',
//            'required' => true,
//            'rules' => [
//                'integer',
//                'exists:workSpace,workSpaceId',
//            ],
//        ],

    ];

    public function workSpace(): BelongsTo
    {
        return $this->belongsTo(WorkSpace::class, 'workSpaceId', 'workSpaceId');
    }
}
