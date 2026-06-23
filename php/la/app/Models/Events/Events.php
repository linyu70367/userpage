<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Events extends Model
{
    public $timestamps = false;
    protected $table = "events";
    protected $primaryKey = 'id';
    protected $fillable = ["id","title","content","typeid","iconId","colorId","hightLight","dates","createTime"];

    // 建立關聯
    public function types(): BelongsTo
    {
        return $this->belongsTo(EventsType::class, "typeId");
    }

    public function getIcon(): BelongsTo
    {
        return $this->belongsTo(EventsIcon::class,"iconId");
    }

    public function getColor(): BelongsTo
    {
        return $this->belongsTo(EventsColor::class,"colorId");
    }

    public function getList()
    {
        // select * from events order by dates by dates desc, createTime desc
        // self::指events這個資料表本身
        // orderbydesc從大到小排序
        // get取得全部資料
        // ::二個冒號表示這個方法是靜態(static)的
        // 靜態(static)不用產生物件即可使用
        //第一種寫法 $list = self::orderByDesc("dates")->orderByDesc("createTime")->get();

        $list = DB::table("$this->table as a")
	->selectRaw("a.id, a.title, a.content, a.highLight, a.dates, a.createTime, year(a.dates) as years, month(a.dates) as months, b.color, c.icon, d.typeName")
    ->leftJoin("events_color as b","a.colorId", "b.id")
    ->leftJoin("events_icon as c", "a.iconId", "c.id")
    ->leftJoin("events_type as d", "a.typeId", "d.id")
	->orderByDesc("dates")->orderbydesc("createTime") //也可以用orderby("dates", "desc")
	->get();
        return $list;
    }

}
