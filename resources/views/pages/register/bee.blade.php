@extends('layouts.register.app')

@section('title', 'Register Bee')

@section('bee-header')
    <h1 class="text-white absolute font-bold text-3xl lg:text-5xl sm:text-4xl top-1/3 right-1/2 translate-x-1/2">Cadastre abelhas</h1>
@endsection

@section('bee-content')
    <section>
        <p class="text-gray-800 text-left text-xl mb-5">Cadastre as abelhas</p>
        @include('pages.forms.create-bee')
    </section>
@endsection
