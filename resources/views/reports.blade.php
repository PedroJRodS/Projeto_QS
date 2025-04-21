<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="mb-6">
        <div class="flex justify-between">
          <div class="flex space-x-2 text-white">
            <x-heroicon-s-chat-bubble-left-ellipsis class="w-9 h-9 " />
            <h2 class="text-2xl font-bold mt-1">Relatos Registrados: {{ $count }}</h2>
          </div>
          <div>
            <a href="{{ route('reports.create') }}"
              class="bg-amber-400 text-white pl-3 pr-4 py-2 rounded hover:bg-amber-500 transition">
              <x-heroicon-o-plus class="w-5 h-5 mb-1 inline" />
              Relatar Item
            </a>
          </div>
        </div>
        <div class="border-t dark:border-[#3E3E3A] my-3"></div>
      </div>

      <div class="dark:bg-[#3E3E3A] overflow-hidden shadow-sm sm:rounded-lg p-6 pt-2 text-white">

        @if (session()->has('message'))
        <div class="mb-4 mt-4 text-amber-400 font-medium text-xl">
          {{ session()->get('message') }}
        </div>
        @endif

        <div class="flex items-center gap-4 my-3">
          <h2 class="font-semibold text-xl whitespace-nowrap">Lista de Relatos</h2>
          <div class="flex-grow border-t border-gray-300 dark:border-white"></div>
          <x-heroicon-o-chat-bubble-left-ellipsis class="w-7 h-7" />
        </div>

        @if ($reports->isEmpty())
        <div class="text-xl">
          <strong class="text-amber-400">Informação:</strong> Não há relatos cadastrados.
        </div>
        @else
        <table class="text-center min-w-full bg-[#3E3E3A] border-separate border-spacing-0">
          <thead class="text-white">
            <tr>
              <th class="py-2 px-4">Nome do Item</th>
              <th class="py-2 px-4 border-l border-gray-300">Data/relato</th>
              <th class="py-2 px-4 border-l border-gray-300">Nome/relator</th>
              <th class="py-2 px-4 border-l border-gray-300">Categoria</th>
              <th class="py-2 px-4 border-l border-gray-300">Local</th>
              <th class="py-2 px-4 border-l border-gray-300">Estado</th>
            </tr>
          </thead>
          <tbody class="text-gray-300">
            @foreach ($reports as $report)
            <tr class="border-t border-gray-400 hover:bg-[#1b1b18] transition-colors duration-300 ease-in-out">
              <td class="py-2 px-4 underline text-amber-400">
                <a href="{{ route('reports.edit', ['report' => $report->id]) }}">
                  {{ $report->item_name }}
                </a><x-heroicon-s-arrow-up-right class="w-3 h-3 inline mb-1" />
              </td>
              <td class="py-2 px-4 border-l border-gray-400">{{ $report->report_date }}</td>
              <td class="py-2 px-4 border-l border-gray-400">{{ $report->reporter_name }}</td>
              <td class="py-2 px-4 border-l border-gray-400">{{ $report->category->name }}</td>
              <td class="py-2 px-4 border-l border-gray-400">{{ $report->location->name }}</td>
              <td class="py-2 px-4 border-l border-gray-400">{{ $report->condition->name }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @endif
      </div>
    </div>
  </div>
</x-app-layout>