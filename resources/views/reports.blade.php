<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Relatos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white text-xl font-semibold dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
                Quantidade de Relatos: {{ $count }}
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-3">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session()->has('message'))
                    {{ session()->get('message'); }}
                    @endif
                    <a href="{{ route('reports.create') }}" class="font-semibold underline">Relatar item perdido</a>
                    <hr>
                    @if ($reports->isEmpty())
                    <div class="text-xl">
                        <strong>Informação:</strong> Não há relatos.
                    </div>
                    @else
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Nome do item</th>
                                <th class="py-2 px-4 border-b">Ações</th>
                            </tr>
                        </thead>
                        @foreach ($reports as $report)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $report->item_name }}</td>
                            <td class="py-2 px-4 border-b">
                                @if(auth()->check() && auth()->user()->is_admin)
                                <a href="{{ route('reports.edit', ['report' => $report->id]) }}"
                                    class="text-blue-500 hover:underline">Editar</a>
                                @endif
                                <a href="{{ route('reports.show', ['report' => $report->id]) }}"
                                    class="hover:underline ml-4">Ver</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>