<x-baseHome>

    <body class="bg-gray-900 min-h-screen">
        <main class="container mx-auto mt-4 px-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <!-- Notícias Dinâmicas -->
                @foreach($Noticias as $Noticia)
                @if($loop->first)
                <!-- Notícia Principal -->
                <div class="md:col-span-2">
                    <img alt="Notícia (sem imagem aparentemente)" class="w-full" height="400" src="{{ asset($Noticia->capa) }}" width="600" />
                    <h1 class="text-2xl font-bold mt-2 text-white">
                        {{ $Noticia->Titulo }}
                    </h1>
                    <p class="text-gray-300">
                        {{ $Noticia->resumo }}
                    </p>
                    <a href="{{ route('ExibeNoticia', $Noticia->id) }}" class="text-blue-700 hover:text-blue-600">Leia mais</a>
                </div>
                @else
                <!-- Artigos Secundários -->
                <div class="space-y-4">
                    <div>
                        <img alt="Notícia (sem imagem aparentemente)" class="w-full" height="200" src="{{ asset($Noticia->capa) }}" width="300" />
                    </div>
                    <div class="py-2">
                        <h2 class="text-2xl font-bold text-white">
                            {{ $Noticia->Titulo }}
                        </h2>
                        <p class="text-sm text-gray-300">
                            {{ $Noticia->resumo }}s
                        </p>
                        <a href="{{ route('ExibeNoticia', $Noticia->id) }}" class="text-blue-700 hover:text-blue-600 flex">Leia mais
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 ml-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            {{ $Noticias->links() }}

            <!-- Bottom contents -->
            <div class="h-6"></div>
        </main>
        
    </body>
</x-baseHome>