<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Model;

class EventsIcon extends Model
{
    public $timestamps = false;
    protected $table = "events_icon";
    protected $primaryKey = 'id';
    protected $fillable = ["id","icon"];
}
