<!-- component -->

<table class="min-w-full border-collapse block md:table">
    <thead class="block md:table-header-group">
        <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">id</th>
            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Descrição</th>
            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Ações</th>
        </tr>
    </thead>
    <tbody class="block md:table-row-group">
        @foreach ($dados['data'] as $key => $acesso)
        <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Name</span>{{$acesso['id']}}</td>
            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">User Name</span>{{$acesso['name']}}</td>
            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold"></span>
                <span class="inline-block w-1/3 md:hidden font-bold">Ações</span>
                    <a href={{ route("roles.show",$acesso['id']) }}><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Editar</button></a>
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Excluir</button>
            </td>
        </tr>
        @endforeach		
    </tbody>
</table>