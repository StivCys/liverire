<!-- component -->
<div class="w-full bg-white shadow-xl rounded-lg flex overflow-x-auto custom-scrollbar">
    <div class="w-64 px-4">
        {{-- <div class="h-16 flex items-center">
            <a href="#" class="w-48 mx-auto bg-blue-600 hover:bg-blue-700 flex items-center justify-center text-gray-100 py-2 rounded space-x-2 transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                <span>Compose</span>
            </a>
        </div> --}}
        <div class="px-2 pt-4 pb-8 border-r border-gray-300">
            <ul class="space-y-2">
                @can('read user')
                    <li>
                        <x-nav-link href="{{ route('user.index') }}" :active="request()->routeIs('user.index')">
                            <span class='spam_menu flex items-center space-x-2  bg-gray-500 bg-opacity-30 hover:bg-gray-500 hover:bg-opacity-10 hover:text-blue-600 text-gray-700 py-1.5 px-4 rounded cursor-pointer'>
                                <i class="fa fa-user px-2"></i>
                                Usuarios
                            </span>
                        </x-nav-link>
                    </li>
                @endcan
                <li>
                    <x-nav-link href="{{ route('roles.index') }}" :active="request()->routeIs('roles.index')">
                        <span class="spam_menu flex items-center space-x-2  bg-gray-500 bg-opacity-30 hover:bg-gray-500 hover:bg-opacity-10 hover:text-blue-600 text-gray-700 justify-between py-1.5 px-4 rounded cursor-pointer">
                            <i class="fa-solid fa-eye-low-vision"></i>
                            <span>Perfil de Acesso</span>
                        </span>
                        {{-- <span class="bg-sky-500 text-gray-100 font-bold px-2 py-0.5 text-xs rounded-lg">3</span> --}}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link href="{{ route('produtos.index') }}" :active="request()->routeIs('produtos.index')">
                        <span class='spam_menu flex items-center space-x-2  bg-gray-500 bg-opacity-30 hover:bg-gray-500 hover:bg-opacity-10 hover:text-blue-600 text-gray-700 py-1.5 px-4 rounded cursor-pointer'>
                            <i class="fa fa-fish px-2"></i>
                            Produtos
                        </span>
                    </x-nav-link>
                </li>
                
            </ul>
        </div>
    </div>
    <div class="flex-1 px-2" x-data="{ checkAll: false, filterMessages: false }">
        
        @if($componente=='livewire.app.cadastros.usuarios.lista')
            @livewire('app.cadastros.components.menu-opcoes',['dados'=>$dados])
            @livewire('app.cadastros.usuarios.lista',['dados'=>$dados])
            
        @elseif($componente=='livewire.app.cadastros.produtos.lista')
            @livewire('app.cadastros.components.menu-opcoes',['dados'=>$dados])
            @livewire('app.cadastros.produtos.lista',['dados'=>$dados])

        @elseif($componente=='livewire.app.cadastros.usuarios.show')
            {{-- @livewire('app.cadastros.components.menu-opcoes',['dados'=>$dados]) --}}
            @livewire('app.cadastros.usuarios.show',['dados'=>$dados])

        @elseif($componente=='livewire.app.cadastros.permissoes.lista')
            @livewire('app.cadastros.components.menu-opcoes',['dados'=>$dados])
            @livewire('app.cadastros.permissoes.lista',['dados'=>$dados])
        
            @elseif($componente=='livewire.app.cadastros.permissoes.show')
            {{-- @livewire('app.cadastros.components.menu-opcoes',['dados'=>$dados]) --}}
            @livewire('app.cadastros.permissoes.show',['dados'=>$dados])

        @else
            <h3>Escolha uma opção no menu esquerdo {{$componente}}</h3>    
        @endif
    </div>
</div>