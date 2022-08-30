<?php

namespace App\Http\Controllers;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function detail(Request $request,$id){
        $content=Content::find($id);
        return view('general.detail', compact('content'));
    }
    public function my_list(Request $request,$id){
        // $content=Content::find($id);
        // return view('general.detail', compact('content'));
    }
    public function store(Request $request,$id){
        // $content=Content::find($id);
        // return view('general.detail', compact('content'));
    }
}
