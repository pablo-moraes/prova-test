@extends('app')

@section('bee-header')
    <div class="flex justify-items-end home-header grid grid-cols-2 py-6 px-20">
        <div class="home-header__left-content">
            <h1 class="lg:text-5xl md:text-3xl sm:text-3xl text-pink-600 font-bold home-header__title">Calendário de flores</h1>
            <p class="mt-20">Neste calendário encontram-se diversas flores. Podem ser agrupadas pelos meses que florescem e o pelo tipo de abelha que poliniza a flor.</p>
        </div>
        <div class="home-header__right-content flex flex-col">
            <a href="{{ route('flower') }}" class="home-header__button p-2 border rounded font-bold text-center">Cadastrar flor</a>
            <a href="{{ route('bee') }}" class="home-header__button p-2 border rounded mt-4 font-bold text-center">Cadastrar abelha</a>
        </div>
    </div>
@endsection

@section('bee-content')
    <div class="container home-content pt-5 h-screen">
        <form action="" class="">
            <div class="home-content__select flex justify-center mx-auto">
                <div class="flex flex-col items-center">
                    <label for="bee">Selecione as abelhas</label>
                    <select name="states[]" multiple="multiple" id="bee" class="min-w-full h-16">
                        @foreach($species as $specie)
                            <option value="{{ $specie->name }}"> {{ $specie->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="home-content__checkbox xl:mx-20 lg:mx-18 md:mx-12 sm:mx-5 mx-4 mt-5 flex flex-col justify-start">
                <p>Escolha os meses</p>
                <ul class="flex flex-row flex-wrap gap-5 justify-start checkbox-months mt-2"></ul>
            </div>
        </form>
    </div>
@endsection
