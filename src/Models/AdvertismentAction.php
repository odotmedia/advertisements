<?php

namespace Odotmedia\Advertisements\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class AdvertisementAction extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'advertisement_actions';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'advertisement_id',
        'user_id',
        'action_type',
        'clicked_at',
    ];

    /**
     * Advertisement that the action belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }

    /**
     * User who took the action of the advertisement.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(Config::get('odotmedia.advertisements.user.model'));
    }
}