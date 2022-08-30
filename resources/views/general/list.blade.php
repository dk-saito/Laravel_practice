<x-general-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>検索</p>
                    <p>調べたいタイトル、要件に当てはまる言葉を入力してください</p>
                    <form action="{{route('general.list')}}" method="get">
                        <input type="text" name="keyword" value="{{$keyword}}">
                        <input type="submit" value="検索">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                {{-- ここのdivの中が通常のhtmlでいうbodyタグにはいる(残りはdjangoでいうbase.htmlに相当する) --}}
                    you are general user
                    <a href="">test</a>
                    <h1>
                        {{Auth::user()->login_id}}としてログインしました！
                    </h1>
                    <p>プライマリーキー{{Auth::user()->id}}</p>
                    <table border="1">
                        <tr>
                            <th>ファイル名</th>
                            <th>動画</th>
                            <th>マイリスト</th>
                            <th>備考</th>
                        </tr>
                        @foreach ($contents as $content)
                        <tr>
                            <td>{{$content->name}}</td>
                            <td><video src="{{asset($content->url)}}" controls width='200'></td>
                            <td>マイリストへ</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-general-layout>
