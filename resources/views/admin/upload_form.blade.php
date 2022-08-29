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
                <h1>動画アップロードフォーム</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="content">
                            <p>アップロード動画</p>
                            <input id="content" type="file" name="content">
                        </label>
                    </div>
                    <div>
                        <p>
                            <input type="submit" value="アップロードする">
                        </p>
                    </div>
                    @csrf
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

