<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Registrar Item Perdido') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <a href="{{ route('items.index') }}">Voltar</a>
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          @if (session()->has('message'))
          {{ session()->get('message'); }}
          @endif
          <form action="{{ route('items.store') }}" method="post">
            @csrf
            <input class="rounded" type="text" name="name" placeholder="Nome do item"><br>
            <input class="mt-1 rounded" type="text" name="description" placeholder="Descrição do item"><br>
            <label class="mt-1" for="found_date">Data em que o item foi encontrado:</label><br>
            <input class="rounded" type="date" name="found_date" id="found_date"><br>
            <select class="mt-1 rounded" name="category_id">
              <option value="" disabled selected>Escolha uma categoria</option>
              @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select><br>
            <select class="mt-1 rounded" name="location_id">
              <option value="" disabled selected>Escolha um local</option>
              @foreach($locations as $location)
              <option value="{{ $location->id }}">{{ $location->name }}</option>
              @endforeach
            </select><br>
            <input type="hidden" name="status" value="Perdido">
            <button class="mt-1 rounded underline font-semibold" type="submit">Criar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>