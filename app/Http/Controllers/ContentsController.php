<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\MyList;
use Illuminate\Support\Facades\Auth;

class ContentsController extends Controller
{
    //
    // タスク一覧
    public function list(Request $request){
        $keyword=$request->keyword;
        $query=Content::query();
        if(!empty($keyword)){
            $result=$query->where('name','LIKE',"%{$keyword}%")
            ->orWhere('url','LIKE',"%{$keyword}%");
        }
        $contents=$query->get();
        return view('admin.list',compact('contents','keyword'));
    }

    public function detail($id,Request $request){
        $content=Content::find($id);
        return view('admin.detail', compact('content'));
    }

    // コンテンツアップロード
    public function upload_form(Request $request){
        // $request->validate([
            // 'image' => 'required|max:1024|mimes:jpg,jpeg,png,gif'
            // ]);
        $file_path = $request->video->store('videos', 'public');
        // print("<img src='". asset("$file_path"). "' width='300'>");
        // print("<a href='upload_form'>画像投稿フォームに戻る</a>");

        $upload_content = new Content();
        $upload_content->name = $request->title;
        $upload_content->admin_id=Auth::user()->id;
        $upload_content->memo=$request->memo;
        $upload_content->url = $file_path;
        $upload_content->save();

        return redirect('/admin/list');
    }


    // コンテンツ削除(DELETE)
    public function delete($id, Request $request){
        $contents_to_delete = Content::find($id);
        $mylists=MyList::all();
        if ($request->has('back')){
            return redirect('/admin/list');
        }

        if($request->has('delete')){
            foreach($mylists as $mylist){
            if($mylist->content_id == $id){
                $mylist->delete();
                }
            }
            $contents_to_delete->delete();
            return redirect('/admin/list');
        }

        return view('admin.delete', compact('contents_to_delete'));
    }

// メッセージ編集(UPDATE)
public function edit($id, Request $request){
    $update_content = Content::find($id);

    if($request->has('back')){
        return redirect('/admin/list');
    }

    if($request->has('update')){
        // $this->validate($request, [
            //     'task_detail' => ['required'],
            // 'name' => ['required'],
            // 'datetime_start' => ['required'],
            // 'datetime_finish' => ['required']
            // ]);
            $file_path = $request->video->store('videos', 'public');

            $update_content = Content::find($id);
            $update_content->name = $request->title;
            $update_content->admin_id=Auth::user()->id;
            $update_content->memo=$request->memo;
            $update_content->url = $file_path;
            $update_content->save();
            return redirect('/admin/list');
        }

        return view('admin.edit', compact('update_content'));
    }

    // ******************************************************************
    // ここまで完成↑
    // ******************************************************************

    // 有料無料変更
    // public function change_status($id, Request $request){
        //     $tasks = Task::all();
        //     $task = Task::find($id);

        //     if($task->status == 1){
            //         $task->status = 0;
    //         $task->save();
    //         return redirect('/taskmanagementapp/list')->withInput();
    //     }else{
    //         $task->status = 1;
    //         $task->save();
    //         return redirect('/taskmanagementapp/list')->withInput();
    //     }

    //     return view('task_management_app.list', compact('task', 'tasks'));
    // }
}
