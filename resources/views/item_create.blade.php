<x-app-layout>
  <div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
      <a href="{{ route('items.index') }}"
        class="flex font-semibold text-md text-[#5b5b56] hover:text-amber-400 transition mb-2">
        <x-heroicon-m-arrow-left class="w-6 h-6 mr-1" />Voltar
      </a>

      <div class="bg-white dark:bg-[#3E3E3A] shadow-md rounded-lg p-8">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-white">Cadastrar Item</h2>

        @if (session()->has('message'))
        <div class="mb-4 mt-4 text-amber-400 font-medium text-xl">
          {{ session()->get('message') }}
        </div>
        @endif

        <form action="{{ route('items.store') }}" method="post" class="space-y-5">
          @csrf

          <div>
            <label for="name" class="text-white block text-sm font-medium mb-1">Nome do item<span
                class="text-red-500">*</span></label>
            <input
              class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm focus:ring focus:ring-amber-400"
              type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="description" class="block text-white text-sm font-medium mb-1">Descrição<span
                class="text-red-500">*</span></label>
            <textarea
              class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm focus:ring focus:ring-amber-400"
              type="text" name="description" id="description" value="{{ old('description') }}"></textarea>
            @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="found_date" class="block text-white text-sm font-medium mb-1">Data em que foi encontrado<span
                class="text-red-500">*</span></label>
            <input class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm" type="date"
              name="found_date" id="found_date" value="{{ old('found_date') }}">
            @error('found_date')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="category_id" class="block text-white text-sm font-medium mb-1">Categoria<span
                class="text-red-500">*</span></label>
            <select class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm" name="category_id"
              id="category_id">
              <option value="" disabled selected>Escolha uma categoria</option>
              @foreach($categories as $category)
              <option value="{{ $category->id }}" @selected(old('category_id')==$category->id)>
                {{ $category->name }}
              </option>
              @endforeach
            </select>
            @error('category_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="location_id" class="block text-white text-sm font-medium mb-1">Local<span
                class="text-red-500">*</span></label>
            <select class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm" name="location_id"
              id="location_id">
              <option value="" disabled selected>Escolha um local</option>
              @foreach($locations as $location)
              <option value="{{ $location->id }}" @selected(old('location_id')==$location->id)>
                {{ $location->name }}
              </option>
              @endforeach
            </select>
            @error('location_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="condition_id" class="block text-white text-sm font-medium mb-1">Estado do item<span
                class="text-red-500">*</span></label>
            <select class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm" name="condition_id"
              id="condition_id">
              <option value="" disabled selected>Escolha um estado</option>
              @foreach($conditions as $condition)
              <option value="{{ $condition->id }}" @selected(old('condition_id')==$condition->id)>
                {{ $condition->name }}
              </option>
              @endforeach
            </select>
            @error('condition_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <input type="hidden" name="status" value="Perdido">

          <div class="flex justify-end">
            <button type="submit"
              class="px-6 py-2 bg-amber-500 hover:bg-amber-600 text-white font-semibold rounded-md transition">
              Cadastrar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>