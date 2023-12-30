<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function show(){
        $all_data = DB::table('posts')
        ->join('categories','posts.cat_id','categories.id')
        ->get();
        return response(['Data'=>$all_data]);
    }

    public function insert(Request $request){
        DB::table('posts')
        ->insert([
            'title'=>$request->title,
            'description'=>$request->description,
            'cat_id'=>(int)$request->cat_id
        ]);
        return response(['status'=>'200','message'=>'post is inserted']);


    }
    public function catInsert(Request $request){
        DB::table('categories')
        ->insert([
            'cat_name'=>$request->cat_name,
            'cat_id'=>$request->cat_id
        ]);
        return response(['status'=>'200','message'=>'category is inserted']);
    }

    public function update(Request $request,$id){
        DB::table('posts')
        ->where('id',$id)
        ->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'cat_id'=>$request->cat_id
           

        ]);
        return response(['status'=>'200','message'=>'post is updated']);
    }

    public function delete($id){
        DB::table('posts')
        ->where('id',$id)
        ->delete();
        return response(['status'=>'200','message'=>'post is deleted']);    
}



















}
