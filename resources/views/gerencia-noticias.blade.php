<x-baseHome>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles    
    @livewireScripts

    <section class="bg-white dark:bg-gray-900 min-h-screen">

    <h1 class="px-6 py-4 text-4xl text-center">  Gestão de Noticias  </h1>

    <!-- botão para criar noticias com livewire -->
    <div x-data="{ AddNoticia: false }" class="mx-4 flex justify-end">

        <button @click="AddNoticia = true" class="text-white bg-blue-700 hover:bg-blue-800 px-4 py-2 rounded-lg justify-end">
            NOVA NOTICIA
        </button>
        <div x-show="AddNoticia" x-cloak class="fixed top-14 left-0 z-40 h-screen p-4 overflow-y-auto bg-white w-96 hover:w-1/5 dark:bg-black" @click.away="AddNoticia = false">
            @livewire('cadastra-noticias')
        </div>
    </div>

        <!-- toda a tabela -->
        <div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="">
                        <th scope="col" class="p-4"></th>
                        <th scope="col" class="px-6 py-4 justify-center">Título</th>
                        <th scope="col" class="px-6 py-4 text-center">Data</th>
                        <th scope="col" class="px-6 py-4 text-center">Nome</th>
                        <th scope="col" class="px-6 py-4 text-center">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Noticias as $Noticia)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4"></td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$Noticia->Titulo}}
                            </th>
                            <td class="px-6 py-4 text-center">{{$Noticia->data}}</td>
                            <td class="px-6 py-4 text-center">{{$Noticia->user->name}}</td>

                            <!-- Menu para edição e visualização das noticias -->
                            <td class="px-6 py-4 flex justify-center">
                                <div class="relative" x-data="{ menu: false }" @click.away="menu = false">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white cursor-pointer" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" x-on:click="menu = !menu">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
                                    </svg>
                                        <div x-show="menu" id="userDropdowns1" class="absolute end-0 z-10 w-56 divide-y -my-6 mx-8 divide-gray-100 overflow-hidden overflow-y-auto bg-white antialiased shadow dark:divide-gray-600 dark:bg-gray-900 rounded-lg">
                                            <ul class="p-2 text-start text-sm font-medium text-gray-900 dark:text-white">
                                                <li><a href="{{route('ExibeNoticia',$Noticia)}}" title="" class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-blue-600"> Exibir Noticia </a></li>
                                                <li>
                                                    <div x-data="{ EditaNoticia: false }">
                                                        <button @click="EditaNoticia = true" title="" class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-blue-600">
                                                            Editar Noticia                                        
                                                        </button>
                                                        <div x-show="EditaNoticia" x-cloak class="fixed top-14 left-0 z-40 h-screen p-4 overflow-y-auto bg-white w-80 dark:bg-black" @click.away="EditaNoticia = false">
                                                                @livewire('edita-noticia', ['noticia' => $Noticia])
                                                        </div>
                                                    </div>
                                                </li>
                                                <li><a href="{{route('DeletaNoticia',$Noticia)}}" title="" class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-red-600"> Excluir </a></li>
                                            </ul>
                                        </div>  

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</x-base>