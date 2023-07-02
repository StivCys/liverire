<?php
    // echo"<pre>";
    // print_r($dados);
    // echo"</pre>";
    // exit();
?>

<!-- component -->
@if($errors)
    {{-- {{ dd($errors)}} --}}
@endif
<div class="container  mx-12">
    <h1 class="text-2xl font-bold mb-6 text-center">Perfil: {{$dados['role'][0]['name']}}</h1>
    <form method='post' action='{{ route('roles.update',['role'=>$dados['role'][0]['id']])}}' 
        class="" >
        @csrf
        @method('PUT')
        <input type='hidden' name='id' value={{$dados['role'][0]['id']}}>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nome</label>
                <input class="w-full px-3 mb-5 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                type="text" id="name" name="name" value="{{ old('name') ?? $dados['role'][0]['name'] }}">
                @error('name')
                        <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <div>
                                <span class="font-medium">Atenção!</span> {{ $message}}
                            </div>
                        </div> 
                @enderror
            <br>
            @foreach($dados['permissions'] as $key =>$val)
                @foreach($val as $k =>$v)
                <div class='w-80 float-left pb-20'>
                    <div class="float-left pr-10">
                        <?php
                            $permissoes=explode(',',$dados['role'][0]['permissoes']);    
                            $checked='';
                            if( in_array($v['id'],$permissoes)){
                                $checked=' checked ';
                            }
                        ?>
                            
                        
                        <input id={{$v['id']}} type="checkbox" name='role_has_permissions[permission_id_assigned|{{$v['id']}}]' class="" {{$checked}} >
                    </div>
                    <div class="float-left pr-50">
                        <label for={{$v['id']}} class="block text-gray-700 text-sm font-bold mb-2" for="name">{{Str::upper($v['permissao'])}}</label>
                    </div>
                    
                </div>
                @endforeach
            @endforeach
        </div>
        
        <button
            class="w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300"
            type="submit">Salvar
        </button>
    </form>
</div>

