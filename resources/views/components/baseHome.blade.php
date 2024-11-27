<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <title>{{$title ?? "GTI News - Tudo sobre o GTI vc encontra aqui"}}</title>
</head>

<body>
  <!-- Header -->
  <header class="bg-black text-white">
    <div class="container mx-auto flex justify-between items-center py-2 px-4">
      <div class="flex items-center">
        
        <!-- botão triplo -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>

        <!-- Logo -->
        <div class="mx-6">
          <a href="{{route('Home')}}">
            <img src="" alt="LOGO (Não tem uma)">
          </a>
        </div>
      </div>

      <div class="flex items-center space-x-4">
        <div class="animate-pulse mx-2 justify-beetwen space-x-4 px-2">
          <a class="text-red-600 flex items-center" href="#">
            <div class="rounded-full bg-red-900 w-2 h-2 mr-2"></div>
            Ao vivo
          </a>
        </div>
        <a href="#">Política</a>
        <a href="#">Economia</a>
        <a href="#">Esportes</a>
        <a href="#">Pop</a>

        @auth
        @if(Auth::user()->cargo == 1 or Auth::user()->cargo == 2)
        <div class="relative" x-data="{ Gestão: false }" @click.away="menu = false">
          <a class="text-blue-700 cursor-pointer" x-on:click="Gestão = !Gestão">
            Gestão
          </a>

          <div x-show="Gestão" x-cloak id="userDropdowns1" class="absolute z-10 w-56 divide-y my-4 divide-gray-100 overflow-hidden overflow-y-auto bg-white antialiased shadow dark:divide-gray-600 dark:bg-black">
            <ul class="p-2 text-start text-sm font-medium text-gray-900 dark:text-white">
              <li><a href="{{route('gerenciaNoticias')}}" class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-blue-600">Gerenciar Noticias</a></li>
              <li><a href="#" class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-blue-600">Gerenciar Usuarios</a></li>
              <li><a href="#" class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-blue-600">Financeiro</a></li>
              <li><a href="#" class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-blue-600">Estatísticas</a></li>
            </ul>

            <div class="p-2 text-sm font-medium text-gray-900 dark:text-white">
              <a href="{{route('logout')}}" class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-red-600">Sair</a>
            </div>
          </div>
        </div>
        @endif
        @endauth
      </div>

      <!-- Botões laterais -->
      <div class="flex items-center space-x-4">
        @auth
        <div class="relative mx-4">
          <img class="w-10 h-10 rounded-full bg-white" src="{{ asset('imagens/User.png') }}" alt="">
          <span class="top-0 left-7 absolute w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span>
        </div>

        <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded"><a href="{{route('logout')}}">Sair</a></button>

        @else
        <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
          <a href="{{route('telaLogin')}}">Entrar</a>
        </button>
        <button class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">
          <a href="{{route('telaCadastro')}}">Cadastrar</a>
        </button>
        @endauth
      </div>
    </div>
  </header>

  <!-- Conteúdo da página -->
  {{$slot}}

</body>

</html>