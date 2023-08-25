@extends('frontend.index')

@section('title')
    Giới thiệu
@endsection

@section('header-pages')
    <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4">Về chúng tôi</h1> 
                        <nav aria-label="breadcrumb animated fadeIn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item text-body active" aria-current="page">Giới thiệu</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <img class="img-fluid" src="img/header.jpg" alt="">
                </div>
            </div>
        </div>
    <!-- Header End -->
@endsection

@section('search')
    
@endsection

@section('content')
    <!-- Category Start -->
        {{-- @include('frontend.widgets.about') --}}
    <!-- Category End -->
    <!-- Category Start -->
        @include('frontend.widgets.contact')
    <!-- Category End -->
    <!-- Category Start -->
        @include('frontend.widgets.team')
    <!-- Category End -->
@endsection