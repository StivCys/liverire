{{-- {{dd($dados)}} --}}
@if(isset($dados['id']))
    <form class=" " method='post' action='{{ route('produtos.update',$dados['id']) }}' >
        @method('PUT')
@else
    <form class=" " method='post' action={{route('produtos.store') }} >
@endif
    @csrf
    <input type="hidden" name='id' value='{{$dados['id'] ?? ''}}' >
    <div class='w-full pb-20'>
        <div class='md:w-5/12 float-left pr-5'>
            <div class='md:w-12/12 float-left'>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-12/12 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Titulo
                        </label>
                        <input name='nome' id="grid-first-name" type="text" placeholder="Titulo"
                                            value='{{ old('nome') ? old('nome') : $dados['nome'] ?? '' }}'
                                            class="appearance-none block w-full bg-yellow-50 text-gray-700 font-semibold
                                            border border-orange-400 rounded py-3 px-4 mb-3 leading-tight focus:outline-none
                                            focus:bg-green-100" >
                        <b class='text-red-500'>{{$errors->has('nome') ? $errors->first('nome').'!!!':'' }}</b>
                    </div>
                    <div class="w-full md:w-12/12 px-3 mb-6 md:mb-0">
                        <hr />
                    </div>
                    <div class="w-full md:w-12/12 px-3 pt-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Descrição
                        </label>
                        <textarea name="descricao" cols=100  rows="10"   id="grid-last-name" type="text" placeholder="Descrição do produto"
                                    class="appearance-none block 
                                    w-full bg-yellow-50 text-gray-700 font-semibold
                                    border border-orange-400 rounded py-3 px-4 leading-tight
                                    focus:outline-none focus:bg-green-100 focus:border-gray-500"
                                >{{ old('descricao') ? old('descricao') : $dados['descricao'] ?? '' }}</textarea>

                    </div>
                </div>
                {{-- <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-12/12 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-marca">
                        Marca
                        </label>
                        <div class="relative">
                            <?php
                                $arr['MARCA']['1']='COZINHA';        
                                $arr['MARCA']['2']='ZÉ DOS SALGADOS';        
                                $arr['MARCA']['3']='BHRAMA';        
                                $arr['MARCA']['4']='SKOL';        
                                $arr['MARCA']['5']='COCA COLA';        
                                $arr['MARCA']['6']='ANTARTICA';        
                                $arr['MARCA']['7']='KUAT';        
                            ?>    
                            <select name="marca" id="grid-marca" class="block appearance-none w-full
                                                                bg-yellow-50 border border-orange-400
                                                                text-gray-700 py-3 px-4 pr-8 rounded
                                                                leading-tight focus:outline-none focus:bg-green-100
                                                                focus:border-gray-500" >
                                <option value=''> Selecione </option>
                                @foreach ($arr['MARCA'] as $key=> $marca)
                                    <option value="{{$key}}" {{ old('motivo_contatos_id')==$key ? 'selected':'' }}>{{$marca}}</option>
                                @endforeach
                                
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                 
                            </div>
                        </div>
                    </div>
                </div> --}}
            
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-12/12 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 " for="grid-flag_tipo">
                        Tipo de Produto
                        </label>
                        <div class="relative">
                        <?php
                        $arr['tipo']['I']='Industrializado';        
                        $arr['tipo']['P']='Produto Pronto';        
                        $arr['tipo']['C']='Produto Cozinha';        
                        $arr['tipo']['W']='Produto por peso';        
                        ?>    
                        <select name="flag_tipo" id="grid-flag_tipo" 
                                class="block appearance-none w-full bg-yellow-50 border border-orange-400
                                        text-gray-700 py-3 px-4 pr-8 rounded leading-tight
                                        focus:outline-none focus:bg-green-100 focus:border-gray-500 font-semibold" >
                            <option value='' > Selecione </option>
                            @foreach ($arr['tipo'] as $key=> $tipo)
                                    <option value="{{$key}}" {{ old('flag_tipo') || (isset($dados['flag_tipo']) && $key==$dados['flag_tipo']) ? 'selected':'' }}>{{$tipo}}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                             
                        </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-peso">
                            Peso
                        </label>
                        <input name="peso" id="grid-peso" type="number" placeholder="0.00" step="0.01"
                                value='{{ old('peso') ? old('peso') : $dados['peso'] ?? '' }}'
                                 class="appearance-none block w-full border-orange-400
                                        text-gray-700 font-semibold border rounded bg-yellow-50
                                        py-3 px-4 leading-tight focus:outline-none
                                        focus:bg-green-100 focus:border-gray-500" >
                    </div>
                    {{-- <div class="w-full md:w-12/12 px-3 pb-20 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-unidade">
                            Unidade
                        </label>
                        <div class="relative">
                            <?php
                        $arr['UNIDADE']['1']='UNITARIO';        
                        $arr['UNIDADE']['2']='KILO';        
                        $arr['UNIDADE']['3']='GRAMA';        
                        $arr['UNIDADE']['4']='LITRO';        
                        $arr['UNIDADE']['5']='MILILITRO';        
                        ?> 
                        <select id="grid-unidade" name='unidade_id'
                                class="block appearance-none w-full bg-yellow-50 border  border-orange-400
                                        text-gray-700 py-3 px-4 pr-8 rounded 
                                        leading-tight focus:outline-none focus:bg-green-100 focus:border-gray-500" >
                            <option value='' > Selecione </option>
                            @foreach ($arr['UNIDADE'] as $key=> $unidade)
                                    <option value="{{$key}}" {{ old('motivo_contatos_id')==$key ? 'selected':'' }}>{{$unidade}}</option>
                            @endforeach
                            
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                             
                        </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class='md:w-5/12 float-left'>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-6/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-custo">
                        Custo
                    </label>
                    <input name="preco_custo" id="grid-custo" type="number" placeholder="0.00" step="0.01" 
                            value='{{ old('preco_custo') ? old('preco_custo') : $dados['preco_custo'] ?? '' }}'
                            class="appearance-none block w-full bg-yellow-50 text-gray-700 font-semibold
                                    border border-orange-400 rounded py-3 px-4 mb-3 leading-tight
                                    focus:outline-none focus:bg-green-100 text-right" >
                    
                </div>
                <div class="w-full md:w-6/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-preco">
                        Preço
                    </label>
                    <input name="preco_venda" id="grid-preco" type="number" placeholder="0.00" step="0.01"
                            value='{{ old('preco_venda') ? old('preco_venda') : $dados['preco_venda'] ?? '' }}'
                            class="appearance-none block w-full bg-yellow-50 text-gray-700 font-semibold border border-orange-400 rounded
                                    py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-green-100 text-right" >
                    
                </div>
                <div class="w-full md:w-12/12 px-3 mb-6 md:mb-0">
                    <hr />
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-6/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-estoque-Minimo">
                        Estoque Minimo
                    </label>
                    <input name="estoque_minimo" id="grid-estoque-Minimo" type="number" placeholder="0.00"
                            value='{{ old('estoque_minimo') ? old('estoque_minimo') : $dados['estoque_minimo'] ?? '' }}' 
                            class="appearance-none block w-full bg-yellow-50 text-gray-700 font-semibold border border-orange-400 rounded
                                    py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-green-100 text-right" >
                    
                </div>
                <div class="w-full md:w-6/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-estoque-Maximo">
                        Estoque Maximo
                    </label>
                    <input name="estoque_maximo" id="grid-estoque-Maximo" type="number" placeholder="0.00"
                            value='{{ old('estoque_maximo') ? old('estoque_maximo') : $dados['estoque_maximo'] ?? '' }}' 
                            class="appearance-none block w-full bg-yellow-50 text-gray-700 font-semibold border border-orange-400
                                    rounded py-3 px-4 mb-3 leading-tight 
                                    focus:outline-none focus:bg-green-100 text-right" >
                    
                </div>
                <div class="w-full md:w-12/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-estoque-disponivel">
                        Estoque Disponivel
                    </label>
                    <input name="estoque_disponivel" id="grid-estoque-disponivel" type="number" placeholder="0.00"
                            value='{{ old('estoque_disponivel') ? old('estoque_disponivel') : $dados['estoque_disponivel'] ?? '' }}'
                            class="appearance-none block w-full bg-yellow-50 text-gray-700 font-semibold border border-orange-400 rounded
                                    py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-green-100 text-right" >
                    
                </div>
                
                <div class="w-full md:w-12/12 px-3 mb-6 md:mb-0">
                    <hr />
                </div>
            </div>
            <div class="w-full float-left">
                <input type="submit"  value="Salvar" class='bg-blue-600 text-white p-3 w-28'>
            </div>
        </div>
    </div>
</form>