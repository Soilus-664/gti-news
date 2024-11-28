<x-baseHome>
<body class="bg-gray-900">

    <div x-data="{
        count: 0,
        names: ['Lucas', 'Maria', 'João', 'Ana', 'Carlos', 'Fernanda', 'Bruna'],
        randomName() {
            return this.names[Math.floor(Math.random() * this.names.length)];
        }
    }" class="max-w-sm mx-auto bg-white p-6 rounded-lg shadow-md">
        
        <h1 class="text-2xl font-semibold text-center mb-4"> 
            <span x-text="randomName()" class="font-bold text-blue-600"></span>
        </h1>
        
        <p class="text-center text-lg mb-6">Número de cliques: 
            <span x-text="count" class="font-bold text-blue-600"></span>
        </p>
        
        <div class="flex justify-center">
            <button 
                @click="count++; randomName()"
                class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200"
            >
                Clique aqui
            </button>
        </div>
    </div>

</body>
</x-baseHome>