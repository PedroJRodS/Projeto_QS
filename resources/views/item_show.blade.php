<x-app-layout>
  <div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
      <a href="{{ route('items.index') }}" class="text-amber-400 hover:underline mb-6 inline-block">← Voltar</a>

      <div class="bg-white dark:bg-[#3E3E3A] shadow-md rounded-lg p-8">
        <h3 class="text-2xl font-semibold mb-6 text-amber-400">Detalhes do Item</h3>

        <ul class="space-y-3 text-lg text-gray-700 dark:text-gray-200">
          <li><strong>Nome:</strong> {{ $item->name }}</li>
          <li><strong>Descrição:</strong> {{ $item->description }}</li>
          <li><strong>Encontrado em:</strong> {{ $item->found_date }}</li>
          <li><strong>Categoria:</strong> {{ $item->category->name }}</li>
          <li><strong>Local:</strong> {{ $item->location->name }}</li>
          <li><strong>Estado:</strong> {{ $item->condition->name }}</li>
          <li><strong>Status:</strong> {{ $item->status }}</li>
          <li><strong>Data de Retorno:</strong> {{ $item->returned_date ?? '—' }}</li>
          <li><strong>Recebido por:</strong> {{ $item->returned_to ?? '—' }}</li>
        </ul>
      </div>
    </div>
  </div>
</x-app-layout>