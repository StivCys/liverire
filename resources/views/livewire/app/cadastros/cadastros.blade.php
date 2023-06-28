@section('title')
    {{ $dados['title'] ?? ''}}
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastros') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('app.cadastros.components.menu',['componente'=>$componente,'dados'=>$dados])
                
            </div>
        </div>
    </div>
</x-app-layout>
