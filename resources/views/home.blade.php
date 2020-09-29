@extends('layouts.app')

@section('title')
    Home
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hero.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search-filter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
@endsection

@section('main')
    <div class="wrapper">
        @include('layouts.navigation')
        @include('layouts.hero')
        @include('layouts.search-filter')
        @include('layouts.tables', ['articles'=>$articles])
        @include('layouts.footer')
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
    <script src="{{ asset('js/navigation.js') }}"></script>
    <script src="{{ asset('js/hero.js') }}"></script>
    <script src="{{ asset('js/search-filter.js') }}"></script>
    <script src="{{ asset('js/tables.js') }}"></script>
    <script src="{{ asset('js/footer.js') }}"></script>
@endsection
