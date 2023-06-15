<div class="h-16 flex items-center justify-between">
    <div class="flex items-center">
        <div class="relative flex items-center px-0.5 space-x-0.5">
            
        </div>
        <div class="flex items-center">
            <div class="flex items-center ml-3">
                <button title="Reload" class="text-gray-700 px-2 py-1 border border-gray-300 rounded-lg shadow hover:bg-gray-200 transition duration-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                </button>
            </div>
            <span class="bg-gray-300 h-6 w-[.5px] mx-3"></span>
            
        </div>
    </div>
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
</div>
