<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use App\Models\Events\Events;
use Illuminate\Http\Request;

class AdminEventController extends Controller
{
    public function index()
    {
        $list = (new Events())->getList();

        $years = Events::selectRaw("YEAR(dates) AS years")->distinct()->pluck("years");

        return view("admin.event.list",compact("list","years"));
    }
}
