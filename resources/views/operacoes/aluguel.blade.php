{{-- Inicio styles --}}
@push ('styles')
    {{-- Carrega o select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush
{{-- Fim styles --}}

@include ('includes.header') {{-- Carrega o header --}}
@include ('includes.menu') {{-- Carrega o menu --}}

{{-- Inicio container --}}
<div class="container-fluid mt-3">
    {{-- Inicio div card --}}
    <div class="row">
        <div class="form-group col-md-12">
            {{-- Inicio card --}}
            <div class="card">
                {{-- Inicio card header --}}
                <div class="card-header">
                    <span>Operações de Aluguel</span>
                </div>
                {{-- Fim card header --}}
                {{-- Inicio card body --}}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="imovel">Imóvel</label>
                            <select id="imovel"></select>
                        </div>
                    </div>
                </div>
                {{-- Fim card body --}}
            </div>
            {{-- Fim card --}}
        </div>
    </div>
    {{-- FIm div card --}}
    {{-- Inicio div card --}}
    <div class="row">
        <div class="form-group col-md-12">
            {{-- Inicio card --}}
            <div class="card">
                {{-- Inicio card header --}}
                <div class="card-header">
                    <span>Dados Contratante</span>
                </div>
                {{-- Fim card header --}}
                {{-- Inicio card body --}}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="documento">Documento</label>
                            <select id="documento" class="custom-select custom-select-sm" onchange="change_cpf_cnpj(this.value)">
                                <option value="cpf">CPF</option>
                                <option value="cnpj">CNPJ</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cpf_cnpj" id="lbl_cpf_cnpj">CPF</label>
                            <input type="text" id="cpf_cnpj" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
                {{-- Fim card body --}}
                {{-- Inicio card footer --}}
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <button type="button" id="btn_salvar" class="btn btn-primary btn-sm btn-block" onclick="salvar()">SALVAR</button>
                        </div>
                    </div>
                </div>
                {{-- Fim card footer --}}
            </div>
            {{-- Fim card --}}
        </div>
    </div>
    {{-- Fim div card --}}
</div>
{{-- Fim container --}}

{{-- Inicio scripts --}}
@push ('scripts')
    {{-- Carrega o select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    {{-- Carrega o arquivo de mascaras de campo --}}
    <script src="{{ asset('plugins/jquery.mask.min.js') }}"></script>
    {{-- Carrega o js da tela --}}
    <script src="{{ asset('js/operacoes/aluguel.js') }}"></script>
@endpush
{{-- Fim scripts --}}

@include ('includes.footer') {{-- Carrega o footer --}}