<x-app-layout>
  <div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
      <a href="{{ route('items.index') }}"
        class="flex font-semibold text-md text-[#5b5b56] hover:text-amber-400 transition mb-2">
        <x-heroicon-m-arrow-left class="w-6 h-6 mr-1" />Voltar
      </a>

      <div class="bg-white dark:bg-[#3E3E3A] shadow-md rounded-lg p-8">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-white">Editar Item</h2>

        @if (session()->has('message'))
        <div class="mb-4 mt-4 text-amber-400 font-medium text-xl">
          {{ session()->get('message') }}
        </div>
        @endif

        <form action="{{ route('items.update', $item->id) }}" method="post" class="space-y-5">
          @csrf
          @method('PUT')

          <div>
            <label for="name" class="text-white block text-sm font-medium mb-1">Nome do item<span
                class="text-red-500">*</span></label>
            <input
              class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm focus:ring focus:ring-amber-400"
              type="text" name="name" id="name" value="{{ old('name', $item->name) }}">
            @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="description" class="block text-white text-sm font-medium mb-1">Descrição<span
                class="text-red-500">*</span></label>
            <textarea
              class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm focus:ring focus:ring-amber-400"
              type="text" name="description" id="description"
              value="{{ old('description', $item->description) }}"></textarea>
            @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="found_date" class="block text-white text-sm font-medium mb-1">Data em que foi encontrado<span
                class="text-red-500">*</span></label>
            <input class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm" type="date"
              name="found_date" id="found_date" value="{{ old('found_date', $item->found_date) }}">
            @error('found_date')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="category_id" class="block text-white text-sm font-medium mb-1">Categoria<span
                class="text-red-500">*</span></label>
            <select class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm" name="category_id"
              id="category_id">
              <option value="" disabled>Escolha uma categoria</option>
              @foreach($categories as $category)
              <option value="{{ $category->id }}" @selected(old('category_id', $item->category_id) == $category->id)>
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
              <option value="" disabled>Escolha um local</option>
              @foreach($locations as $location)
              <option value="{{ $location->id }}" @selected(old('location_id', $item->location_id) == $location->id)>
                {{ $location->name }}
              </option>
              @endforeach
            </select>
            @error('location_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="condition_id" class="block text-white text-sm font-medium mb-1">Estado<span
                class="text-red-500">*</span></label>
            <select class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm" name="condition_id"
              id="condition_id">
              <option value="" disabled>Escolha um local</option>
              @foreach($conditions as $condition)
              <option value="{{ $condition->id }}" @selected(old('condition_id', $item->condition_id) ==
                $condition->id)>
                {{ $condition->name }}
              </option>
              @endforeach
            </select>
            @error('condition_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="status" class="block text-white text-sm font-medium mb-1">Status<span
                class="text-red-500">*</span></label>
            <select class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm" name="status"
              id="status">
              <option value="Perdido" @selected(old('status', $item->status) == 'Perdido')>Perdido</option>
              <option value="Devolvido" @selected(old('status', $item->status) == 'Devolvido')>Devolvido</option>
            </select>
            @error('status')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <h5 class="text-red-400 mt-4 font-semibold">Preencha somente se o item foi devolvido:</h5>

          <div>
            <label for="returned_date" class="block text-white text-sm font-medium mb-1 mt-2">Data do retorno</label>
            <input class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm" type="date"
              name="returned_date" id="returned_date" value="{{ old('returned_date', $item->returned_date) }}">
            @error('returned_date')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="returned_to" class="block text-white text-sm font-medium mb-1 mt-2">Entregue para</label>
            <input class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm" type="text"
              name="returned_to" id="returned_to" value="{{ old('returned_to', $item->returned_to) }}">
            @error('returned_to')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <button type="submit"
            class="px-6 py-2 bg-amber-500 hover:bg-amber-600 text-white font-semibold rounded-md transition">
            Salvar Alterações
          </button>
        </form>
        <form action="{{ route('items.destroy', ['item' => $item->id]) }}" method="post" class="mt-3">
          @csrf
          @method('DELETE')
          <button type="submit"
            class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-md transition">
            Deletar
          </button>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>