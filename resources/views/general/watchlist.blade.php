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
          }

          .btn-cross {
            display: inline-block;
            position: relative;
            padding: 0.25em 1em;
            border-top: solid 2px gray;
            border-bottom: solid 2px gray;
            text-decoration: none;
            font-weight: bold;
            color:rgb(85, 83, 209);
            }
            .btn-cross:before, .btn-cross:after {
            content: '';
            position: absolute;
            top: -7px;
            width: 2px;
            height: -webkit-calc(100% + 14px);
            height: calc(100% + 14px);
            background-color: rgb(0, 0, 0);
            transition: .3s;
            }
            .btn-cross:before {
            left: 7px;
            }
            .btn-cross:after {
            right: 7px;
            }
            .btn-cross:hover:before {
            top: 0px;
            left:0;
            height: 100%;
            }
            .btn-cross:hover:after {
            top: 0px;
            right: 0;
            height: 100%;
            }

          </style>



    </x-slot>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="max-w-screen-xl px-4 md:px-8 mx-auto">
          <!-- text - start -->
          <div class="mb-10 md:mb-16">
            <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">U-next</h2>

            <p class="max-w-screen-md text-gray-500 md:text-lg text-center mx-auto">????????????!!{{Auth::user()->login_id}}??????</p>

          </div>
          <div style="text-align: center">
          <button class="btn-brackets" onclick="location.href='/general/list'">????????????</button>
        </div>
          <div class="py-12" style="text-align: right;">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p>????????????????????????????????????????????????????????????????????????????????????</p>
                        <form action="{{route('general.my_list')}}" method="get">
                            <input type="text" name="keyword" value="{{$keyword}}">
                            <input type="submit" value="??????" class="btn-cross">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-x-4 lg:gap-x-8 gap-y-8 lg:gap-y-12">
            <!-- person - start -->


            @foreach ($watchlists as $list)
                @foreach ($contents as $content)
                @if ($list->user_id==Auth::user()->id && $content->id==$list->content_id)

                    <div>
                        <div class="h-48 sm:h-60 md:h-80 bg-gray-100 overflow-hidden rounded-lg shadow-lg mb-2 sm:mb-4">
                            <a href="/general/detail/{{$list->content_id}}">
                            <video src="{{asset($content->url)}}" width='200' loading="lazy" class="w-full h-full object-cover object-center"></video>
                            </a>
                        </div>

                        <div>
                            <div class="text-indigo-500 md:text-lg font-bold">{{$content->name}}</div>

                            {{-- <form action="/general/delete_my_list/{{$content->id}}" method="POST" style="float: left">
                                <button class="btn-brackets" type="submit">???????????????????????????</button>
                                @csrf
                            </form> --}}
                        </div>
                    </div>

                @endif
                @endforeach
            <!-- person - end -->
            @endforeach
            {{--tailwind  --}}
                </div>
            </div>
        </div>
    </div>
</x-general-layouts>
