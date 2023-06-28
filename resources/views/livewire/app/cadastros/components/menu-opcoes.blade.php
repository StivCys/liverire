<div class="h-16 flex items-center justify-between">
    <div class="flex items-center">
        <div class="relative flex items-center px-0.5 space-x-0.5">
            
        </div>
        <div class="flex items-center">
            <div class="flex items-center ml-3">
                <button title="Reload" class="text-gray-700 px-2 py-1 border border-gray-300 rounded-lg shadow hover:bg-gray-200 transition duration-100">
                    <i class='fa fa-refresh'></i>
                </button>
            </div>
            <span class="bg-gray-300 h-6 w-[.5px] mx-3"></span>

            @if(isset($dados['route']))
                <div class="flex items-center ml-3">
                    <a href={{route($dados['route'])}}>
                        <button title="Novo" class="text-gray-700 px-2 py-1 border bg-lime-400 border-gray-300 rounded-lg shadow hover:bg-lime-500 transition duration-100">
                                <i class="fa fa-plus"></i>&nbsp;Novo
                        </button>
                    </a>
                </div>
                <span class="bg-gray-300 h-6 w-[.5px] mx-3"></span>
            @endif
            
        </div>
    </div>
    @if(isset($dados['from']))
    <div class="px-2 flex items-center space-x-4">
        <span class="text-sm text-gray-500">Mostrando {{ $dados['from'] + (count($dados['data'])-1) }} de {{ $dados['total']}} resultados, pagina {{$dados['current_page']}} de {{ $dados['last_page']}} paginas</span>
        <div class="flex items-center space-x-5">
            <a href={{ $dados['first_page_url']!='' ? $dados['first_page_url'] :'' }}>
                <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 p-1.5 rounded-lg transition duration-150" title="Newer">
                    <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                </button>
            </a>
            <a href={{ $dados['prev_page_url']!='' ? $dados['prev_page_url'] :'' }}>
                <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 p-1.5 rounded-lg transition duration-150" title="Newer">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                </button>
            </a>

            <a href={{$dados['next_page_url']}}>
                <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 p-1.5 rounded-lg transition duration-150" title="Older">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </button>
            </a>
            <a href={{ $dados['last_page_url']!='' ? $dados['last_page_url'] :'' }}>
                <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 p-1.5 rounded-lg transition duration-150" title="Newer">
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                </button>
            </a>
        </div>
    </div>
    @endif
</div>
