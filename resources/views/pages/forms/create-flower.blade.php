<form method="post" action="{{ route('register.flower') }}">
    <div class="grid-grid-cols-2">
        <div class="flex flex-col mb-4">
            <label for="name" class="font-bold">Nome</label>
            <input type="text" id="name" name="name" placeholder="Qual o nome da flor">
        </div>
        <div class="flex flex-col mb-4">
            <label for="specie" class="font-bold">Espécie</label>
            <input type="text" id="specie" name="specie" placeholder="Qual a espécie ou nome científico">
        </div>
        <div class="flex flex-col">
            <label for="description" class="font-bold">Descrição</label>
            <input type="text" id="description" name="description"
                   placeholder="Escreva uma breve descrição sobre a flor">
        </div>
        <div class="xl:mx-auto lg:mx-18 md:mx-12 sm:mx-auto mx-4 mt-5 flex flex-col justify-center mb-4">
            <p class="font-bold">Em quais meses a flor irá florescer</p>
            <ul class="flex flex-row flex-wrap gap-5 justify-start checkbox-months mt-2"></ul>
        </div>
        <div class="flex justify-start mx-auto register-select mb-14">
            <div class="flex flex-col items-center">
                <label for="bee" class="self-start font-bold ">Selecione as abelhas que polinizam essas flores</label>
                <select name="states[]" multiple="multiple" id="bee" class="min-w-full h-16">
                    @foreach($species as $specie)
                        <option value="{{ $specie->name }}"> {{ $specie->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="flex justify-end gap-5 register-buttons">
            <a href="{{ route('home') }}" class="register-buttons__cancel p-2 border rounded font-bold text-center">Cancelar</a>
            <button type="submit" class="register-buttons__submit p-2 border rounded font-bold text-center">Cadastrar Flor</button>
        </div>
    </div>
</form>
