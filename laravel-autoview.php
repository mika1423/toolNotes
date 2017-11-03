<!-- laravel-fanswoo 常用查詢 -->

<!-- models -->
    const SoftDeletes = FALSE; // 不使用軟刪除功能
    public $timestamps = FALSE; // 不使用時間戳記
    protected $dates = []; // 不使用時間戳記

length 
<!-- autoview link-->
$this->AutoView->link('base/deletePost'),
<!-- 塞假資料 TEST-->
<!-- http://localhost/pmauriat/api/test -->

dd($NoteField->getValidatorMessage());
// 前端 日期 format
<script>
{{$NoteField->createdAt->format('Y-m-d')}}
</script>
<?php
// 後端
$ORM->dayoffAtFormat = $ORM->dayoffAt->format('Y-m-d');
//後端 取user ID
use Auth;
[
'defaultValue' => Auth::getUser()->id;
Auth::getUser()->email;
]


 //auto 欄位應用 

    [
    'inputPlaceholder' => '請填寫樂器售價',
    'explanation' => '請填寫樂器規格',
    'inputValidator' => ['required']
    ];

//message return
return message([
    'text' => '草稿預覽中...',
    'url' => 'Common/' . $ORM->id
]);
    

//後端取 頁碼
$this->data['notes'] = Note::orm([
    'where' => [
        'shelves_status' => 1,
        'deleted_at' => NULL,
        'post_at <=' => date("Y-m-d H:i:s")
    ],
    'orderBy' => [
        'id' => 'DESC',
        'prioritynum' => 'DESC',
    ],
    'paginate' => 5
    // 'count' => 9999,
]);

// 前端 link
{{$notes->links('common.layouts.paginate')}}

// 前端取文章資料

@foreach($developNotes as $developNote)
<div class="news_item">
    <a href="develop/news/view/?id={{$developNote->id}}&classMetableId={{$ClassMeta->id}}" class="link"></a>
    <div class="news_title">
        <div class="news_分類名稱">{{$developNote->ClassMetas[0]->name}}</div>
        <div class="date">{{$developNote->updated_at->format('Y-m-d')}}</div>
    </div>
    <div class="news_con">
        <div class="news_pic"><img src="{{$developNote->Pics[0]->url['w0h0']}}" alt=""></div>
        <div class="news_detail">
            <h5>{{$developNote->title}}</h5>
            <p class="detail">{{$developNote->description}}</p>
            <p class="go_more"><span>read more</span></p>
        </div>
    </div>
</div>
@endforeach


// 回上一頁
HTML
<div onclick="history.back()">
