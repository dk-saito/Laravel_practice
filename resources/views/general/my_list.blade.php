<x-general-layout>
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
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="max-w-screen-xl px-4 md:px-8 mx-auto">
          <!-- text - start -->
          <div class="mb-10 md:mb-16">
            <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">U-next</h2>

            <p class="max-w-screen-md text-gray-500 md:text-lg text-center mx-auto">ようこそ!!{{Auth::user()->login_id}}さん</p>

          </div>
          <div style="text-align: center">
          <button class="btn-brackets" onclick="location.href='/general/list'">リストへ</button>
        </div>
          <div class="py-12" style="text-align: right;">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p>調べたいタイトル、要件に当てはまる言葉を入力してください</p>
                        <form action="{{route('general.my_list')}}" method="get">
                            <input type="text" name="keyword" value="{{$keyword}}">
                            <input type="submit" value="検索">
                        </form>
                    </div>
                </div>
            </div>
        </div>
          <!-- text - end -->
          {{-- breeze --}}
          <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

          {{-- tailwind --}}

          <div class="grid grid-cols-2 md:grid-cols-3 gap-x-4 lg:gap-x-8 gap-y-8 lg:gap-y-12">
            <!-- person - start -->


            @foreach ($mylists as $mylist)
                @if($mylist->user_id == Auth::user()->id)
                @foreach ($contents as $content)
                    @if ($mylist->content_id==$content->id)


                    <div>
                    <div class="h-48 sm:h-60 md:h-80 bg-gray-100 overflow-hidden rounded-lg shadow-lg mb-2 sm:mb-4">
                        <a href="/general/detail/{{$mylist->content_id}}">
                        <video src="{{asset($content->url)}}" width='200' loading="lazy" class="w-full h-full object-cover object-center"></video>
                        </a>
                    </div>

                    <div>
                        <div class="text-indigo-500 md:text-lg font-bold">{{$content->name}}</div>

                        {{-- <form action="" method="POST" style="float: left">
                        <button class="btn-brackets" type="submit" onclick="location.href='/general/my_list/{id}'">マイリスト登録</button>
                        </form> --}}
                        <!-- social - start -->

                        <!-- social - end -->
                    </div>
                    </div>
                    @endif
                @endforeach
                @endif
            <!-- person - end -->

            @endforeach
            {{--tailwind  --}}
                </div>
            </div>
        </div>
    </div>
</x-general-layout>
