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

    <div class="py-12">
        <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">U-next</h2>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <p>詳細ページです</p>
                    ようこそ{{Auth::user()->login_id}}さん！
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



                    <div class="bg-white py-6 sm:py-8 lg:py-12">
                          <div class="bg-gray-100 overflow-hidden rounded-lg shadow-lg relative mb-6 md:mb-8">
                            <video src="{{asset($content->url)}}" controls width='200' alt="Photo by Minh Pham" class="w-full h-full object-cover object-center" >
                          </div>
                          <p>【動画タイトル】<h2 class="text-gray-800 text-xl sm:text-2xl font-semibold mb-2 md:mb-4">{{$content->name}}</h2>
                          <p>【コメント】</p>
                          <h3 class="text-gray-500 sm:text-lg">{{$content->memo}}</h3>
                          <br><br><button class="btn-brackets" onclick="location.href='/general/list'">トップページへ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
