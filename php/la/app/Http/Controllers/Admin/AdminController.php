<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Manager;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        return view("admin.home");
    }

    public function login()
    {
        return view("admin.login");
    }
    public function loginv2()
    {
        return view("admin.loginv2");
    }
    public function dologin(Request $req)
    {
        //帳號$req:表單送過來的資料
        $userId = $req->userId;
        //密碼
        $pwd = $req->pwd;
        //驗證碼
        $code = $req->code;
        if(captcha_check($code) == false)
            {
                /*
                back:回到上一頁
                withInput:保留原本在上一頁所輸入的資料
                withErrors:將錯誤訊息傳回上一頁
                exit:結束程式執行
                */
                return back()->withInput()->withErrors(["code"=>"驗證碼錯誤"]);
                exit;
            }
            /*可以這樣寫
                $mem = new Manager()
                $manager = $mem->getManager($userId, $pwd);
            */
            $manager = (new Manager())->getManager($userId, $pwd);
            // $mem = new Manager();
            // $manager = $mem->getManager($userId, $pwd);
            if (empty($manager))
            {
                return back()->withInput()->withErrors(["none"=>"帳號或密碼錯誤"]);
            }else{
                session()->put("userId", $userId);//暫存在session
                return redirect("/admin/home");
            }
            /*
                1.如果輸入的驗證碼是正確的
                2.如果輸的帳號及密碼是正確的
                3.將userId暫存在記憶體中(session)，put:存入
                4.轉址(redirect)到admin/home
                5.routes/admin/admin.php Route::get("/admin/home", [AdminController::class, "home"])->middleware("manager");
                6.要進入admin/home這個網址前，會先進入manager這個中介程式(middleware)
                7.middleware("manager")中的manager要在bootstrap/app.php中的withMiddle有設定"manager"這個別名
                8.manager這個別名，代表CheckManager這個中介程式
                9.CheckManager中會先取出是否存在記憶體中有暫存登入的帳號資料(userId)
                10.如果記憶體中沒有(empty)暫存的userId，表示沒有登入或登入成功過，此時會轉址到/admin
                11.如果記憶體中有(不是empty)暫存的userId，則進入/admin/home
            */

    }
}

