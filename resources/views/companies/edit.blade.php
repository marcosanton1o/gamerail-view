@extends("layouts.form")
@section("title", "Editanto " . $company->name)
@section("content")
<form id="form" class="" data-parsley-validate action="{{ route('companies.update', $company->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $company->id }}">
        <div class="md:flex md:gap-6">
        <div class="flex-1 mb-4">
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input required maxLength="30" minLength="2" id="name" name="name" value="{{ old('name', $company->name) }}" type="text" class="w-full" />
        </div>
    </div>

    <div class="md:flex md:gap-6">
    <div class="flex-1 mb-4">
            <x-input-label for="name" :value="__('CEO')" />
            <x-text-input required maxLength="30" minLength="2" id="ceo" ceo="ceo" value="{{ old('ceo', $company->ceo) }}" type="text" class="w-full" />
        </div>
        <div class="flex-1 mb-4">
            <x-input-label for="foundation_date" :value="__('Data de fundção')" />
            <x-text-input required id="foundation_date" name="foundation_date" type="date" class="w-full" value="{{ old('foundation_date', $company->foundation_date) }}"
             onkeydown="return false;" />
        </div>
    </div>
            <x-input-label :value="__('Descrição')" for="description" />
            <textarea required maxLength='200' minLength='2'
                class="mb-4 h-20 w-full rounded-md border-none bg-purple-600 text-white placeholder-white shadow-inner ring-0 transition-all focus:border-fuchsia-500 focus:bg-purple-700 focus:text-white focus:ring-2 focus:ring-white"
                id="description"
                name="description"
                type="text"
            >{{ old('description', $company->description) }}</textarea>
        
        <x-primary-button class="mb-1 mt-2 flex w-full justify-center">
            {{ __("Confirmar") }}
        </x-primary-button>
        <x-link
            class="mt-3 flex justify-center"
            href="{{route('companies.index')}}"
            :value="__('Voltar á Tabela')"
        />
    </div>
    </form>
@endsection

@section("char")
@endsection

