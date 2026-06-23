<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Model;

class EventsType extends Model
{
    public $timestamps = false;
    protected $table = "events_type";
    protected $primaryKey = 'id';
    protected $fillable = ["id","typeName"];
}
