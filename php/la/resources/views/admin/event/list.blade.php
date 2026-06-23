@extends("admin.layout")
@section("title", "記事管理")
@section("content")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
<link rel="stylesheet" href="/css/admin/event-color.css" />
<script src="https://code.jquery.com/jquery-4.0.0.min.js"></script>
<script>
function getList()
{
    // var或let宣告變數都可以，只是版本不同
    // document本文(這個網頁)，getDocumentById以Id取得元素，value所輸入的值
    // var years=document.getElementById("years").value; //沒有用jQuery的寫法
    // let keyword=document.getElementById("keyword").value; //沒有用jQuery的寫法

    var years = $("#years").val();
    var keyword = $("#keyword").val();
    $.ajax({ //非同步、多工處理
        url:"/admin/event/getList",
        type:"get",
        data:{
            year:years,//後端用year接收，前端選取輸入的years
            _token:"{{csrf_token()}}"
        },
        success:function(msg){
            //msg後端傳回來的資料，不一定要用msg可以自己取名稱
            //html：用html語法，將後端回傳的資料，在id=list的地方呈現
            $("#list").html(msg); //6.17上課停在這裡
        },
        

    });
    

}

</script>


<div class="app-content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-2 text-center">
                        <a href="/admin/event/create" class="btn btn-primary">新增</a>
                    </div>
                    <div class="col-2 text-center">
                        <a href="#" class="btn btn-danger">刪除</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 text-center">
                        <select id="years" class="form-control border border-dark mt-3" onchange="getList()">
                            <!-- onchange有變化的時候呼叫getList這寫在javascript裡面 -->
                            <option value="">年度</option>
                            @if(!empty($years))
                                @foreach($years as $data)
                                    <option value="{{$data}}">{{$data}}年</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-3 text-center">
                    <input type="text" id="keyword" 
                        class="form-control mt-3 border border-dark" placeholder="關鍵字..."
                        onkeyup="getList()"
                    >
                    <!-- javescript用id來接收 -->
                    <!-- onkeypress=onkeydown=onkeyup -->
                </div>

            </div>
            <div class="card-body">
                <table class="table border border-dark">
                    <tr class="table table-warning">
                        <td class="text-center">
                            <input type="checkbox" id="all" class="form-check-input border border-dark">
                        </td>
                        <td class="col-1 text-center border border-dark">類別</td>
                        <td class="col-2 text-center border border-dark">標題</td>
                        <td class="col-4 text-center border border-dark">內容</td>
                        <td class="col-1 text-center border border-dark">icon</td>
                        <td class="col-1 text-center border border-dark">顏色</td>
                        <td class="col-1 text-center border border-dark">日期</td>
                        <td class="col-1 text-center border border-dark">修改</td>
                    </tr>
                    @if(!empty($list))
                    @foreach($list as $data)
                    <tr>
                        <td class="col-1 text-center border border-dark">
                            <input type="checkbox" id="id[]" value="{{$data->id}}" class="form-check-input border border-dark">
                        </td>
                        <td class="col-1 text-center border border-dark">{{$data->typeName}}</td>
                        <td class="col-1 text-center border border-dark">{{$data->title}}</td>
                        <td class="col-1 text-center border border-dark">{{$data->content}}</td>
                        <td class="col-1 text-center border border-dark">
                            <i class="fa {{$data->icon}}"></i>
                        </td>
                        <td class="col-1 text-center border border-dark">
                            <span class="event-tag tag-{{$data->color}}">顏色</span>
                        </td>
                        <td class="col-1 text-center border border-dark">{{$data->dates}}</td>
                        <td class="col-1 text-center border border-dark">
                            <a href="edit{{$data->id}}" class="btn btn-success">修改</a>
                        </td>
                    </tr>

                    @endforeach


                    @endif
                </table>

            </div>
        </div>


    </div>
</div>
@endsection