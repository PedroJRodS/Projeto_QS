<x-app-layout>
  <div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
      <a href="{{ route('items.index') }}" class="text-amber-400 hover:underline mb-4 inline-block">← Voltar</a>

      <div class="bg-white dark:bg-[#3E3E3A] shadow-md rounded-lg p-8">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-white">Editar Item</h2>

        @if (session()->has('message'))
          <div class="mb-4 text-green-500 font-medium">
            {{ session()->get('message') }}
          </div>
        @endif

        <form action="{{ route('items.update', $item->id) }}" method="post" class="space-y-5">
          @csrf
          @method('PUT')

          <div>
            <label for="name" class="text-white block text-sm font-medium mb-1">Nome do item</label>
            <input class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm focus:ring focus:ring-amber-400"
              type="text" name="name" id="name" value="{{ old('name', $item->name) }}">
            @error('name')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="description" class="block text-white text-sm font-medium mb-1">Descrição</label>
            <input class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm focus:ring focus:ring-amber-400"
              type="text" name="description" id="description" value="{{ old('description', $item->description) }}">
            @error('description')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="found_date" class="block text-white text-sm font-medium mb-1">Data em que foi encontrado</label>
            <input class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm"
              type="date" name="found_date" id="found_date" value="{{ old('found_date', $item->found_date) }}">
            @error('found_date')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="category_id" class="block text-white text-sm font-medium mb-1">Categoria</label>
            <select class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm" name="category_id" id="category_id">
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
            <label for="location_id" class="block text-white text-sm font-medium mb-1">Local</label>
            <select class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm" name="location_id" id="location_id">
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
            <label for="status" class="block text-white text-sm font-medium mb-1">Status</label>
            <select class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm" name="status" id="status">
              <option value="Perdido" @selected(old('status', $item->status) == 'Perdido')>Perdido</option>
              <option value="Devolvido" @selected(old('status', $item->status) == 'Devolvido')>Devolvido</option>
            </select>
            @error('status')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <h5 class="text-red-400 mt-4 font-semibold">Preencha somente se o item foi devolvido:</h5>

            <label for="returned_date" class="block text-white text-sm font-medium mb-1 mt-2">Data do retorno</label>
            <input class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm"
              type="date" name="returned_date" id="returned_date" value="{{ old('returned_date', $item->returned_date) }}">
            @error('returned_date')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <label for="returned_to" class="block text-white text-sm font-medium mb-1 mt-2">Entregue para</label>
            <input class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm"
              type="text" name="returned_to" id="returned_to" placeholder="Nome de quem recebeu"
              value="{{ old('returned_to', $item->returned_to) }}">
            @error('returned_to')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div class="pt-4">
            <button type="submit"
              class="px-6 py-2 bg-amber-500 hover:bg-amber-600 text-white font-semibold rounded-md transition">
              Salvar Alterações
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
