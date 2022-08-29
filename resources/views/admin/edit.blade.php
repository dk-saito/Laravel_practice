<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>.btn-brackets {
        display: inline-block;
        position: relative;
        padding: 0.5em 1em;
        text-decoration: none;
        color: #000;
        transition: .4s;
      }
      .btn-brackets:hover {
        color:#ff7f7f;
      }
      .btn-brackets:before, .btn-brackets:after {
        position: absolute;
        top: 0;
        content:'';
        width: 8px;
        height: 100%;
        display: inline-block;
      }
      .btn-brackets:before {
        border-left: solid 1px #ff7f7f;
        border-top: solid 1px #ff7f7f;
        border-bottom: solid 1px #ff7f7f;
        left: 0;
      }
      .btn-brackets:after {
        content: '';
        border-top: solid 1px #ff7f7f;
        border-right: solid 1px #ff7f7f;
        border-bottom: solid 1px #ff7f7f;
        right: 0;
      }</style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table border="1">
                    <tr>
                    <p>タイトル:{{$update_content->name}}</p>
                    <p>url:{{$update_content->url}}</p>
                    <p>ビデオ</p>
                    <video src="{{asset($update_content->url)}}" width='200'>
                    </tr>
                    <tr>
                        <td>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="update">
                                <label for="title">タイトル
                                <input type="text" name="title" value="{{$update_content->name}}">
                                </label>
                                <input type="file" name="video" value="{{$update_content->url}}">
                                 <br><br><button type="submit" class="btn-brackets">更新</button>


                                @csrf
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form action="">
                                <input type="hidden" name="back">
                                <button type="submit" class="btn-brackets">やっぱなし</button>
                                    @csrf
                            </form>
                        </td>
                    </tr>
                </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
