<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                <div class="dark:bg-[#3E3E3A] shadow rounded-lg p-6">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Items Encontrados</h3>
                    <p class="mt-2 text-2xl font-semibold text-gray-800 dark:text-white">152</p>
                </div>

                <div class="dark:bg-[#3E3E3A] shadow rounded-lg p-6">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Items Devolvidos</h3>
                    <p class="mt-2 text-2xl font-semibold text-gray-800 dark:text-white">87</p>
                </div>

                <div class="dark:bg-[#3E3E3A] shadow rounded-lg p-6">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Relatos Recebidos</h3>
                    <p class="mt-2 text-2xl font-semibold text-gray-800 dark:text-white">64</p>
                </div>
            </div>
            <div class="flex items-center gap-4 mb-8">
                <h2 class="text-lg font-bold text-gray-800 dark:text-white whitespace-nowrap">
                    Items encontrados em Abril
                </h2>
                <div class="flex-grow h-px dark:bg-[#3E3E3A]"></div>
                <span class="inline-block bg-amber-500 text-white text-sm px-3 py-1 rounded-full shadow">
                    23 items este mês
                </span>
            </div>
            <div class="dark:bg-[#3E3E3A] shadow rounded-lg p-4 overflow-x-auto">
                <table class="w-full text-left text-sm border-separate border-spacing-0">
                    <thead class="text-gray-600 dark:text-gray-300 border-b">
                        <tr>
                            <th class="py-2 pr-4">Nome</th>
                            <th class="py-2 px-4 border-l dark:border-gray-500">Descrição</th>
                            <th class="py-2 px-4 border-l dark:border-gray-500">Data</th>
                            <th class="py-2 px-4 border-l dark:border-gray-500">Local</th>
                            <th class="py-2 px-4 border-l dark:border-gray-500">Estado</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800 dark:text-gray-300">
                        <tr class="border-b hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="py-2 pr-4">Carteira preta</td>
                            <td class="py-2 px-4 border-l border-gray-200 dark:border-gray-500">Contém documentos
                                pessoais</td>
                            <td class="py-2 px-4 border-l border-gray-200 dark:border-gray-500">10/04/2025</td>
                            <td class="py-2 px-4 border-l border-gray-200 dark:border-gray-500">Biblioteca</td>
                            <td class="py-2 px-4 border-l border-gray-200 dark:border-gray-500">Usado</td>
                        </tr>
                        <!-- Outras linhas -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>