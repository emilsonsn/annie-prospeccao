<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-white">
            {{ __('Dashboard') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 dark:text-gray-900 dark:text-gray-100 text-4xl font-bold">
                    {{ __("Bem vindo(a)!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>