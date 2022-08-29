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
                    <p>{{$contents_to_delete->name}}</p>
                    <p>{{$contents_to_delete->url}}</p>
                    <video src="{{asset($contents_to_delete->url)}}" width='200'>
                    </tr>
                    <tr>
                        <td>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="delete">
                                <input type="submit" value="以上の情報を削除します">
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
