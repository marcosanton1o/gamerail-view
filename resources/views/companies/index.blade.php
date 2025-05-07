@extends('layouts.dashboard')
@section('title', 'Listar Jogos')
@section('content')
        @if (session('message'))
            <p class="p-3 m-3 mt-1 bg-green-400 border-2 border-green-700 rounded-md text-green-950">{{session('message')}}</p>
        @else
        
        @endif
        <div class="shadow-md flex gap-8 mb-4 justify-center bg-purple-300 items-center font-bold p-2 sm:mx-2 rounded-md">
                <a class="text-lg flex items-center gap-2 text-white bg-purple-600
 cursor-pointer rounded-md p-3 transition-all hover:bg-white hover:border-b-4 border-box
  hover:border-purple-700 hover:text-purple-700 justify-center" href="{{route('companies.create')}}">
                    <i class="bx bx-plus text-2xl"></i>Adicionar Empresa</a>
        
            @if($totalCompanies > 0)
        <p class="text-purple-800 text-xl">Empresas Totais: {{$totalCompanies}}</p>
        </div>
        <div class="overflow-auto rounded-md shadow-md sm:mx-2">
                <table class="w-full">
                    <thead class="bg-purple-600 font-bold text-white sticky">
                    
                <tr>
                    <th class="p-3 font-bold text-left">ID</th>
                                    <th class="p-3 font-bold text-left">Nome </th>
                                    <th class="p-3 font-bold text-left">CEO</th>
                                    <th class="p-3 font-bold text-left">Data de Fundação</th>
                                    <th class="p-3 font-bold text-left">Descrição</th>
                                    
                                    <th class="p-3 font-bold text-left">Editar</th>
                                    <th class="p-3 font-bold text-left">Deletar</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-purple-500">
                @foreach ($companies as $company)
                <tr class="divide-x divide-purple-500 bg-purple-300 text-purple-800">
                                        <td class="p-3 font-bold">{{ $company->id }}</td>
                                        <td class="p-3 font-bold truncate">{{$company->name}}</td>
                                        <td class="p-3 font-bold truncate">{{$company->ceo}}</td>
                                        <td class="p-3 font-bold">{{$company->foundation_date}}</td>
                    <td class="p-1 font-bold truncate max-w-32">{{$company->description}}</td>
                                        <td class="font-bold  justify-center items-center">
                        <a class="cursor-pointer rounded-md hover:scale-110 transition-all
                         hover:bg-purple-700 bg-purple-600 ml-4 my-1 px-2 p-1 text-white bx bx-edit-alt
                          text-xl" href="/companies/edit/{{$company->id}}">
                        </a>
</td>


                        <td class="font-bold justify-center m-2 items-center">
                            <form method="POST" action="/companies/destroy/{{$company->id}}">
                    @csrf
                    @method('DELETE')
    <button class="bx bx-trash cursor-pointer px-2 ml-4 py-1 text-xl transition-all hover:scale-110
         hover:bg-pink-800 rounded-md bg-pink-700 text-white"
        type="submit"></button>
    </form>
                
            </td>
                </tr>
            @endforeach
            </tbody>
            </table>
            </div>
        @else
            <p class="text-purple-800 text-xl">Nenhuma Empresa encontrado</p>
        
        @endif
    @endsection