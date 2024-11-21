<div>
    <h5 id="drawer-label" class="items-center text-center mb-6 text-base font-semibold text-gray-500 uppercase dark:text-gray-400"> Nova Notícia </h5>
     
        <form wire:submit.prevent="SalvaNoticia" class="mb-6">
            @csrf
            <!-- Capa -->
            <div class="mb-6">
                <label for="capa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Capa</label>
                <input type="text" id="capa" wire:model="capa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Digite o link [Url]" required />
            </div>

            <!-- Titulo -->
            <div class="mb-6">
                <label for="Titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo</label>
                <input type="text" id="Titulo" wire:model="titulo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Digite o Titulo" required />
            </div>

            <!-- Resumo -->
            <div class="mb-6">
                <label for="resumo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Resumo</label>
                <input type="text" id="resumo" wire:model="resumo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Digite o Resumo" required />
            </div>

            <!-- Conteudo -->
            <div class="mb-6">
                <label for="conteudo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Conteudo</label>
                <textarea id="conteudo" rows="4" wire:model="conteudo" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Conteudo..." required></textarea>
            </div>

            <button type="submit" class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Criar Notícia
            </button>
        </form>
    </div>
</div>
