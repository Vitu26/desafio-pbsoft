@extends('templates.template');

<!-- Template de edição e exclusão -->
@section('content')
    <div class="container" id="form_cad-edit">

        <!-- Titulo -->
        <h1 class="text-center title-form">@if (isset($products))Editar Produto @else Cadastro @endif</h1>

        <!-- Tratamento de erros backend ( vinculado diretamente com a ProdutoResquest) -->
        @if (isset($errors) && count($errors) > 0)
            @foreach ($errors->all() as $erro)
                <p class="text-center alert-danger">{{ $erro }}</p>
            @endforeach
        @endif

        <!-- Escolha do metodo a ser enviado, definindo se é o template de edição ou cadastro-->
        @if (isset($products))
            <form name="edit" id="edit" method="POST" action="{{ url('stock/' . $products->id) }}">
                @method('PUT')
            @else
                <form name="cadastro" id="cad" method="POST" action="{{ url('stock') }}">
        @endif
        @csrf

        <!-- As entradas so exibiram algo em caso de haver a varivel sendo enviada via url -->
        <input type="text" class="form-control input-txt" placeholder="Nome do Produto" name="name"
            value='{{ $products->name ?? '' }}' required>

        <input type="text" class="form-control input-txt" placeholder="Descrição" name="description"
            value='{{ $products->description ?? '' }}' required>

        <!-- Apenas em caso de edição sera exibido lateralmente a categoria -->
        @if (isset($products))
            <div class="input-group">
                <div class="input-group-append">
                    <span class="input-group-text input-txt">{{ $products->category ?? '' }}</span>
                </div>
        @endif

        <select class="form-control input-txt" name="category">
            <option value="Sem categoria selecionada">Selecione a categoria</option>
            <option value="Bens duráveis">Bem duráveis</option>
            <option value="Não-duráveis">Não-duráveis</option>
            <option value="De Conveniência">De Conveniência</option>
            <option value="Produtos Industriais">Produtos Industriais</option>
            <option value="Outro tipo">Outro tipo</option>
        </select>
        @if (isset($products))</div> @endif

        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <div class="input-group-append">
                        <span class="input-group-text input-txt">R$</span>
                    </div>
                    <input type="number" class="form-control input-txt" placeholder="Preço" name="value" step="0.01"
                        value='{{ $products->value ?? '' }}' required>
                </div>
            </div>
            <div class="col-md-6">
                <input type="number" class="form-control input-txt" placeholder="Quantidade" name="quanty"
                    value='{{ $products->quanty ?? '' }}' required>
            </div>
        </div>
        <div class="text-center">
            <button class="btn_blue input-txt"> Salvar</button>
        </div>
    </div>
    </form>
@endsection
