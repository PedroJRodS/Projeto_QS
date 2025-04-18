<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('reports.index') }}" class="text-amber-400 hover:underline mb-4 inline-block">← Voltar</a>

            <div class="bg-white dark:bg-[#3E3E3A] shadow-md rounded-lg p-8">
                <h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-white">Relatar Item Perdido</h2>

                @if (session()->has('message'))
                <div class="mb-4 text-amber-400 font-medium">
                    {{ session()->get('message') }}
                </div>
                @endif

                <form action="{{ route('reports.store') }}" method="post" class="space-y-5">
                    @csrf

                    <!-- Nome do item -->
                    <div>
                        <label for="item_name" class="block text-white text-sm font-medium mb-1">Nome do item<span class="text-red-500">*</span></label>
                        <input type="text" name="item_name" id="item_name" value="{{ old('item_name') }}"
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm focus:ring focus:ring-amber-400">
                        @error('item_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Descrição -->
                    <div>
                        <label for="description" class="block text-white text-sm font-medium mb-1">Descrição do
                            item<span class="text-red-500">*</span></label>
                        <input type="text" name="description" id="description" value="{{ old('description') }}"
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm focus:ring focus:ring-amber-400">
                        @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Data do relato -->
                    <div>
                        <label for="report_date" class="block text-white text-sm font-medium mb-1">Data do
                            relato<span class="text-red-500">*</span></label>
                        <input type="date" name="report_date" id="report_date" value="{{ old('report_date') }}"
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm">
                        @error('report_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nome do relator -->
                    <div>
                        <label for="reporter_name" class="block text-white text-sm font-medium mb-1">Nome do
                            relator<span class="text-red-500">*</span></label>
                        <input type="text" name="reporter_name" id="reporter_name" value="{{ old('reporter_name') }}"
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm">
                        @error('reporter_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Categoria -->
                    <div>
                        <label for="category_id" class="block text-white text-sm font-medium mb-1">Categoria<span class="text-red-500">*</span></label>
                        <select name="category_id" id="category_id"
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm">
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

                    <!-- Local -->
                    <div>
                        <label for="location_id" class="block text-white text-sm font-medium mb-1">Local<span class="text-red-500">*</span></label>
                        <select name="location_id" id="location_id"
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm">
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
                        <label for="condition_id" class="block text-white text-sm font-medium mb-1">Estado do
                            item<span class="text-red-500">*</span></label>
                        <select class="w-full rounded-md border-gray-300 dark:border-gray-700 p-2 shadow-sm"
                            name="condition_id" id="condition_id">
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

                    <!-- Botão -->
                    <div class="pt-4">
                        <button type="submit"
                            class="px-6 py-2 bg-amber-500 hover:bg-amber-600 text-white font-semibold rounded-md transition">
                            Enviar Relato
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>