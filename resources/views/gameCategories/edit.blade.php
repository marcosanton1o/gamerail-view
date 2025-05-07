@extends("layouts.form")
@section("title", "Editanto " . $gameCategory->name)
@section("content")
<form id="form" class="" data-parsley-validate action="{{ route('gameCategories.update', $gameCategory->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $gameCategory->id }}">
    <div class="md:flex md:gap-6">
        <div class="flex-1 mb-4">
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input required maxLength="30" minLength="2" id="name" name="name" value="{{ old('name', $gameCategory->name) }}" type="text" class="w-full" />
        </div>
    </div>
    <x-input-label :value="__('Descrição')" for="description" />
    <textarea required maxLength='200' minLength='2'
        class="mb-4 h-20 w-full rounded-md border-none bg-purple-600 text-white placeholder-white shadow-inner ring-0 transition-all focus:border-fuchsia-500 focus:bg-purple-700 focus:text-white focus:ring-2 focus:ring-white"
        id="description"
        name="description"
        type="text">{{ old('description', $gameCategory->description) }}</textarea>

    <x-primary-button class="mb-1 mt-2 flex w-full justify-center">
        {{ __("Confirmar") }}
    </x-primary-button>
    <x-link
        class="mt-3 flex justify-center"
        href="{{route('gameCategories.index')}}"
        :value="__('Voltar á Tabela')" />
    </div>
</form>
@endsection

@section("char")
@endsection
<script>
    document.getElementById('form').addEventListener('submit', function() {
        const input = document.getElementById('price');
        let valor = input.value;

        valor = valor.replace(/R\$\s?/, '');

        valor = valor.replace(/\./g, '');

        valor = valor.replace(',', '.');

        input.value = valor;
    });
</script>