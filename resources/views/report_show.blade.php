<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ver Relato') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('reports.index') }}">Voltar</a>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('reports.destroy', ['report' => $report->id]) }}" method="post">
                        @csrf
                        <ul>
                            <li>Nome do item: {{ $report->item_name }}</li>
                            <li>Descrição do item: {{ $report->description }}</li>
                            <li>Data do relato: {{ $report->report_date }}</li>
                            <li>Nome do relator: {{ $report->reporter_name }}</li>
                            <li>Categoria: {{ $report->category->name }}</li>
                            <li>Local: {{ $report->location->name }}</li>
                        </ul>
                        <input type="hidden" name="_method" value="DELETE">
                        @if(auth()->check() && auth()->user()->is_admin)
                        <div>
                            <button style="color: red" class="mt-1" type="submit">Deletar</button>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>