@extends('layouts.app')

@section('title', 'Вхід')

@section('content')
    <div class="row vh-100">
        <div class="mx-auto my-auto col-sm-5">
            <div class="text-center mb-4">
                <img class="mb-1" src="./images/oa_logo.png" alt="Герб Національного університету 'Острозька академія'" width="150" height="150">
                <h1 class="mb-3">Довідки НаУОА</h1>
            </div>
            <a class="btn btn-lg btn-danger btn-block" href="{{ action('LoginController@redirectToProvider') }}">Вхід через пошту  &#64;oa.edu.ua</a>

            @if( $errors->any() )
                @foreach($errors->all() as $error)
                    <ul class="list-group mt-2">
                        <li class="list-group-item list-group-item-danger ">{{ $error }}</li>
                    </ul>
                @endforeach
            @endif
        </div>
    </div>
@endsection
