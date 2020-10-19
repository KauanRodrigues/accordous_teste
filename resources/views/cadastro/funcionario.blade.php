@include ('includes.header') {{-- Carrega o header --}}
@include ('includes.menu') {{-- Carrega o menu --}}

{{-- Inicio container --}}
<div class="container-fluid mt-3">
    {{-- Inicio div card --}}
    <div class="row">
        <div class="form-group col-md-12">
            {{-- Inicio Card --}}
            <div class="card">
                {{-- Inicio Card Header --}}
                <div class="card-header">
                    <span>Cadastro de Funcionario</span>
                </div>
                {{-- Fim Card Header --}}
                {{-- Inicio Card Body --}}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome<span class="text-danger">*</span></label>
                            <input type="text" id="nome" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">E-mail<span class="text-danger">*</span></label>
                            <input type="email" id="email" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="usuario">Usuário<span class="text-danger">*</span></label>
                            <input type="text" id="usuario" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="senha">Senha<span class="text-danger">*</span></label>
                            <input type="password" id="senha" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
                {{-- Fim Card Body --}}
                {{-- Inicio Card Footer --}}
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <button type="button" id="btn_salvar" class="btn btn-primary btn-sm btn-block button_request" onclick="salvar()">SALVAR</button>
                        </div>
                    </div>
                </div>
                {{-- Fim card footer --}}
            </div>
            {{-- Fim Card --}}
        </div>
    </div>
    {{-- Fim div card --}}
</div>
{{-- Fim container --}}

{{-- Inicio scripts utilizados na tela --}}
@push ('scripts')
    {{-- Carrega o js da tela --}}
    <script src="{{ asset('js/cadastro/funcionario.js') }}"></script>
@endpush
{{-- Fim scripts --}}

@include ('includes.footer')  {{-- Carrega o footer --}}