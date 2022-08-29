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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <a href="./list" class="btn-brackets">
                    元に戻る
                  </a>
                <h1>動画アップロードフォーム</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="content">
                            <p>アップロード動画</p>
                            <input id="content" type="file" name="video">
                        </label>
                    </div>
                    <div>
                        <p>

                            <button type="submit" class="btn-brackets">アップロードする</button>
                        </p>
                    </div>
                    @csrf
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

