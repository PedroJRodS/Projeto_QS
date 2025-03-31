<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Items') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div
        class="bg-white text-xl font-semibold dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
        Quantidade de Items: {{ $count }}
      </div>
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-3">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          @if (session()->has('message'))
          {{ session()->get('message'); }}
          @endif
          @if(auth()->check() && auth()->user()->is_admin)
          <div>
            <a href="{{ route('items.create') }}" class="font-semibold underline">Registrar novo
              item</a>
          </div>
          <hr>
          @endif
          <h2 class="mt-3 font-semibold text-xl">Items Perdidos</h2>
          <hr>
          @if ($lostItems->isEmpty())
          <div class="text-xl">
            <strong>Informação:</strong> Não há itens registrados.
          </div>
          @else
          <table class="min-w-full bg-white border border-gray-300">
            <thead>
              <tr>
                <th class="py-2 px-4 border-b">Nome</th>
                <th class="py-2 px-4 border-b">Ações</th>
              </tr>
            </thead>
            @foreach ($lostItems as $item)
            <tr>
              <td class="py-2 px-4 border-b">{{ $item->name }}</td>
              <td class="py-2 px-4 border-b">
                @if(auth()->check() && auth()->user()->is_admin)
                <a href="{{ route('items.edit', ['item' => $item->id]) }}"
                  class="text-blue-500 hover:underline">Editar</a>
                @endif
                <a href="{{ route('items.show', ['item' => $item->id]) }}" class="hover:underline ml-4">Ver</a>
              </td>
            </tr>
            @endforeach
          </table>
          @endif
          <h2 class="mt-3 font-semibold text-xl">Items Devolvidos</h2>
          <hr>
          @if ($returnedItems->isEmpty())
          <div class="text-xl">
            <strong>Informação:</strong> Não há itens registrados.
          </div>
          @else
          <table class="min-w-full bg-white border border-gray-300">
            <thead>
              <tr>
                <th class="py-2 px-4 border-b">Nome</th>
                <th class="py-2 px-4 border-b">Ações</th>
              </tr>
            </thead>
            <ul>
              @foreach ($returnedItems as $item)
              <tr>
                <td class="py-2 px-4 border-b">{{ $item->name }}</td>
                <td class="py-2 px-4 border-b">
                  @if(auth()->check() && auth()->user()->is_admin)
                  <a href="{{ route('items.edit', ['item' => $item->id]) }}"
                    class="text-blue-500 hover:underline">Editar</a>
                  @endif
                  <a href="{{ route('items.show', ['item' => $item->id]) }}" class="hover:underline ml-4">Ver</a>
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