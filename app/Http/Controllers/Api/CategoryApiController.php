<?php

namespace App\Http\Controllers\Api;

use App\Item;
use App\Category;
use App\Getlocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ApiBaseController;
use App\SubCategory;

class CategoryApiController extends ApiBaseController
{
   public function index(){
       $categories = Category::where('type_flag',1)->wherein('id',[1,2,3,4,5])->get();
       //========================

       //========================
       return response()->json($categories);
   }

   public function getCategory(){
       $categories = Category::all();
       //========================

       //========================
       return response()->json($categories);
   }

   public function getCategoryId($id){
    $page = Request()->has('page') ? Request()->get('page') : 1;
    $limit = Request()->has('limit') ? Request()->get('limit') : 12;
    $items = Item::where('category_id',$id)->where('instock',1)
                                                ->limit($limit)
                                                ->offset(($page - 1) * $limit)
                                                ->get();
    $sub = SubCategory::where('category_id',$id)->get();
                                               
                                                

    return response()->json([
        "error"=>false,
        "message"=>" item list",
        "items"=>$items,
        'subs' => $sub,
        'item total' => $items->count(),
      
        'page' => (int)$page,
        'rowPerPages' => (int)$limit,
    ]);
}

    public function getItembySub($cid,$sid){

    $page = Request()->has('page') ? Request()->get('page') : 1;
    $limit = Request()->has('limit') ? Request()->get('limit') : 12;
        $items = Item::where('category_id',$cid)->where('sub_category_id',$sid)->where('instock',1)
                                                ->limit($limit)
                                                ->offset(($page - 1) * $limit)
                                                ->get();

        return response()->json([
            "error"=>false,
            "message"=>" item list",
            "data"=>$items,
            'total' => $items->count(),
            'page' => (int)$page,
            'rowPerPages' => (int)$limit,
        ]);
    }
}
