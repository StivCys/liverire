<?php
    // echo"<pre>";
    // print_r($_SESSION);
    // echo"</pre>";
?>

<!-- component -->
@if($errors)
    {{-- {{ dd($errors)}} --}}
@endif
<div class="container w-full h-full bg-white pb-100 pt-5 rounded-md shadow-2xl">
    <h1 class="text-2xl font-bold mb-6 text-center">Usuario: {{$dados['nome']}}</h1>
    <form method='post' action='{{ route('user.update',['user'=>$dados['id']])}}' class="" >
        @csrf
        @method('PUT')
        <input type='hidden' name='id' value={{$dados['id']}}>
        <div class="mb-4 w-80 float-left p-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nome</label>
            <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
            type="text" id="name" name="name" value="{{ old('name') ?? $dados['nome'] }}">
            @error('name')
                     <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <div>
                            <span class="font-medium">Atenção!</span> {{ $message}}
                        </div>
                    </div> 
            @enderror
        </div>
        <div class="mb-4 w-80 float-left p-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Login</label>
            <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
            type="text" id="login" name="email" value="{{$dados['email'] ?? old('email') }} ">
            @error('email')
                     <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <div>
                            <span class="font-medium">Atenção!</span> {{ $message}}
                        </div>
                    </div> 
                @enderror
        </div>
        <div class="mb-4 w-80 float-left p-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Senha</label>
            <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                type="password" id="password" name="password"  value="">
                @error('password')
                     <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <div>
                            <span class="font-medium">Atenção!</span> {{ $message}}
                        </div>
                    </div> 
                @enderror
        </div>
        
            <!-- component -->
        <!-- This is an example component -->
        <div class="mb-4 w-80 float-left p-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Permissões</label>

            <style>
                .x-cloak {
                    display: none;
                }
            </style>
            <select class='x-cloak ' id="my_select" multiple >
                @foreach($dados['permissoes_existentes'] as $key=>$val)
                    <?php
                    $selected='';
                    if(in_array($val['id'],$dados['permissoes_do_usuario'])){
                        $selected=" selected ";
                    }
                    ?>
                    <option id='option_{{ $val['id'] }}' value={{ $val['id'] }} {{ $selected }}  >{{$val['name']}}</option>
                @endforeach
            </select>

        <div x-data="dropdown()" x-init="loadOptions()" class="w-full md:w-1/2 flex flex-col items-center h-64 mx-auto pl-16">
        
            <input name='role_id[]' type="hidden" x-bind:value="selectedValues()">
            <div class="inline-block relative w-96 px-0 py-0  rounded-md focus:outline-none focus:border-indigo-500">
                <div class="flex flex-col items-center relative">
                    <div x-on:click="open" class="w-full  ">
                        <div class="p-1 flex border border-gray-200 bg-white rounded svelte-1l8159u">
                            <div class="flex flex-auto flex-wrap">
                                <template x-for="(option,index) in selected" :key="options[option].value">
                                    <div
                                        class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-full text-teal-700 bg-teal-100 border border-teal-300 ">
                                        <div class="text-xs font-normal leading-none max-w-full flex-initial x-model="options[option]" x-text="options[option].text"></div>
                                        <div class="flex flex-auto flex-row-reverse">
                                            <div x-on:click="remove(index,option)">
                                                <svg class="fill-current h-6 w-6 " role="button" viewBox="0 0 20 20">
                                                    <path d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0
                                                c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183
                                                l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15
                                                C14.817,13.62,14.817,14.38,14.348,14.849z" />
                                                </svg>

                                            </div>
                                        </div>
                                    </div>
                                </template>
                                {{-- input div --}}
                                <div x-show="selected.length    == 0" class="flex-1">
                                    <input id='aaa' placeholder="Selecione as opções"
                                        class="bg-transparent p-1 px-2 appearance-none outline-none h-full w-full text-gray-800"
                                        x-bind:value="selectedValues()"
                                    >
                                </div>
                            </div>
                            <div
                                class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200 svelte-1l8159u">

                                <button type="button" x-show="isOpen() === true" x-on:click="open"
                                    class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                    <svg version="1.1" class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                        <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83
                                            c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25
                                            L17.418,6.109z" />
                                    </svg>

                                </button>
                                <button type="button" x-show="isOpen() === false" @click="close"
                                    class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                    <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                        <path d="M2.582,13.891c-0.272,0.268-0.709,0.268-0.979,0s-0.271-0.701,0-0.969l7.908-7.83
                                            c0.27-0.268,0.707-0.268,0.979,0l7.908,7.83c0.27,0.268,0.27,0.701,0,0.969c-0.271,0.268-0.709,0.268-0.978,0L10,6.75L2.582,13.891z
                                            " />
                                    </svg>

                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-4">
                        <div x-show.transition.origin.top="isOpen()"
                            class="absolute shadow top-100 bg-white z-40 w-full lef-0 rounded max-h-select overflow-y-auto svelte-5uyqqj"
                            x-on:click.away="close">
                            <div class="flex flex-col w-full">
                                <template x-for="(option,index) in options" :key="index">
                                    <div>
                                        <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100"
                                            @click="select(index,$event)">
                                            <div x-bind:class="option.selected ? 'border-teal-600' : ''"
                                                class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative">
                                                <div class="w-full items-center flex">
                                                    <div class="mx-2 leading-6" x-model="option" x-text="option.text"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function dropdown() {
                    return {
                        options: [],
                        selected: [],
                        show: false,
                        // populate(){ this.selected},
                        open() { this.show = true },
                        close() { this.show = false },
                        isOpen() { return this.show === true },
                        select(index, event) {
                            
                            if (!this.options[index].selected) {
    
                                this.options[index].selected = true;
                                this.options[index].element = event.target;
                                this.selected.push(index);
    
                            } else {
                                this.selected.splice(this.selected.lastIndexOf(index), 1);
                                this.options[index].selected = false
                            }
                        },
                        remove(index, option) {
                            this.options[option].selected = false;
                            this.selected.splice(index, 1);
    
    
                        },
                        loadOptions() {
                            const collection = document.getElementById('my_select');
                            const options=collection.options;
                            const optionsSel=collection.selectedOptions;
                            // alert(options) ;
                            
                            for (let i = 0; i < options.length; i++) {
                                this.options.push({
                                    value: options[i].value,
                                    text: options[i].innerText,
                                    selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false,
                                });
                                
                                
                                // this.selected.push(this.options[i].value);   
                                // alert(options[i].selectedOptions);
                                

                                // if(options[i].selectedOptions){
                                //     this.selected.push(i);    
                                // }
                                
                            }

                            for (let i = 0; i < optionsSel.length; i++) {
                                this.selected.push(i);    
                                
                            }
                            
                        },

                        selectedValues(){
                            return this.selected.map((option)=>{
                                return this.options[option].value;
                            })
                        }
                    }
                }
            </script>
        </div>
        
        <button
            class="w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300"
            type="submit">Salvar
        </button>
    </form>
</div>

