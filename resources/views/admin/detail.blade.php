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
                    {{$content->name}}
                    <div class="bg-white py-6 sm:py-8 lg:py-12">
                          <div class="bg-gray-100 overflow-hidden rounded-lg shadow-lg relative mb-6 md:mb-8">
                            <video src="{{asset($content->url)}}" controls width='200' alt="Photo by Minh Pham" class="w-full h-full object-cover object-center" >
                          </div>
                          <h2 class="text-gray-800 text-xl sm:text-2xl font-semibold mb-2 md:mb-4">{{$content->name}}</h2>
                          <p class="text-gray-500 sm:text-lg"><a href="/admin/list">トップページへ</a></p>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
