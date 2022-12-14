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
      }
      .line{
        color: grey;
      }

      .koushin{
        color: blue;
      }

      .koushin2{
        color: red
      }

      </style>

        @php


        date_default_timezone_set('Asia/Tokyo');
            $time = date('G');

            if (6 <= $time && $time <= 12 ){
                            echo "今{$time}時台です、おはようございます☀";
                        } else if (13 <= $time && $time <= 18){
                            echo "今{$time}時台です、こんにちは◎";
                        } else if (19 <= $time && $time <= 24){
                            echo "今{$time}時台です、こんばんは☆";
                        }
        @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">U-next</h2>
                    <table border="1">
                    <tr>

                    <p>～編集ページ～</p>
                    <br><br>
                    <p class="koushin">旧ビデオ</p>
                    <p>【タイトル】:{{$update_content->name}}</p>
                    <p>【URL】url:{{$update_content->url}}</p>
                    <p>【旧ビデオ】</p>
                    <video src="{{asset($update_content->url)}}" controls width='200'>
                    </tr>
                    <br><p class="line">－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－


                    </p>
                    <tr>
                        <td>
                            <form action="" method="POST" enctype="multipart/form-data">
                               <br> <p class="koushin2">新規ビデオ</p>

                                <input type="hidden" name="update">
                                <label for="title">【タイトル】
                                    <input type="text" name="title" value="{{$update_content->name}}" required>
                                </label><br>
                                <br><label for="video">【新規ビデオ】
                                    <input type="file" name="video" value="{{$update_content->url}}" required>
                                </label><br><br>
                                【備考】
                                <br><label for="memo">
                                    <textarea name="memo" id="" cols="20" rows="5" style="resize: none;" required>{{$update_content->memo}}</textarea>
                                </label><br>
                                <button type="submit" class="btn-brackets">更新</button>
                                @csrf
                            </form>
                            <form action="" >
                                <input type="hidden" name="back">
                                <button type="submit" class="btn-brackets">やっぱなし</button>
                                @csrf
                            </form>
                        </td>
                </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
