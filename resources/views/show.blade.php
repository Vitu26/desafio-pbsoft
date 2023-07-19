@extends('templates.template')

<!-- Card template contendo a informações exclusiva -->
@section('content')
    <div class="container" id="show">
        <div class="card col-md-6 text-center" id="info-card">
            <div class="card-header">
                <h2>{{ $products->name }}</h2>
            </div>
            <div class="card-body">
                <p class="card-text">
                    Identificador: {{ $products->id }}
                <p>Descrição: {{ $products->description }}</p>
                <p>Quantidade: {{ $products->quanty }}</p>
                <p> Preço: R${{ $products->value }} </p>
                </p>
                <!-- Possiveis tags -->
                <p class="tags">Tags: <a href="#" class="">{{ $products->category }}</a></p>
            </div>
        </div>
    </div>
@endsection
