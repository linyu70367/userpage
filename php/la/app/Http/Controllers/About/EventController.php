<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Models\Events\Events;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        //distinct:去除重複
        //pluck:提取，取得years欄位名稱
        //selectRaw:取得查詢欄位，因為有year(dates)，year是函式，所以用selectRaw
        $years = events::selectRaw("year(dates) as years")->distinct()->pluck("years");
        $list = (new Events())->getList();
        // $events = new Events();
        // $list = $events->getList();

        return view("front.about.events.list", compact("years", "list"));
        
    }
    //
}
