<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('adminPanel') }}" class="text-amber-400 hover:underline mb-4 inline-block">← Voltar</a>

            <div class="bg-white dark:bg-[#3E3E3A] shadow-md rounded-lg p-8">
                <h2 class="text-2xl font-semibold mb-6 text-white">Criar local</h2>

                    @if (session()->has('message'))
          <div class="mb-4 mt-4 text-amber-400 font-medium">
            {{ session()->get('message') }}
          </div>
        @endif

     <form action="{{ route('locations.store') }}" method="post" class="space-y-5">
                        @csrf
                        <div>
                        <label for="name" class="text-white block text-sm font-medium mb-1">Nome do local<span class="text-red-500">*</span></label>
                        <input class="rounded" type="text" name="name" id="name" value="{{ old('name') }}"><br>
                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <button class="px-6 py-2 mt-2 bg-amber-500 hover:bg-amber-600 text-white font-semibold rounded-md transition" type="submit">Criar</button>
                     </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>