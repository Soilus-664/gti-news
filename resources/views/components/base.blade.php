<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com">  </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    @vite('resources/css/app.css')

    <title>{{$title ?? "GTI News - Tudo sobre o GTI vc encontra aqui"}}</title>

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
        <a href="/"><img src="" alt="LOGO"></a>
      </div>

      </div>

    <!-- botoes laterais -->
        <div class="flex items-center space-x-4">
          @auth
          <div class="text-white">Tu ta logado brother</div>
          <button class="bg-red-600 text-white px-4 py-2 rounded"><a href="">Sair</a></button>

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

</html>