<?php

namespace Odotmedia\Advertisements\Models;

use Illuminate\Database\Eloquent\Model;
use Odotmedia\Advertisements\Models\AdvertisementAction;
use Odotmedia\Support\Traits\UuidTrait;

class Advertisement extends Model
{
    use UuidTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'advertisements';

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
        'advertisement_request_id',
        'title',
        'image_url',
        'click_url',
        'status',
        'published_at',
        'ending_at',
    ];

    public function clicks()
    {
        return $this->hasMany(AdvertisementAction::class)->where('action_type', 'click');
    }
}