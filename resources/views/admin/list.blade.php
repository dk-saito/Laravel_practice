<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>動画一覧</h1>
                    <table border='1'>
                        <tr>
                            <th>ファイル名</th>
                            <th>動画</th>
                            <th>URL</th>
                            <th>備考</th>
                        </tr>
                        @foreach ($contents as $content)
                            <tr>
                                <td>{{$content->name}}</td>
                                <td><video src='{{$content->url}}' width='200'></td>
                                <td>
                                    {{-- <form action=""> --}}
                                    {{-- <input type="hidden" name="is_free" value="{{$content->is_free}}"> --}}
                                @if($content->is_free == 1)
                                <p>無料</p>
                                @else
                                <p>有料</p>
                                @endif
                                {{-- @csrf
                            </form> --}}
                                </td>
                                {{-- <td>http://localhost/{{$content->filepath}}</td> --}}
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
