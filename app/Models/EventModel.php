<?php

namespace App\Models;

use  Eloquent;
use  MaddHatter\LaravelFullcalendar\IdentifiableEvent;

use Illuminate\Database\Eloquent\Model;

class EventModel extends Model implements \MaddHatter\LaravelFullcalendar\Event
{
    //
    protected $dates = ['title','date', 'end'];
    protected $table = 'appointment_schedule';

    public function getId() {
        return $this->id;
    }

    /**
     * Get the event's title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Is it an all day event?
     *
     * @return bool
     */
    public function isAllDay()
    {
        return (bool)$this->all_day;
    }

    /**
     * Get the start time
     *
     * @return DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Get the end time
     *
     * @return DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }
    // Implement all Event methods ...

    /**
     * Get the event's ID
     *
     * @return int|string|null
     */
}
