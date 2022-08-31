<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <style>.btn-brackets {
            display: inline-block;
            position: relative;
            padding: 0.5em 1em;
            text-decoration: none;
            color: #000;
            transition: .4s;
            align-items: center;
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
    </x-slot>



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
        <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">U-next</h2>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table border="1">
                    <tr>
                    <p>【タイトル】　{{$contents_to_delete->name}}</p>
                    <p>【URL】　{{$contents_to_delete->url}}</p>
                    <video src="{{asset($contents_to_delete->url)}}" width='200'>
                    </tr>
                    <tr>
                        <td>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="delete">
                               <br> <button type="submit" class="btn-brackets">削除します</button><br>
                                @csrf
                            </form>

                        </td>
                        <td>
                            <form action="">
                                <input type="hidden" name="back">
                               <br> <button type="submit" class="btn-brackets">やっぱなし</button>
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
