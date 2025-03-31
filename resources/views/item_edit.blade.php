<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Editar Item') }}
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

          <form action="{{ route('items.update', ['item' => $item->id]) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <input class="rounded" type="text" name="name" value="{{ $item->name }}"> <br>
            <input class="mt-1 rounded" type="text" name="description" value="{{ $item->description }}"> <br>
            <label class="mt-1" for="found_date">Data em que o item foi encontrado:</label> <br>
            <input class="mt-1 rounded" type="date" name="found_date" id="found_date" value="{{ $item->found_date }}">
            <br>
            <select class="mt-1 rounded" name="category_id">
              <option value="{{ $item->category_id }}" selected>{{ $item->category->name }}</option>
              @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select> <br>
            <select class="mt-1 rounded" name="location_id">
              <option value="{{ $item->location_id }}" selected>{{ $item->location->name }}</option>
              @foreach($locations as $location)
              <option value="{{ $location->id }}">{{ $location->name }}</option>
              @endforeach
            </select> <br>
            <select class="mt-1 rounded" name="status">
              <option value="{{ $item->status }}" selected>{{ $item->status }}</option>
              <option value="Perdido">Perdido</option>
              <option value="Devolvido">Devolvido</option>
            </select> <br>
            <h5 class="mt-4" style="color: rgb(255, 0, 0)">Preencha somente se o item tiver sido devolvido*</h5>
            <label class="mt-1 " for="returned_date">Data do retorno:</label> <br>
            <input class="mt-1 rounded" type="date" name="returned_date" id="returned_date"
              value="{{ $item->returned_date }}"> <br>
            <input class="mt-1 rounded" type="text" name="returned_to" value="{{ $item->returned_to }}"
              placeholder="Nome de quem recebeu"></input> <br>
            <button class="mt-1  underline" type="submit">Editar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>