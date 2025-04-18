<x-app-layout>
  <div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
      <a href="{{ route('reports.index') }}" class="text-amber-400 hover:underline mb-4 inline-block">← Voltar</a>

      <div class="bg-white dark:bg-[#3E3E3A] shadow-md rounded-lg p-8">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-white">Editar Relato</h2>

        @if (session()->has('message'))
          <div class="mb-4 mt-4 text-amber-400 font-medium">
            {{ session()->get('message') }}
          </div>
        @endif

        <form action="{{ route('reports.update', $report->id) }}" method="POST" class="space-y-5">
          @csrf
          @method('PUT')

          <div>
            <label for="item_name" class="block text-white text-sm font-medium mb-1">Nome do item<span class="text-red-500">*</span></label>
            <input type="text" name="item_name" id="item_name"
                   class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm"
                   value="{{ old('item_name', $report->item_name) }}">
            @error('item_name')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="description" class="block text-white text-sm font-medium mb-1">Descrição<span class="text-red-500">*</span></label>
            <textarea name="description" id="description"
                      class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm"
                      rows="4">{{ old('description', $report->description) }}</textarea>
            @error('description')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="report_date" class="block text-white text-sm font-medium mb-1">Data do relato<span class="text-red-500">*</span></label>
            <input type="date" name="report_date" id="report_date"
                   class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm"
                   value="{{ old('report_date', $report->report_date) }}">
            @error('report_date')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="reporter_name" class="block text-white text-sm font-medium mb-1">Seu nome<span class="text-red-500">*</span></label>
            <input type="text" name="reporter_name" id="reporter_name"
                   class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm"
                   value="{{ old('reporter_name', $report->reporter_name) }}">
            @error('reporter_name')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="category_id" class="block text-white text-sm font-medium mb-1">Categoria<span class="text-red-500">*</span></label>
            <select name="category_id" id="category_id"
                    class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm">
              <option value="" disabled>Escolha uma categoria</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $report->category_id) == $category->id)>
                  {{ $category->name }}
                </option>
              @endforeach
            </select>
            @error('category_id')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="location_id" class="block text-white text-sm font-medium mb-1">Local<span class="text-red-500">*</span></label>
            <select name="location_id" id="location_id"
                    class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm">
              <option value="" disabled>Escolha um local</option>
              @foreach ($locations as $location)
                <option value="{{ $location->id }}" @selected(old('location_id', $report->location_id) == $location->id)>
                  {{ $location->name }}
                </option>
              @endforeach
            </select>
            @error('location_id')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="condition_id" class="block text-white text-sm font-medium mb-1">Condição<span class="text-red-500">*</span></label>
            <select name="condition_id" id="condition_id"
                    class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm">
              <option value="" disabled>Escolha a condição</option>
              @foreach ($conditions as $condition)
                <option value="{{ $condition->id }}" @selected(old('condition_id', $report->condition_id) == $condition->id)>
                  {{ $condition->name }}
                </option>
              @endforeach
            </select>
            @error('condition_id')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>
            <button type="submit"
                    class="px-6 py-2 bg-amber-500 hover:bg-amber-600 text-white font-semibold rounded-md transition">
              Salvar Alterações
            </button>
        </form>
        <form action="{{ route('reports.destroy', ['report' => $report->id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        @if(auth()->check() && auth()->user()->is_admin)
                        <div>
                            <button class="mt-3 px-6 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-md transition" type="submit">Deletar</button>
                        </div>
                        @endif
                    </form>
      </div>
    </div>
  </div>
</x-app-layout>
