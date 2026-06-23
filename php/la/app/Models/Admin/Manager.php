<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    public $timestamps = false;
    protected $table = "manager";
    protected $primaryKey = 'id';
    protected $fillable = ["id","userId","pwd"];

    public function getManager($userId, $pwd){
        // first:取第一筆
        // self::manager資料表，正確來說是Manager這個物件，因為Manager物件是存取manager這個資料表，所以self代表manager資料表
        //function getManager(string $userId, string $pwd){      在java一定要寫資料型態，php可以不用寫
        // php的function 等同於 java的method
        
        $manager = self::where("userId",$userId)->where("pwd",$pwd)->first();
        // self::where("userId",$userId)->where("pwd",$pwd)->first();
        // select*from manager WHERE userId='xxx' AND pwd='yyy' LIMIT 1
        // $manager = DB::table("manager")->where("userId",$userId)->where("pwd",$pwd)->first();也可以這樣寫
        // 寫程式最重要資安
        /*
        userId = 111
        userId = 1' or '1'='1' 資料隱碼，資料注入SQL injection
        pwd = 1' or '1'='1'
        "SELECT * FROM manager WHERE userId='$userId' AND pwd='$pwd' LIMIT 1";
        早期寫程式常見的漏洞。
        "SELECT * FROM manager WHERE userId= ? AND pwd= ? LIMIT 1",['111','111']; 參數化查詢prepared statament
        */

        return $manager;
    }
}
