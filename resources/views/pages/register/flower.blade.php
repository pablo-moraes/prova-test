@extends('layouts.register.app')

@section('title', 'Register Flower')

@section('bee-header')
    <h1 class="text-white absolute font-bold text-3xl lg:text-5xl sm:text-4xl top-1/3 right-1/2 translate-x-1/2">Cadastre flores</h1>
@endsection

@section('bee-content')
    <section>
        <p class="text-gray-800 text-center text-md">Cadastre as flores de acordo com o mês em que ela floresce</p>
        @include('pages.forms.create-flower')
    </section>
@endsection

