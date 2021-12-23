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
                    <div class="flex">
                        <input id="original-url" class="w-full px-4 py-3 rounded" type="text" placeholder="Pega la URL aqui...">
                        <button class="ml-4 w-auto px-6 py-3 font-semibold bg-gray-900 text-white rounded" onclick="shorter.shortUrl();">Acortar</button>
                    </div>
                    <div id="shor-url-container" class="py-5 hidden">
                        <input id="short-url" class="w-full px-4 py-3 rounded" type="text" placeholder="" onclick="shorter.copyUrl();">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
