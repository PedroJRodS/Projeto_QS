<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Items') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="mb-6">
        <div class="flex justify-between">
          <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Items Cadastrados: {{ $count }}</h2>
          @if(auth()->check() && auth()->user()->is_admin)
          <div>
            <a href="{{ route('items.create') }}"
              class="bg-amber-400 text-white px-4 py-2 rounded hover:bg-amber-500 transition">
              Novo Item
            </a>
          </div>
          @endif
        </div>
        <div class="border-t dark:border-[#3E3E3A] my-3"></div>
      </div>

      <div class="dark:bg-[#3E3E3A] overflow-hidden shadow-sm sm:rounded-lg p-6 pt-2 text-white">
        @if (session()->has('message'))
          <div class="mb-4 mt-4 text-amber-400 font-medium">
            {{ session()->get('message') }}
          </div>
        @endif

        <div class="flex items-center gap-4 my-3">
          <h2 class="font-semibold text-xl whitespace-nowrap">Items Perdidos</h2>
          <div class="flex-grow border-t border-gray-300 dark:border-white"></div>
        </div>

        @if ($lostItems->isEmpty())
        <div class="text-xl">
          <strong class="text-amber-400">Informação:</strong> Não há itens registrados.
        </div>
        @else
        <table class="text-center min-w-full bg-[#3E3E3A] border-separate border-spacing-0">
          <thead>
            <tr>
              <th class="py-2 px-4 border-r border-gray-300">Nome</th>
              <th class="py-2 px-4 border-r border-gray-300">Data/achado</th>
              <th class="py-2 px-4 border-r border-gray-300">Categoria</th>
              <th class="py-2 px-4 border-r border-gray-300">Local</th>
              <th class="py-2 px-4 border-r border-gray-300">Estado</th>
            </tr>
          </thead>
          <tbody class="text-gray-300">
            @foreach ($lostItems as $item)
            <tr class="border-t border-white">
              <td class="py-2 px-4 border-r border-gray-300 underline">
                @if(auth()->check() && auth()->user()->is_admin)
                <a href="{{ route('items.edit', ['item' => $item->id]) }}" class="text-amber-400">{{
                  $item->name }}</a>
                @else
                <a href="{{ route('items.show', ['item' => $item->id]) }}" class="text-amber-400 ml-4">{{
                  $item->name }}</a>
                @endif
              </td>
              <td class="py-2 px-4 border-r border-gray-300">{{ $item->found_date }}</td>
              <td class="py-2 px-4 border-r border-gray-300">{{ $item->category->name }}</td>
              <td class="py-2 px-4 border-r border-gray-300">{{ $item->location->name }}</td>
              <td class="py-2 px-4 border-r border-gray-300">{{ $item->condition->name }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @endif
        <div class="flex items-center gap-4 my-3">
          <h2 class="font-semibold text-xl whitespace-nowrap">Items Devolvidos</h2>
          <div class="flex-grow border-t border-gray-300 dark:border-white"></div>
        </div>
        @if ($returnedItems->isEmpty())
        <div class="text-xl">
          <strong class="text-amber-400">Informação:</strong> Não há itens registrados.
        </div>
        @else
        <table class="text-center min-w-full bg-[#3E3E3A] border-separate border-spacing-0">
          <thead>
            <tr>
              <th class="py-2 px-4 border-r border-white">Nome</th>
              <th class="py-2 px-4 border-r border-white">Nome/receptor</th>
              <th class="py-2 px-4 border-r border-white">Categoria</th>
              <th class="py-2 px-4 border-r border-white">Local</th>
              <th class="py-2 px-4 border-r border-white">Estado</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($returnedItems as $item)
            <tr class="border-t border-white">
              <td class="py-2 px-4 border-r border-gray-300 underline text-amber-400">
                @if(auth()->check() && auth()->user()->is_admin)
                <a href="{{ route('items.edit', ['item' => $item->id]) }}" class="">{{ $item->name }}</a>
                @else
                <a href="{{ route('items.show', ['item' => $item->id]) }}" class="hover:underline ml-4">{{ $item->name
                  }}</a>
                @endif
              </td>
              <td class="py-2 px-4 border-r border-gray-300">{{ $item->returned_to }}</td>
              <td class="py-2 px-4 border-r border-gray-300">{{ $item->category->name }}</td>
              <td class="py-2 px-4 border-r border-gray-300">{{ $item->location->name }}</td>
              <td class="py-2 px-4 border-r border-gray-300">{{ $item->condition->name }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @endif
      </div>
    </div>
  </div>
</x-app-layout>