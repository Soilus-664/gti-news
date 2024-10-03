<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css', 'resources/js/app.js')
    <title>{{$title ?? "GTI News -
        Tudo sobre o GTI vc encontra aqui"}}</title>
</head>
<body>


<head>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> HomerSimpsons </title>
    <script src="https://cdn.tailwindcss.com">  </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>

 </head>

 <body class="bg-gray-100">
  <!-- Header -->
  <header class="bg-black text-white">
   <div class="container mx-auto flex justify-between items-center py-2 px-4">
    <div class="flex items-center">
    
    <!-- botão 3 barras para menu -->
    <button class="text-2xl">
      <i class="fas fa-bars"></i>
    </button>

    <!-- LOGO -->
    <div class="mx-6">
        <img src="" alt="LOGO">
    </div>

    <!-- botoes centrais -->
    </div>  
    <div class="flex items-center space-x-4">
      <div class="animate-pulse mx-2 justify-beetwen space-x-4 px-2 ">
        <a class="text-red-600 flex items-center" href="#">
          <div class="rounded-full bg-red-900 w-2 h-2 mr-2"></div> 
          Ao vivo
        </a>
      </div>
     <a href="#">
      Política
     </a>
     <a href="#">
      Economia
     </a>
     <a href="#">
      Esportes
     </a>
     <a href="#">
      Pop
     </a>
    @auth
    @if(Auth::user()->cargo == 1 or Auth::user()->cargo == 2)
    <div class="relative" x-data="{menu:false}">
    <a class="text-blue-700 cursor-pointer" x-on:click="menu = !menu">
      Gestão
    </a>
    
    <div x-show="menu" id="userDropdowns1" class="absolute z-10 w-56 divide-y my-4 divide-gray-100 overflow-hidden overflow-y-auto bg-white antialiased shadow dark:divide-gray-600 dark:bg-black">
          <ul class="p-2 text-start text-sm font-medium text-gray-900 dark:text-white">
            <li><a href="#" title="" class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-blue-600"> Gerenciar Noticias </a></li>
            <li><a href="#" title="" class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-blue-600"> Gerenciar Usuarios </a></li>
            <li><a href="#" title="" class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-blue-600"> Financeiro </a></li>
            <li><a href="#" title="" class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-blue-600"> Estatísticas </a></li>
          </ul>
      
          <div class="p-2 text-sm font-medium text-gray-900 dark:text-white">
            <a href="{{route('logout')}}" title="" class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-red-600"> Sair </a>
          </div>
        </div>
    </div>
    
    @endif
    @endauth
    </div>
    
    <!-- botoes laterais -->
    <div class="flex items-center space-x-4">
          @auth
          <div class="text-white">Tu ta logado brother</div>
          <button class="bg-red-600 text-white px-4 py-2 rounded"><a href="{{route('logout')}}">Sair</a></button>

          @else
        <button class="bg-red-600 text-white px-4 py-2 rounded">
            <a href="{{route('telaLogin')}}">Entrar</a>
          </button>
          <button class="bg-gray-600 text-white px-4 py-2 rounded">
            <a href="{{route('telaCadastro')}}">Cadastrar</a>
          </button>
          @endauth

        </div>

    </div>
  </header>

{{$slot}}
</body>
</html>