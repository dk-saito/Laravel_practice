<?php

namespace App\Http\Controllers;
use App\Models\Content;
use Illuminate\Http\Request;

class GeneralPageController extends Controller
{
    //
    public function list(Request $request){
        $keyword=$request->keyword;
        $query=Content::query();
        if(!empty($keyword)){
            $result=$query->where('name','LIKE',"%{$keyword}%")
            ->orWhere('url','LIKE',"%{$keyword}%");
        }
        $contents=$query->get();
        return view('general.list',compact('contents','keyword'));
    }
}
