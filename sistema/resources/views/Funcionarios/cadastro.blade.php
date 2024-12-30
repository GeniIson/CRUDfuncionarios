<x-app-layout>


    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-1 sm:pt-0 bg-gray-10  ">

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
              <h2> Cadastro de Funcionario.</h2>
            </div>
        </div>
        <form 
            action="{{ isset($funcionario) ? route('funcionarios.update', $funcionario->id) : route('funcionarios.store') }}" 
            method="POST"
        >
            @csrf
            @if(isset($funcionario))
                @method('PUT')
            @endif

            <!-- Nome -->
            <div class="div_inputs">
                <x-input-label for="nome" :value="__('Nome')" />
                <x-text-input 
                    id="nome" 
                    class="block mt-1 w-full" 
                    type="text" 
                    name="nome" 
                    :value="old('nome', $funcionario->nome ?? '')" 
                    
                />
                <x-input-error :messages="$errors->get('nome')" class="mt-2" />
            </div>

            <!-- CPF -->
            <div class="div_inputs">
                <x-input-label for="cpf" :value="__('CPF')" />
                <x-text-input 
                    id="cpf" 
                    class="block mt-1 w-full" 
                    type="text" 
                    name="cpf" 
                    :value="old('cpf', $funcionario->cpf ?? '')" 
                    
                />
                <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
            </div>

            <!-- Data de Nascimento -->
            <div class="div_inputs">
                <x-input-label for="data_nascimento" :value="__('Data de Nascimento')" />
                <x-text-input 
                    id="data_nascimento" 
                    class="block mt-1 w-full" 
                    type="date" 
                    name="data_nascimento" 
                    :value="old('data_nascimento', $funcionario->data_nascimento ?? '')" 
                    max="{{ date('Y-m-d') }}" 
                />
                <x-input-error :messages="$errors->get('data_nascimento')" class="mt-2" />
            </div>

            <!-- Telefone -->
            <div class="div_inputs">
                <x-input-label for="telefone" :value="__('Telefone')" />
                <x-text-input 
                    id="telefone" 
                    class="block mt-1 w-full" 
                    type="text" 
                    name="telefone" 
                    :value="old('telefone', $funcionario->telefone ?? '')" 

                     inputmode="decimal"
                />
                <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
            </div>

            <!-- Gênero -->
            <div class="div_inputs">
                <x-input-label for="genero" :value="__('Gênero')" />
                <select id="genero" name="genero" class="block mt-1 w-full">
                    <option value="" disabled {{ !isset($funcionario) ? 'selected' : '' }}>{{ __('Selecione o gênero') }}</option>
                    <option value="Masculino" {{ old('genero', $funcionario->genero ?? '') == 'Masculino' ? 'selected' : '' }}>{{ __('Masculino') }}</option>
                    <option value="Feminino" {{ old('genero', $funcionario->genero ?? '') == 'Feminino' ? 'selected' : '' }}>{{ __('Feminino') }}</option>
                    <option value="Outro" {{ old('genero', $funcionario->genero ?? '') == 'Outro' ? 'selected' : '' }}>{{ __('Outro') }}</option>
                </select>
                <x-input-error :messages="$errors->get('genero')" class="mt-2" />
            </div>

            <!-- Botão -->
           
            <div class="flex items-center justify-end mt-4">
                <a class="btn-custom btn-custom4" href="{{Route('Funcionarios')}}">{{__('Cancel')}}</a>
                
             
         
                <x-primary-button class="ms-4">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>


<script>
    $(document).ready(function() {
        $('#cpf').mask('000.000.000-00'); // Máscara de CPF
        $('#telefone').mask('(00) 00000-0000'); // Máscara de telefone
    });
</script>

