<form method="post" action="{{ route('register.bee') }}">
    @csrf
    <div class="flex flex-col mb-4">
        <label for="name" class="font-bold">Nome</label>
        <input type="text" id="name" name="name" class="placeholder-gray-400 @error('name') border-red-400 @enderror" placeholder="Qual o nome da abelha">
        @error('name')
            <small class="text-red-400">{{ $message }}</small>
        @enderror
    </div>
    <div class="flex flex-col mt-4">
        <label for="specie" class="font-bold">Espécie</label>
        <input type="text" id="specie" name="scientific_name" class="placeholder-gray-400 @error('scientific_name') border-red-400 @enderror"
               placeholder="Qual a espécie ou nome científico">
        @error('scientific_name')
            <small class="text-red-400">{{ $message }}</small>
        @enderror
    </div>
    <div class="flex justify-end gap-5 register-buttons mt-8">
        <a href="{{ route('home') }}"
           class="register-buttons__cancel p-2 border rounded font-bold text-center">Cancelar</a>
        <button type="submit"
                class="register-buttons__submit shadow-md p-2 border rounded font-bold text-center hover:opacity-95">
            Cadastrar Abelha
        </button>
    </div>
</form>


