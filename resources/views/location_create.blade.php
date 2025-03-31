<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Local') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('adminPanel') }}">Voltar</a>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if (session()->has('message'))
                    {{ session()->get('message'); }}
                    @endif

                    <form action="{{ route('locations.store') }}" method="post">
                        @csrf
                        <input class="rounded" type="text" name="name" placeholder="Nome do local"> <br>
                        <button class="mt-1 rounded underline font-semibold" type="submit">Criar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>