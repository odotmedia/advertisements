<?php

namespace Odotmedia\Advertisements\Models;

use Illuminate\Database\Eloquent\Model;

class AdvertisementRequest extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'advertisement_requests';

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
        'user_id',
        'title',
        'image_url',
        'click_url',
        'stripe_charge_id',
    ];

    /**
     * Advertisement that has been converted.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function advertisement()
    {
        return $this->hasOne(Advertisement::class);
    }

    /**
     * User who requested an advertisement.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(Config::get('odotmedia.advertisements.user.model'));
    }
}