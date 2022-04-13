@extends('layouts.user')

@section('title')
    Home
@endsection

@section('content')
    <x-organisms.carousel></x-organisms.carousel>

    <x-organisms.banner></x-organisms.banner>

    <x-organisms.about></x-organisms.about>

    <x-organisms.service></x-organisms.service>

    <x-organisms.portofolio></x-organisms.portofolio>

    <x-organisms.contact></x-organisms.contact>
@endsection
