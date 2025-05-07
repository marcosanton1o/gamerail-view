@extends("layouts.form")
@section("title", "Adicionar Empresa")
@section("content")
<form data-parsley-validate action="{{ route('companies.store') }}" id="form" method="POST" class="max-w-3xl mx-auto p-6">
    @csrf

    <!-- Linha: Título e Preço -->
    <div class="md:flex md:gap-6">
        <div class="flex-1 mb-4">
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input required maxLength="30" minLength="2" id="name" name="name" type="text" class="w-full" />
        </div>
    </div>

    <!-- Linha: Categoria e Data de Lançamento -->
    <div class="md:flex md:gap-6">
    <div class="flex-1 mb-4">
            <x-input-label for="ceo" :value="__('CEO')" />
            <x-text-input required maxLength="30" minLength="2" id="ceo" name="ceo" type="text" class="w-full" />
        </div>
        <div class="flex-1 mb-4">
            <x-input-label for="foundation_date" :value="__('Data de Fundação')" />
            <x-text-input required id="foundation_date" name="foundation_date" type="date" class="w-full"
             onkeydown="return false;" />
        </div>
    </div>

    <!-- Descrição -->
    <div class="mb-4">
        <x-input-label for="description" :value="__('Descrição')" />
        <textarea required maxLength='200' minLength='2'
                class="mb-4 h-20 w-full rounded-md border-none bg-purple-600 text-white placeholder-white shadow-inner ring-0 transition-all focus:border-fuchsia-500 focus:bg-purple-700 focus:text-white focus:ring-2 focus:ring-white"
                id="description"
                name="description"
                type="text"
            ></textarea>
    </div>

    <!-- Botões -->
    <div class="flex flex-col items-center">
        <x-primary-button class="mb-1 w-full justify-center">
            {{ __("Confirmar") }}
        </x-primary-button>
        <x-link class="mt-3" href="{{ route('companies.index') }}" :value="__('Voltar à Tabela')" />
    </div>
</form>
@endsection

@section("char")
@endsection
