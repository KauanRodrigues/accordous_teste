@include ('includes/header') {{-- Carrega o header --}}
@include ('includes/menu') {{-- Carrega o menu --}}

{{-- Inicio container --}}
<div class="container-fluid mt-3">
    {{-- Inicio div card --}}
    <div class="row">
        <div class="form-group col-md-12">
            {{-- Inicio card --}}
            <div class="card">
                {{-- Inicio card header --}}
                <div class="card-header">
                    <span>Home</span>
                </div>
                {{-- Fim card header --}}
                {{-- Inicio card body --}}
                <div class="card-body">
                    <div class="row center">
                        <div class="form-group col-md-6 offset-md-3">
                            <h5>Bem vindo ao sistema de aluguel de imóveis da Accordous</h5>
                        </div>
                    </div>
                </div>
                {{-- Fim card body --}}
            </div>
            {{-- Fim card --}}
        </div>
    </div>
    {{-- Fim div card --}}
</div>
{{-- Fim container --}}

@include ('includes/footer') {{-- Carrega o footer --}}