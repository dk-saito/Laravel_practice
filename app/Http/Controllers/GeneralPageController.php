<?php

namespace App\Http\Controllers;
use App\Models\Content;
use App\Models\MyList;
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
        
        return view('general.list',compact('contents', 'keyword'));
    }
    public function detail(Request $request,$id){
        $content=Content::find($id);
        return view('general.detail', compact('content'));
    }
    public function my_list(Request $request){
        $keyword=$request->keyword;
        $mylists=MyList::all();
        $query=Content::query();
        if(!empty($keyword)){
            $result=$query->where('name','LIKE',"%{$keyword}%")
            ->orWhere('url','LIKE',"%{$keyword}%");
        }
        $contents=$query->get();
        return view('general.my_list', compact('contents','mylists','keyword'));
    }
    public function add_my_list(Request $request, $id){
        $new_my_list = new MyList();
        $new_my_list->user_id = Auth::user()->id;
        $new_my_list->content_id = $id;
        $new_my_list->save();
        return redirect('/general/list');

    }
    public function delete_my_list(Request $request, $id){
        $my_list = MyList::where('content_id', $id);
        $my_list->delete();
        return redirect('/general/list');
    }
}
