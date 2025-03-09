<!-- resources/views/pages/home.blade.php -->
@extends('layouts.main')

@section('content')
    <x-sections.hero />
    
    @auth
        <x-music-player.player :tracks="$tracks" />
    @endauth
    
    <x-sections.bio />
    <x-sections.contact />
@endsection