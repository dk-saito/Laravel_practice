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
                {{-- ここのdivの中が通常のhtmlでいうbodyタグにはいる(残りはdjangoでいうbase.htmlに相当する) --}}
                    you are general user
                    <a href="">test</a>
                    <h1>
                        {{Auth::user()->login_id}}としてログインしました！
                    </h1>
                    <p>プライマリーキー{{Auth::user()->id}}</p>
                </div>
            </div>
        </div>
    </div>
</x-general-layout>
