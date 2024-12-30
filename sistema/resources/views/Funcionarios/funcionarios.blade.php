<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Funcionario
        </h2>
    </x-slot>

    <div class="py-12">
        
        @section('content')
           

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-x-auto">




                    <table class="min-w-full bg-white border border-gray-600 mx-auto">

                        <thead class="bg-gray-100">
                            <tr>

                                <th class="px-4 py-2 text-start text-gray-600 font-semibold border-b">Nome</th>
                                <th class="px-4 py-2 text-start text-gray-600 font-semibold border-b">CPF</th>
                                <th class="px-4 py-2 text-start text-gray-600 font-semibold border-b">Data Nacimento</th>
                                <th class="px-4 py-2 text-start text-gray-600 font-semibold border-b">Telefone</th>
                                <th class="px-4 py-2 text-start text-gray-600 font-semibold border-b">Genero</th>
                                <th class="px-4 py-2 text-left text-gray-600 font-semibold border-b">


                                    <a href="{{ route('funcionarios.create') }}" class="btn-custom btn-custom1">
                                        {{ __('Register Employee') }}
                                    </a>

                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($funcionarios as $item)
                                <tr class="hover:bg-gray-50">

                                    <td class="px-4 py-2 border-b text-gray-700">{{ $item->nome }}</td>
                                    <td class="px-4 py-2 border-b text-gray-700">{{ $item->cpf }}</td>
                                    <td class="px-4 py-2 border-b text-gray-700">
                                        {{ \Carbon\Carbon::parse($item->data_nascimento)->format('d/m/Y') }}</td>
                                    <td class="px-4 py-2 border-b text-gray-700">{{ $item->telefone }}</td>
                                    <td class="px-4 py-2 border-b text-gray-700">{{ $item->genero }}</td>
                                    <td class="px-4 py-2 border-b" style="background-color: rgba(194, 193, 157, 0.178)">

                                        <a href="{{ route('funcionarios.edit', $item->id) }}"
                                            class="btn-custom btn-custom2">
                                            {{ __('To update') }}
                                        </a>





                                        <button class="btn-custom btn-custom3"
                                            onclick="document.getElementById('modal{{ $item->id }}').classList.remove('hidden')">
                                            {{ __('Delete') }}</button>
                                    </td>
                                </tr>


                                <!-- Modal -->
                                <div id="modal{{ $item->id }}"
                                    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                                    <div class="bg-white rounded-lg shadow-lg w-96 p-6">
                                        <h2 class="text-lg font-bold text-gray-700 mb-4">Excluir</h2>
                                        <p class="text-gray-600 mb-6">
                                            Vecê tem sertesa que quer excluir o cadastro do funcionario:
                                            {{ $item->nome }} ?
                                        </p>
                                        <div class="flex justify-end">
                                            <!-- Botão para fechar o modal -->
                                            <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600"
                                                onclick="document.getElementById('modal{{ $item->id }}').classList.add('hidden')">
                                                Voltar
                                            </button>
                                            <form action="{{ route('admin.delete', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE');
                                                <button type="submit"
                                                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                                                    Excluir
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </tbody>
                    </table>
                </div>





            </div>
        </div>





    </x-app-layout>
