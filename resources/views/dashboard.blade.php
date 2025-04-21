<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <div class="flex space-x-2 text-white">
                    <x-heroicon-s-home class="w-9 h-9" />
                    <h2 class="text-2xl font-bold mt-1">Dashboard</h2>
                </div>
                <div class="border-t dark:border-[#3E3E3A] my-3"></div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                <div class="dark:bg-[#3E3E3A] shadow rounded-lg p-6">
                    <div class="flex space-x-2 text-gray-400">
                        <x-heroicon-s-clipboard-document-list class="w-5 h-5" />
                        <h3 class="text-sm font-medium">Items Encontrados</h3>
                    </div>
                    <p class="mt-2 text-2xl font-semibold text-white">{{ $countLostItems }}</p>
                </div>

                <div class="dark:bg-[#3E3E3A] shadow rounded-lg p-6">
                    <div class="flex space-x-2 dark:text-gray-400">
                        <x-heroicon-o-clipboard-document-list class="w-5 h-5" />
                        <h3 class="text-sm font-medium">Items Devolvidos</h3>
                    </div>
                    <p class="mt-2 text-2xl font-semibold text-gray-800 dark:text-white">{{ $countReturnedItems }}</p>
                </div>

                <div class="dark:bg-[#3E3E3A] shadow rounded-lg p-6">
                    <div class="flex space-x-2 dark:text-gray-400">
                        <x-heroicon-m-chat-bubble-left-ellipsis class="w-5 h-5" />
                        <h3 class="text-sm font-medium">Relatos recebidos</h3>
                    </div>
                    <p class="mt-2 text-2xl font-semibold text-gray-800 dark:text-white">{{ $countReports }}</p>
                </div>
            </div>
            <div class="flex items-center gap-4 mb-8">
                <div class="flex space-x-2 dark:text-white">
                    <h2 class="text-lg font-bold whitespace-nowrap">
                        Items encontrados em Abril
                    </h2>
                    <x-heroicon-m-calendar-days class="w-6 h-6" />
                </div>
                <div class="flex-grow h-px dark:bg-[#3E3E3A]"></div>
                <span class="inline-block bg-amber-500 text-white text-sm px-3 py-1 rounded-full shadow">
                    23 items este mês
                </span>
            </div>
            <div class="dark:bg-[#3E3E3A] overflow-hidden shadow-sm sm:rounded-lg p-6 pt-2 text-white">
                <div class="flex items-center gap-4 my-3">
                    <h2 class="text-white font-semibold text-xl whitespace-nowrap">Perdas mais recentes</h2>
                    <div class="flex-grow border-t border-gray-300 dark:border-white"></div>
                    <x-heroicon-m-clock class="w-7 h-7" />
                </div>

                <table class="min-w-full text-center border-separate border-spacing-0">
                    <thead class="text-white">
                        <tr>
                            <th class="py-2 pr-4">Nome</th>
                            <th class="py-2 px-4 border-l border-gray-300">Data</th>
                            <th class="py-2 px-4 border-l border-gray-300">Categoria</th>
                            <th class="py-2 px-4 border-l border-gray-300">Local</th>
                            <th class="py-2 px-4 border-l border-gray-300">Estado</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-300">
                        <tr class="dark:hover:bg-[#1b1b18] transition-colors duration-300 ease-in-out">
                            <td class="py-2 pr-4">Carteira preta</td>
                            <td class="py-2 px-4 border-l dark:border-gray-400">Contém documentos
                                pessoais</td>
                            <td class="py-2 px-4 border-l dark:border-gray-400">10/04/2025</td>
                            <td class="py-2 px-4 border-l dark:border-gray-400">Biblioteca</td>
                            <td class="py-2 px-4 border-l dark:border-gray-400">Usado</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>