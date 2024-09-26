<x-baseHome>
    <!-- Main Content -->
    <main class="container mx-auto mt-4 px-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        
    <!-- Main Article -->
        <div class="md:col-span-2">
        <img alt="Noticia" class="w-full" height="400" src="{{asset('imagens/EldenRing.webp')}}" width="600"/>
        <h1 class="text-2xl font-bold mt-2">
            Conteudo
        </h1>
        </div>

        <!-- Side Articles -->
        <div class="space-y-4">
        <div>
        <img alt="Noticia" class="w-full" height="200" src="" width="300"/>
        </div>
        <div class="bg-black text-white p-4">
        <img alt="Noticia" class="w-full" height="200" src="" width="300"/>
        <h2 class="text-lg font-bold mt-2"> Conteudo  </h2>
        </div>
        </div>
    </div>
    </main>
</x-baseHome>