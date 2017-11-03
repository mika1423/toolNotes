<?php

// ***開系統(使用3個)
1.controllers
2.models
3.database
// *** 如果是SQL的名字


// *** dd();(使用foreach的時候)
使用dd可以去偵測有幾個物件，偵測幾個就會跑幾次，每跑一次叫一個物件

use FF\Models\Base\ClassMeta;(下面有取值的地方，首先要先把他引入，引入的話要從M的地方)

 $classId = $Request->input('classId');  ----->  $classId呼叫id 放入input(後台的id號碼)

$this->data['ClassMetas2'] = ClassMeta::orm([
            'where'=>[
                'class_metable_type'=>  Product::class,
                'class_metable_attr'=>'ClassMetas',
                'class_level' => 2
            ],
            'count' => 200
        ]);

dd($this->data['ClassMetas2']);-----> //要先用dd看他有沒有取到這項

*******************************************

 // 2 級分類 (不管有幾級分類 只要將最外層的分類貼好 在html串系統時用$ClassMeta2(上一級的分類)->childClassMetas as $ClassMeta(下一集的分類) )

        $this->data['ClassMetas2'] = ClassMeta::orm([
            'where'=>[
                'class_metable_type'=>  Product::class,
                'class_metable_attr'=>'ClassMetas',
                'class_level' => 2  //如果是一級分類的話 改1 
            ],
            'count' => 200
        ]);

        @foreach( $ClassMeta2->childClassMetas as $ClassMeta )
        @endeach
******************************************************


        use FF\Models\Base\ClassMetaField;
        use Models\Shop\Product;
        
            // database - seeds - projectseed 
           //分類標籤
           $ClassMetaField2 = ClassMetaField::orm();
           $ClassMetaField2->name = '嚴選農產品';//分類名稱
           $ClassMetaField2->classLevel = 2;//幾級分類
           $ClassMetaField2->classMetableType = Product::class;
           $ClassMetaField2->classMetableAttr = 'ClassMetas';
           $ClassMetaField2->save();//儲存
           $A2ClassId = $ClassMetaField2->id;

           $ClassMetaField = ClassMetaField::orm();
           $ClassMetaField->name = '萵苣系列';
           $ClassMetaField->classLevel = 1;//幾級分類
           $ClassMetaField->classMetableType = Product::class;
           $ClassMetaField->classMetableAttr = 'ClassMetas';     
           $ClassMetaField->classId = $A2ClassId;//屬於二級分類裡面的一級分類
           $ClassMetaField->save();//儲存
           $AT1ClassId = $ClassMetaField->id;//自己本身的id

           $ClassMetaField = ClassMetaField::orm();
           $ClassMetaField->name = '十字花科';//分類名稱
           $ClassMetaField->classLevel = 1;//幾級分類
           $ClassMetaField->classMetableType = Product::class;
           $ClassMetaField->classMetableAttr = 'ClassMetas';     
           $ClassMetaField->classId = $A2ClassId;//屬於二級分類裡面的一級分類
           $ClassMetaField->save();//儲存
           $AT2ClassId = $ClassMetaField->id;//自己本身的id

            //建立完後在下指令 php ff migrate:refresh-\ --seed



            for( $i=0 ; $i<3 ; $i++){//跑三次
                if($i==0){//如果他的i=0就取第一個圖片
                    $ClassId = $AT1ClassId;
                }else if ($i==1){//如果他的i=1就取第二個圖片
                    $ClassId = $BT1ClassId;
                }else{//其他取締三個圖片
                    $ClassId = $CT1ClassId;
                }
                for ( $ii=0 ; $ii<10 ; $ii++){//裡面的所有東西跑10次
                    //存圖片
                    $Pic = \FF\Models\Base\Pic::orm();
                    $Pic->thumb = 'w50h50';//圖片大小
                    $Pic->setFileLocal('product1.png');//要先把照片放入專案的pic裡面
                    $Pic->upload();
        
                    $Pic2 = \FF\Models\Base\Pic::orm();
                    $Pic2->thumb = 'w50h50';//圖片大小
                    $Pic2->setFileLocal('product2.png');//要先把照片放入專案的pic裡面
                    $Pic2->upload();
        
                    $Pic3 = \FF\Models\Base\Pic::orm();
                    $Pic3->thumb = 'w50h50';//圖片大小
                    $Pic3->setFileLocal('product3.png');//要先把照片放入專案的pic裡面
                    $Pic3->upload();

                    // 對應models的欄位去選要的東西
                    $product = Product::orm();
                    $product->name = '福山萵苣1';
                    $product->shelves_status ="1";
                    $product->post_at = date("Y-m-d H:i:s");//data是老闆寫好的function 打一整串可以直接取時間
                    $product->show_price = '500';
                    $product->price = '250';
                    $product->classify = '1';//A標籤對應的陣列 在controller
                    $product->sales_tag = '1';
                    $product->save();
                    $product->ClassMetas('set', [$ClassId]);
                    $product->Pics('set', [$Pic->id]);
    
                    $product = Product::orm();
                    $product->name = '福山萵苣1';
                    $product->shelves_status ="1";
                    $product->post_at = date("Y-m-d H:i:s");//data是老闆寫好的function 打一整串可以直接取時間
                    $product->show_price = '500';
                    $product->price = '250';
                    $product->classify = '2';//A標籤對應的陣列 在controller
                    $product->save();
                    $product->ClassMetas('set', [$ClassId]);
                    $product->Pics('set', [$Pic2->id]);
    
                    $product = Product::orm();
                    $product->name = '福山萵苣1';
                    $product->shelves_status ="1";
                    $product->post_at = date("Y-m-d H:i:s");//data是老闆寫好的function 打一整串可以直接取時間
                    $product->show_price = '500';
                    $product->price = '250';
                    $product->classify = '3';//A標籤對應的陣列 在controller
                    $product->save();
                    $product->ClassMetas('set', [$ClassId]);
                    $product->Pics('set', [$Pic3->id]);
                }
            }


            @if($key==1)
            @break
            @endif


        //一級分類id裡面的product 的id(產品)
        //Classmeta屬於分類的
    //看是甚麼樣的分類 在命名他跟對應的controller & models
    // DataBase seeder 對應 model 選擇你要的東西
    //串系統每個區塊有它屬於他的區塊
    ex:
    廣告(商品廣告 or 首頁廣告)
    分類(哪個頁面的分類 OR 產品的分類 or 其他的分類)
    產品( 分類裡面的id 取出來圖片的id )

?>

