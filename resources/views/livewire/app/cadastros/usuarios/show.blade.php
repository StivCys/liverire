<?php
    // echo"<pre>";
    // print_r($_SESSION);
    // echo"</pre>";
?>

<!-- component -->
@if($errors)
    {{-- {{ dd($errors)}} --}}
@endif
<div class="container  mx-0">
    <h1 class="text-2xl font-bold mb-6 text-center">Usuario: {{$dados['usuario_nome']}}</h1>
    <form method='post' action='{{ route('usuarios.update',['usuario'=>$dados['id']])}}' class="w-full max-w-sm mx-0 bg-white p-8 rounded-md shadow-md" >
        @csrf
        @method('PUT')
        <input type='hidden' name='id' value={{$dados['id']}}>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nome</label>
            <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
            type="text" id="name" name="usuario_nome" value="{{ old('usuario_nome') ?? $dados['usuario_nome'] }}">
            @error('usuario_nome')
                     <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <div>
                            <span class="font-medium">Atenção!</span> {{ $message}}
                        </div>
                    </div> 
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Login</label>
            <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
            type="text" id="login" name="usuario_email" value="{{$dados['usuario_email'] ?? old('usuario_email') }} ">
            @error('usuario_email')
                     <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <div>
                            <span class="font-medium">Atenção!</span> {{ $message}}
                        </div>
                    </div> 
                @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Senha</label>
            <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                type="password" id="password" name="usuario_senha"  value="">
                @error('usuario_senha')
                     <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <div>
                            <span class="font-medium">Atenção!</span> {{ $message}}
                        </div>
                    </div> 
                @enderror
        </div>
        {{-- <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="confirm-password">Confirme a Senha</label>
            <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
            type="password" id="confirm-password" name="confirmar_senha" value="">
        </div> --}}
        <button
            class="w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300"
            type="submit">Salvar
        </button>
    </form>
</div>

