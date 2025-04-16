<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Categoria') }}
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

                    <form action="{{ route('categories.store') }}" method="post">
                        @csrf
                      <div>
                        <input class="rounded" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Nome da categoria"> <br>
                        <button class="mt-1 rounded underline font-semibold" type="submit">Criar</button>
                        @error('name')
                         <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                     </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>