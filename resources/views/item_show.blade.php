<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Ver Item') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <a href="{{ route('items.index') }}">Voltar</a>
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <form action="{{ route('items.destroy', ['item' => $item->id]) }}" method="post">
            @csrf
            <ul>
              <li>Nome: {{ $item->name }}</li>
              <li>Descrição: {{ $item->description }}</li>
              <li>Data em que o item foi encontrado: {{ $item->found_date }}</li>
              <li>Categoria: {{ $item->category->name }}</li>
              <li>Local: {{ $item->location->name }}</li>
              <li>Status do item: {{ $item->status }}</li>
              <li>Data do retorno: {{ $item->returned_date }}</li>
              <li>Nome de quem recebeu: {{ $item->returned_to }}</li>
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