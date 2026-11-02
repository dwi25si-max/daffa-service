@extends('layouts.guest.app')

@section('title', 'Daffa Service - Pusat Servis & Perawatan Mobil Terpercaya')

@section('content')
    <!-- Partial Section: Carousel Hero Slider -->
    @include('guest.sections.carousel')

    <!-- Partial Section: About Us -->
    @include('guest.sections.about')

    <!-- Partial Section: Layanan (Data dimuat dinamis dari database via ELOQUENT ORM) -->
    @include('guest.sections.service')

    <!-- Partial Section: Teknisi (Data dimuat dinamis dari database via QUERY BUILDER JOIN) -->
    @include('guest.sections.technicians')

    <!-- Partial Section: Kontak & Peta Lokasi -->
    @include('guest.sections.contact')
@endsection
