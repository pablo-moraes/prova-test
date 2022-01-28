@extends('app')

@section('bee-header')
    <div class="flex justify-items-end home-header grid items-baseline xl:grid-cols-2 lg:grid-cols-2 sm:grid-cols-2 grid-cols-2 py-6 pl-8 sm:pl-12 lg:px-20 px-0">
        <div class="home-header__left-content">
            <h1 class="lg:text-5xl md:text-4xl sm:text-3xl text-3xl text-pink-600 font-bold w-max home-header__title">Calendário de
                flores</h1>
            <p class="mt-20">Neste calendário encontram-se diversas flores. Podem ser agrupadas pelos meses que
                florescem e o pelo tipo de abelha que poliniza a flor.</p>
        </div>

        <div class="home-header__right-content flex flex-col">
            <nav class="flex justify-end relative">
                <div class="p-4 home-header__burger-menu-container cursor-pointer relative">
                    <button class="home-header__burger-menu self-center relative"></button>
                </div>
                <ul class="home-header__menu-mobile bg-pink-600 absolute top-1/2 cursor-pointer">
                    <div class="relative">
                        <li class="w-full font-bold">
                            <a href="{{ route('flower') }}" class="">Cadastrar
                                flor</a>
                        </li>
                        <hr class="bg-gray-800 opacity-50 w-2/4 block mx-auto">
                        <li class="w-full font-bold"><a href="{{ route('bee') }}" class="">Cadastrar
                                abelha</a></li>
                    </div>
                </ul>
            </nav>

            <a href="{{ route('flower') }}" class="home-header__button p-2 border rounded hdden font-bold text-center">Cadastrar flor</a>
            <a href="{{ route('bee') }}" class="home-header__button p-2 border rounded hdden mt-4 font-bold text-center">Cadastrar
                abelha</a>
        </div>
    </div>
@endsection

@section('bee-content')
    <div class="container home-content pt-5 h-screen relative">
        <form id="filter-flowers" action="" class="">
            <div class="home-content__select flex justify-center mx-auto">
                <div class="flex flex-col items-center">
                    <label for="bee">Selecione as abelhas</label>
                    <select name="bees[]" multiple="multiple" id="bee" class="min-w-full h-16">
                        @foreach($species as $specie)
                            <option value="{{ $specie->name }}"> {{ $specie->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div
                class="home-content__checkbox xl:mx-20 lg:mx-18 md:mx-12 sm:mx-5 mx-4 mt-5 flex flex-col lg:justify-start justify-center">
                <p>Escolha os meses</p>
                <ul class="flex flex-row flex-wrap gap-5 justify-start checkbox-months mt-2"></ul>
            </div>
        </form>

        <article>
            <ul id="flowers-list" class="flower-list mt-24 flex flex-row flex-wrap lg:gap-12 sm:gap-5 md:gap-5 gap-5 lg:px-20 md:px-36 sm:px-3 px-12">

            </ul>
        </article>
        <div class="absolute bottom-11 left-2/4 mx-auto w-full">
            <ul class="flex flex-row flex-wrap gap-5 justify-center mt-2 home-header-pagination">
                <li class="bg-pink-400 p-2 previous">Previous</li>
                <li class="bg-pink-400 p-2"><a href=""></a>1</li>
                <li class="bg-pink-400 p-2">2</li>
                <li class="bg-pink-400 p-2">3</li>
                <li class="bg-pink-400 p-2">4</li>
                <li class="bg-pink-400 p-2">5</li>
                <li class="bg-pink-400 p-2">6</li>
                <li class="bg-pink-400 p-2 next">Next</li>
            </ul>
        </div>

    </div>
@endsection
