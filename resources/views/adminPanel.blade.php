<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Painel de Administração') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white text-xl font-semibold dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
                <div>Quantidade de Categorias: {{ $countCategories }} <a class="d-block"
                        href="{{ route('categories.create') }}">+</a></div>
                <div>Quantidade de Locais: {{ $countLocations }} <a class="d-block"
                        href="{{ route('locations.create') }}">+</a></div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-3">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session()->has('message'))
                    {{ session()->get('message'); }}
                    @endif
                    <div class="d-flex justify-content-evenly">
                        <div class="">
                            <h2 class="font-semibold text-xl">Categorias</h2>
                            <hr>
                            @if ($categories->isEmpty())
                            <div class="text-xl">
                                <strong>Informação:</strong> Não há categorias cadastradas.
                            </div>
                            @else
                            <table class="min-w-full bg-white border border-gray-300 text-center">
                                <tr>
                                    <th class="py-2 px-4 border-b" scope="col">Nome</th>
                                    <th class="py-2 px-4 border-b" scope="col">Quan. de items com essa cat.</th>
                                    <th class="py-2 px-4 border-b" scope="col">Quan. de relatos com essa cat.</th>
                                    <th class="py-2 px-4 border-b" scope="col">Ações</th>
                                </tr>
                                @foreach ($categories as $category)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $category->name }}</td>
                                    <td class="py-2 px-4 border-b">{{ $category->items_count }}</td>
                                    <td class="py-2 px-4 border-b">{{ $category->reports_count }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <form action="{{ route('categories.destroy', ['category' => $category->id]) }}"
                                            method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button style="color: red">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                </tr>
                            </table>
                            @endif
                            <h2 class="font-semibold text-xl mt-3">Locais</h2>
                            <hr>
                            @if ($locations->isEmpty())
                            <div class="text-xl">
                                <strong>Informação:</strong> Não há locais cadastrados.
                            </div>
                            @else
                            <table class="min-w-full bg-white border border-gray-300 text-center">
                                <tr>
                                    <th class="py-2 px-4 border-b" scope="col">Nome</th>
                                    <th class="py-2 px-4 border-b" scope="col">Quan. de items com esse loc.</th>
                                    <th class="py-2 px-4 border-b" scope="col">Quan. de relatos com esse loc.</th>
                                    <th class="py-2 px-4 border-b" scope="col">Ações</th>
                                </tr>
                                @foreach ($locations as $location)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $location->name }}</td>
                                    <td class="py-2 px-4 border-b">{{ $location->items_count }}</td>
                                    <td class="py-2 px-4 border-b">{{ $location->reports_count }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <form action="{{ route('locations.destroy', ['location' => $location->id]) }}"
                                            method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button style="color: red">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>