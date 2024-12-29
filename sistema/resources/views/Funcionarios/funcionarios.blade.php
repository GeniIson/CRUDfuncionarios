<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-x-auto">

                <div style="text-align: end;margin:10px">

                    <a href="{{ route('dashboard') }}" class="ms-3">
                      +  {{ __('Register New Employee') }}
                    </a>
                </div>



                <table class="min-w-full bg-white border border-gray-600 mx-auto">
                    
                    <thead class="bg-gray-100">
                        <tr>

                            <th class="px-4 py-2 text-start text-gray-600 font-semibold border-b">Nome</th>
                            <th class="px-4 py-2 text-start text-gray-600 font-semibold border-b">CPF</th>
                            <th class="px-4 py-2 text-start text-gray-600 font-semibold border-b">Data Nacimento</th>
                            <th class="px-4 py-2 text-start text-gray-600 font-semibold border-b">Telefone</th>
                            <th class="px-4 py-2 text-start text-gray-600 font-semibold border-b">Genero</th>
                            <th class="px-4 py-2 text-left text-gray-600 font-semibold border-b">Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php $i=1; @endphp
                        @while ($i < 10)
                            @php $i++; @endphp
                            <tr class="hover:bg-gray-50">

                                <td class="px-4 py-2 border-b text-gray-700">João Silva</td>
                                <td class="px-4 py-2 border-b text-gray-700">1854874-03</td>
                                <td class="px-4 py-2 border-b text-gray-700">24/10/1990</td>
                                <td class="px-4 py-2 border-b text-gray-700">26585487/81</td>
                                <td class="px-4 py-2 border-b text-gray-700"> Masculino</td>
                                <td class="px-4 py-2 border-b">
                                    <button
                                        class="text-blue bg-blue-500 hover:bg-blue-600 px-3 py-1 rounded">Atualizar</button>
                                    <button class="text-red bg-red-500 hover:bg-red-600 px-3 py-1 ">Excluir</button>
                                </td>
                            </tr>
                        @endwhile



                    </tbody>
                </table>
            </div>





        </div>
    </div>




    <!-- Botão para abrir o modal -->
    <button class="bg-blue-500 text-red px-4 py-2 rounded hover:bg-blue-600"
        onclick="document.getElementById('modal').classList.remove('hidden')">
        Abrir Modal
    </button>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg w-96 p-6">
            <h2 class="text-lg font-bold text-gray-700 mb-4">Título do Modal</h2>
            <p class="text-gray-600 mb-6">
                Este é um exemplo de modal criado com Tailwind CSS.
            </p>
            <div class="flex justify-end">
                <!-- Botão para fechar o modal -->
                <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600"
                    onclick="document.getElementById('modal').classList.add('hidden')">
                    Fechar
                </button>
            </div>
        </div>
    </div>

</x-app-layout>
