<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- ここにパネルのコンテンツを配置 -->
                    <div class="container px-5 py-5 mx-auto">
                        <div class="flex flex-wrap -m-4">
                            <div class="xl:w-1/4 w-100 p-4">
                                <div class="bg-gray-100 p-6 rounded-lg">
                                    <a href="{{ route('travel.create') }}">{{ __('travel create') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
