{{-- Inicio styles utilizados pela tela --}}
@push ('styles')
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
                    <span>Cadastro de Imóveis</span>
                </div>
                {{-- Fim card header --}}
                {{-- Inicio card body --}}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="proprietario">Proprietário<span class="text-danger">*</span></label>
                            <select id="proprietario"></select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="quartos">Quartos</label>
                            <input type="text" id="quartos" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="andares">Andares</label>
                            <input type="text" id="andares" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="banheiros">Banheiros</label>
                            <input type="text" id="banheiros" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cozinhas">Cozinhas</label>
                            <input type="text" id="cozinhas" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="salas">Salas</label>
                            <input type="text" id="salas" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="garagem">Garagem</label>
                            <input type="text" id="garagem" class="form-control form-control-sm">
                        </div>
                    </div>
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
                {{-- Fim card footer --}}
            </div>
            {{-- Fim card --}}
        </div>
    </div>
    {{-- Fim div card --}}
</div>
{{-- Fim container --}}

{{-- Inicio scripts utilizados pela tela --}}
@push ('scripts')
    {{-- Carrega o select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    {{-- Carrega o arquivo de mascaras de campo --}}
    <script src="{{ asset('plugins/jquery.mask.min.js') }}"></script>
    {{-- Carrega o js da tela --}}
    <script src="{{ asset('js/cadastro/imoveis.js') }}"></script>
@endpush
{{-- Fim scripts --}}

@include ('includes.footer') {{-- Carrega o Footer --}}