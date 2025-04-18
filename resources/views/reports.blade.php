<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Relatos') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="mb-6">
        <div class="flex justify-between">
          <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Relatos Registrados: {{ $count }}</h2>
          <div>
            <a href="{{ route('reports.create') }}"
              class="bg-amber-400 text-white px-4 py-2 rounded hover:bg-amber-500 transition">
              Novo Relato
            </a>
          </div>
        </div>
        <div class="border-t dark:border-[#3E3E3A] my-3"></div>
      </div>

      <div class="dark:bg-[#3E3E3A] overflow-hidden shadow-sm sm:rounded-lg p-6 pt-2 text-white">
        @if (session()->has('message'))
        <div class="mb-4 text-amber-400 font-medium">
          {{ session()->get('message') }}
        </div>
        @endif

        <div class="flex items-center gap-4 my-3">
          <h2 class="font-semibold text-xl whitespace-nowrap">Lista de Relatos</h2>
          <div class="flex-grow border-t border-gray-300 dark:border-white"></div>
        </div>

        @if ($reports->isEmpty())
        <div class="text-xl">
          <strong class="text-amber-400">Informação:</strong> Não há relatos cadastrados.
        </div>
        @else
        <table class="text-center min-w-full bg-[#3E3E3A] border-separate border-spacing-0">
          <thead>
            <tr>
              <th class="py-2 px-4 border-r border-white">Nome do Item</th>
              <th class="py-2 px-4 border-r border-white">Data/relato</th>
              <th class="py-2 px-4 border-r border-white">Nome/relator</th>
              <th class="py-2 px-4 border-r border-white">Categoria</th>
              <th class="py-2 px-4 border-r border-white">Local</th>
              <th class="py-2 px-4 border-r border-white">Estado</th>
            </tr>
          </thead>
          <tbody class="text-gray-300">
            @foreach ($reports as $report)
            <tr class="border-t border-white">
              <td class="py-2 px-4 border-r border-gray-300 underline text-amber-400">
                <a href="{{ route('reports.edit', ['report' => $report->id]) }}">
                  {{ $report->item_name }}
                </a>
              </td>
              <td class="py-2 px-4 border-r border-gray-300">{{ $report->report_date }}</td>
              <td class="py-2 px-4 border-r border-gray-300">{{ $report->reporter_name }}</td>
              <td class="py-2 px-4 border-r border-gray-300">{{ $report->category->name }}</td>
              <td class="py-2 px-4 border-r border-gray-300">{{ $report->location->name }}</td>
              <td class="py-2 px-4 border-r border-gray-300">{{ $report->condition->name }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @endif
      </div>
    </div>
  </div>
</x-app-layout>