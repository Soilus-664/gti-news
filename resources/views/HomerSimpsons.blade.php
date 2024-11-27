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
                        <h2 class="text-lg font-bold text-white">
                            {{ $Noticia->Titulo }}
                        </h2>
                        <p class="text-sm text-gray-300">
                            {{ $Noticia->resumo }}
                        </p>
                        <a href="{{ route('ExibeNoticia', $Noticia->id) }}" class="text-blue-700 hover:text-blue-600">Leia mais</a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </main>
    </body>
</x-baseHome>