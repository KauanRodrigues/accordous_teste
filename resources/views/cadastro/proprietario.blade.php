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
                    <span>Cadastro de Proprietários</span>
                </div>
                {{-- Fim card header --}}
                {{-- Inicio card body --}}
                <div class="card-body">
                    {{-- DADOS PESSOAIS --}}
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
                            <label for="cpf">CPF<span class="text-danger">*</span></label>
                            <input type="text" id="cpf" class="form-control form-control-sm">
                        </div>
                    </div>
                    {{-- FIM DADOS PESSOAIS --}}

                    {{-- ENDEREÇO --}}
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="cep">CEP<span class="text-danger">*</span></label>
                            <input type="text" id="cep" class="form-control form-control-sm" onkeyup="pesquisacep(this.value)">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="logradouro">Logradouro<span class="text-danger">*</span></label>
                            <input type="text" id="logradouro" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="numero">Número<span class="text-danger">*</span></label>
                            <input type="text" id="numero" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="bairro">Bairro<span class="text-danger">*</span></label>
                            <input type="text" id="bairro" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cidade">Cidade<span class="text-danger">*</span></label>
                            <input type="text" id="cidade" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="uf">UF<span class="text-danger">*</span></label>
                            <select id="uf" class="custom-select custom-select-sm">
                                <option value="">Selecione</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                                <option value="EX">Estrangeiro</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="complemento">Complemento</label>
                            <textarea id="complemento" cols="1" rows="1" class="form-control form-control-sm"></textarea>
                        </div>
                    </div>
                    {{-- FIM ENDEREÇO --}}
                </div>
                {{-- Fim card body --}}
                {{-- Inicio card footer --}}
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <button type="button" id="btn_salvar" class="btn btn-primary btn-sm btn-block button_request" onclick="salvar()">SALVAR</button>
                        </div>
                    </div>
                </div>
                {{-- Fim card Footer --}}
            </div>
            {{-- Fim card --}}
        </div>
    </div>
    {{-- Fim div card --}}
</div>
{{-- Fim container --}}

{{-- Inicio scripts utilizados pela tela --}}
@push ('scripts')
    {{-- Carrega o arquivo de mascaras dos campos --}}
    <script src="{{ asset('plugins/jquery.mask.min.js') }}"></script>
    {{-- Carrega o js da tela --}}
    <script src="{{ asset('js/cadastro/proprietario.js') }}"></script>
@endpush
{{-- Fim scripts --}}

@include ('includes.footer') {{-- Carrega o footer --}}