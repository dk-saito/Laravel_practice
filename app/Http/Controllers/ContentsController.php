<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class ContentsController extends Controller
{
    //
    // タスク一覧
    public function list(){
        $contents = Content::all();

        return view('admin.list', compact('contents'));
    }

    // コンテンツアップロード
    public function upload_form(){
        public function upload(Request $request){
            // $request->validate([
                // 'image' => 'required|max:1024|mimes:jpg,jpeg,png,gif'
                // ]);
                $file_path = $request->video->store('videos', 'public');
                // print("<img src='". asset("$file_path"). "' width='300'>");
                // print("<a href='upload_form'>画像投稿フォームに戻る</a>");
            }

        return view('admin.list');
    }

// ******************************************************************
// ここまで完成↑
// ******************************************************************

    // コンテンツ削除(DELETE)
    public function delete_confirm($id, Request $request){
        $task_to_delete = Task::find($id);

        if ($request->has('back')){
            return redirect('/taskmanagementapp/list');
        }

        if($request->has('delete')){
            $task_to_delete->delete();
            return redirect('/taskmanagementapp/list');
        }

        return view('task_management_app.delete_confirm', compact('task_to_delete'));
    }

// メッセージ編集(UPDATE)
    public function edit($id, Request $request){
        $task = Task::find($id);
        // if($request->has('back')){
        //     return redirect('/messageboard/index');
        // }

        if($request->has('back')){
            return redirect('/taskmanagementapp/list');
        }
        if($request->has('update')){
            $this->validate($request, [
                'task_detail' => ['required'],
            'name' => ['required'],
            'datetime_start' => ['required'],
            'datetime_finish' => ['required']
            ]);
            $task = Task::find($id);
            $task->task_detail = $request->task_detail;
            $task->name = $request->name;
            $task->datetime_start = $request->datetime_start;
            $task->datetime_finish = $request->datetime_finish;
            $task->save();
            return redirect('/taskmanagementapp/list');
        }

        return view('task_management_app.edit', compact('task'));
    }

    // ステータス変更
    public function change_status($id, Request $request){
        $tasks = Task::all();
        $task = Task::find($id);

        if($task->status == 1){
            $task->status = 0;
            $task->save();
            return redirect('/taskmanagementapp/list')->withInput();
        }else{
            $task->status = 1;
            $task->save();
            return redirect('/taskmanagementapp/list')->withInput();
        }

        return view('task_management_app.list', compact('task', 'tasks'));
    }
}
