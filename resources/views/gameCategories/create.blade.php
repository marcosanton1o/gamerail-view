@extends("layouts.form")
@section("title", "Adicionar Categoria de Jogo")
@section("content")
<form data-parsley-validate action="{{ route('gameCategories.store') }}" id="form" method="POST" class="max-w-3xl mx-auto p-6">
    @csrf

    <!-- Linha: Título e Preço -->
    <div class="md:flex md:gap-6">
        <div class="flex-1 mb-4">
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input required maxLength="30" minLength="2" id="name" name="name" type="text" class="w-full" />
        </div>
    </div>
    <div>
        <x-input-label for="description" :value="__('Descrição')" />
        <textarea required maxLength='200' minLength='2'
            class="h-20 w-full rounded-md border-none bg-purple-600 text-white placeholder-white shadow-inner ring-0 transition-all focus:border-fuchsia-500 focus:bg-purple-700 focus:text-white focus:ring-2 focus:ring-white"
            id="description"
            name="description"
            type="text"></textarea>
    </div>

    <!-- Botões -->
    <div class="flex flex-col items-center mt-6">
        <x-primary-button class="mb-1 w-full justify-center">
            {{ __("Confirmar") }}
        </x-primary-button>
        <x-link class="mt-3" href="{{ route('gameCategories.index') }}" :value="__('Voltar à Tabela')" />
    </div>
</form>
@endsection

@section("char")
@endsection