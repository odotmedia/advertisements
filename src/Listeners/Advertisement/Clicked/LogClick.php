<?php

namespace Odotmedia\Advertisements\Listeners\Advertisement\Clicked;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Odotmedia\Advertisements\Contracts\AdvertisementActionInterface;
use Odotmedia\Advertisements\Events\Advertisement\Clicked;
use Odotmedia\Advertisements\Models\AdvertisementAction;

class LogClick implements ShouldQueue
{
    /**
     * Advertisement action interface.
     *
     * @var AdvertisementActionInterface
     */
    private $advertisementAction;

    /**
     * Fillable model attributes.
     *
     * @var array
     */
    private $fillable = [];

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->advertisementAction = App::make(AdvertisementActionInterface::class);
        $model = new AdvertisementAction();
        $this->fillable = $model->getFillable();
    }

    /**
     * Handle the event.
     *
     * @param Clicked $event
     *
     * @return void
     */
    public function handle(Clicked $event)
    {
        $attributes = [];

        foreach ($this->getFillable() as $option) {
            $attributes = Arr::add($attributes, $option, $event->$option);
        }

        $this->advertisementAction->create($attributes);
    }

    /**
     * Get models fillable attributes.
     *
     * @return array
     */
    private function getFillable()
    {
        return $this->fillable;
    }
}
