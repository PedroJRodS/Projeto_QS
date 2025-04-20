<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                <div class="dark:bg-[#3E3E3A] shadow rounded-lg p-6">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Quantidade de Categorias:</h3>
                    <a href="{{ route('categories.create') }}"
                        class="mt-2 block text-2xl font-semibold text-gray-800 dark:text-white hover:text-amber-400 transition-color duration-150 ease-in-out">{{
                        $countCategories }} +</a>
                </div>

                <div class="dark:bg-[#3E3E3A] shadow rounded-lg p-6">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Quantidade de Locais: </h3>
                    <a href="{{ route('locations.create') }}"
                        class="mt-2 block text-2xl font-semibold text-gray-800 dark:text-white hover:text-amber-400 transition-color duration-150 ease-in-out">{{
                        $countLocations }} +</a>
                </div>

                <div class="dark:bg-[#3E3E3A] shadow rounded-lg p-6">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Quantidade de Estados:</h3>
                    <a href="{{ route('conditions.create') }}"
                        class="mt-2 block text-2xl font-semibold text-gray-800 dark:text-white hover:text-amber-400 transition-color duration-150 ease-in-out">{{
                        $countConditions }} +</a>
                </div>
            </div>
            <div class="dark:bg-[#3E3E3A] overflow-hidden shadow-sm sm:rounded-lg p-6 pt-2 text-white">

                @if (session()->has('message'))
                <div class="mb-4 mt-4 text-amber-400 font-medium">
                    {{ session()->get('message') }}
                </div>
                @endif

                <div class="d-flex justify-content-evenly">
                    <div class="">
                        <div class="flex items-center gap-4 my-3">
                            <h2 class="font-semibold text-xl whitespace-nowrap">Categorias</h2>
                            <div class="flex-grow border-t border-gray-300 dark:border-white"></div>
                        </div>
                        @if ($categories->isEmpty())
                        <div class="text-xl">
                            <strong class="text-amber-400">Informação:</strong> Não há categorias cadastradas.
                        </div>
                        @else
                        <table class="text-center min-w-full bg-[#3E3E3A] border-separate border-spacing-0">
                            <tr class="text-white">
                                <th class="py-2 px-4">Nome</th>
                                <th class="py-2 px-4 border-l border-gray-300">Quan. de items com essa cat.
                                </th>
                                <th class="py-2 px-4 border-l border-gray-300">Quan. de relatos com essa
                                    cat.</th>
                                <th class="py-2 px-4 border-l border-gray-300">Ações</th>
                            </tr>
                            @foreach ($categories as $category)
                            <tr
                                class="text-gray-300 border-gray-400 hover:bg-[#1b1b18] transition-colors duration-300 ease-in-out">
                                <td class="py-2 px-4">{{ $category->name }}</td>
                                <td class="py-2 px-4 border-l border-gray-400">{{ $category->items_count }}</td>
                                <td class="py-2 px-4 border-l border-gray-400">{{ $category->reports_count }}</td>
                                <td class="py-2 px-4 border-l border-gray-400">
                                    <form action="{{ route('categories.destroy', ['category' => $category->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 hover:underline">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        @endif

                        <div class="flex items-center gap-4 my-3">
                            <h2 class="font-semibold text-xl whitespace-nowrap">Locais</h2>
                            <div class="flex-grow border-t border-gray-300 dark:border-white"></div>
                        </div>

                        @if ($locations->isEmpty())
                        <div class="text-xl">
                            <strong class="text-amber-400">Informação:</strong> Não há locais cadastrados.
                        </div>
                        @else
                        <table class="text-center min-w-full bg-[#3E3E3A] border-separate border-spacing-0">
                            <tr class="text-white">
                                <th class="py-2 px-4">Nome</th>
                                <th class="py-2 px-4 border-l border-gray-300">Quan. de items com esse loc.
                                </th>
                                <th class="py-2 px-4 border-l border-gray-300">Quan. de relatos com esse
                                    loc.</th>
                                <th class="py-2 px-4 border-l border-gray-300">Ações</th>
                            </tr>
                            @foreach ($locations as $location)
                            <tr
                                class="text-gray-300 border-t border-gray-400 hover:bg-[#1b1b18] transition-colors duration-300 ease-in-out">
                                <td class="py-2 px-4">{{ $location->name }}</td>
                                <td class="py-2 px-4 border-l border-gray-400">{{ $location->items_count }}</td>
                                <td class="py-2 px-4 border-l border-gray-400">{{ $location->reports_count }}</td>
                                <td class="py-2 px-4 border-l border-gray-400">
                                    <form action="{{ route('locations.destroy', ['location' => $location->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 hover:underline">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        @endif

                        <div class="flex items-center gap-4 my-3">
                            <h2 class="font-semibold text-xl whitespace-nowrap">Estados</h2>
                            <div class="flex-grow border-t border-gray-300 dark:border-white"></div>
                        </div>

                        @if ($conditions->isEmpty())
                        <div class="text-xl">
                            <strong class="text-amber-400">Informação:</strong> Não há estados cadastrados.
                        </div>
                        @else
                        <table class="text-center min-w-full bg-[#3E3E3A] border-separate border-spacing-0">
                            <tr class="text-white">
                                <th class="py-2 px-4">Nome</th>
                                <th class="py-2 px-4 border-l border-gray-300">Quan. de items com esse est.
                                </th>
                                <th class="py-2 px-4 border-l border-gray-300">Quan. de relatos com esse
                                    est.</th>
                                <th class="py-2 px-4 border-l border-gray-300">Ações</th>
                            </tr>
                            @foreach ($conditions as $condition)
                            <tr
                                class="text-gray-300 border-t border-gray-400 hover:bg-[#1b1b18] transition-colors duration-300 ease-in-out">
                                <td class="py-2 px-4">{{ $condition->name }}</td>
                                <td class="py-2 px-4 border-l border-gray-400">{{ $condition->items_count }}</td>
                                <td class="py-2 px-4 border-l border-gray-400">{{ $condition->reports_count }}</td>
                                <td class="py-2 px-4 border-l border-gray-400">
                                    <form action="{{ route('conditions.destroy', ['condition' => $condition->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 hover:underline">Excluir</button>
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
</x-app-layout>