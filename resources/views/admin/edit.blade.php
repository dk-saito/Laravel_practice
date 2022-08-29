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
                                <input type="submit" value="更新">
                                @csrf
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form action="">
                                <input type="hidden" name="back">
                                <input type="submit" value="やっぱなし">
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
