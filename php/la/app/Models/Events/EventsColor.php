<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Model;

class EventsColor extends Model
{
    public $timestamps = false; #系統預設會加入時間，但表格沒有這個欄位
    protected $table = "events_color";
    protected $primaryKey = 'id';
    protected $fillable = ["id","color"];
}
