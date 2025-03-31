<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Editar Relato') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <a href="{{ route('reports.index') }}">Voltar</a>
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          @if (session()->has('message'))
          {{ session()->get('message'); }}
          @endif
          <form action="{{ route('reports.update', ['report' => $report->id]) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <input class="mt-1 rounded" type="text" name="item_name" value="{{ $report->item_name }}"> <br>
            <input class="mt-1 rounded" type="text" name="description" value="{{ $report->description }}"> <br>
            <label class="mt-1 " for="report_date">Data em que o relato foi feito:</label> <br>
            <input class="mt-1 rounded" type="date" name="report_date" id="report_date"
              value="{{ $report->report_date }}"> <br>
            <input class="mt-1 rounded" type="text" name="reporter_name" value="{{ $report->reporter_name }}"> <br>
            <select class="mt-1 rounded" name="category_id">
              <option value="{{ $report->category_id }}" selected>{{ $report->category->name }}</option>
              @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select> <br>
            <select class="mt-1 rounded" name="location_id">
              <option value="{{ $report->location_id }}" selected>{{ $report->location->name }}</option>
              @foreach($locations as $location)
              <option value="{{ $location->id }}">{{ $location->name }}</option>
              @endforeach
            </select> <br>
            <button class="mt-1 underline" type="submit">Editar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>