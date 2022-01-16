<form method="post" action="{{ route('register.flower') }}" enctype="multipart/form-data">
    @csrf
    <div class="">
        <div class="flex flex-row justify-start items-center gap-24">
            <div  class="w-3/4">
                <div class="flex flex-col mb-4">
                    <label for="name" class="font-bold">Nome</label>
                    <input type="text" id="name" name="name" class="placeholder-gray-400 @error('name') border-red-400 @enderror" placeholder="Qual o nome da flor">
                    @error('name')
                        <small class="text-red-400 mt-2">{{ $message }}</small>
                    @enderror
                </div>

                <div>
                    <div class="flex flex-col mb-4">
                        <label for="specie" class="font-bold">Espécie</label>
                        <input type="text" id="specie" name="specie" class="placeholder-gray-400 @error('specie') border-red-400 @enderror" placeholder="Qual a espécie ou nome científico">
                        @error('specie')
                            <small class="text-red-400 mt-2">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="w-auto">
                <div class="register-upload-image preview-upload">
                    <img src="{{ asset('images/upload-icon.svg') }}" class="opacity-50" alt="upload icon">
                    <input type="file" name="photo" id="image" accept="image/*" onchange="preview()" placeholder="Adicione uma imagem para fazer upload" title="Adicione uma imagem para a flor que está cadastrando">
                </div>
            </div>
        </div>

        <div class="flex flex-col">
            <label for="description" class="font-bold">Descrição</label>
            <input type="text" id="description" class="placeholder-gray-400" name="description"
                   placeholder="Escreva uma breve descrição sobre a flor">
        </div>
        <div class="mx-auto mt-5 flex flex-col justify-center mb-4">
            <p class="font-bold">Em quais meses a flor irá florescer</p>
            <ul class="flex flex-row flex-wrap gap-5 justify-start checkbox-months mt-2"></ul>
            @error('months')
                <small class="text-red-400 mt-2">{{ $message }}</small>
            @enderror
        </div>
        <div class="flex justify-start mx-auto register-select mb-14">
            <div class="flex flex-col items-center">
                <label for="bee" class="self-start font-bold ">Selecione as abelhas que polinizam essas flores</label>
                <select name="bees[]" multiple="multiple" id="bee" class="min-w-full h-16 @error('bees') border-red-400 @enderror">
                    @foreach($species as $specie)
                        <option value="{{ $specie->name }}"> {{ $specie->name }}</option>
                    @endforeach
                </select>
                @error('bees')
                    <small class="text-red-400 self-start">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="flex justify-end gap-5 register-buttons">
            <a href="{{ route('home') }}" class="register-buttons__cancel p-2 border rounded font-bold text-center">Cancelar</a>
            <button type="submit" class="register-buttons__submit shadow-md p-2 border rounded font-bold text-center">Cadastrar Flor</button>
        </div>
    </div>
</form>
