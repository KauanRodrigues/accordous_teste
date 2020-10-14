{{-- Inicio styles --}}
@push ('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endpush
{{-- Fim styles --}}

@include ('includes/header') {{-- Carrega o header --}}
@include ('includes/menu') {{-- Carrega o menu --}}

{{-- Inico container --}}
<div class="container-fluid mt-3">
    {{-- Inicio div card --}}
    <div class="row">
        <div class="form-group col-md-12">
            {{-- Inicio card --}}
            <div class="card">
                {{-- Inicio card header --}}
                <div class="card-header">
                    <span>Relatório de Imóveis</span>
                </div>
                {{-- Fim card header --}}
                {{-- Inicio card body --}}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="status">Status</label>
                            <select id="status" class="custom-select custom-select-sm">
                                <option value="2">Contratada/Não Contratada</option>
                                <option value="1">Contratada</option>
                                <option value="0">Não Contratada</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <button id="btn_pesquisar" class="btn btn-primary btn-sm btn-block btn_alinhado" onclick="pesquisar()">Pesquisar</button>
                        </div>
                    </div>
                </div>
                {{-- Fim card body --}}
            </div>
            {{-- Fim card --}}
        </div>
    </div>
    {{-- Fim div card --}}
    {{-- Inicio div card --}}
    <div class="row">
        <div class="form-group col-md-12">
            {{-- Inicio card --}}
            <div class="card">
                {{-- Inicio card header --}}
                <div class="card-header">
                    <span>Imóveis</span>
                </div>
                {{-- Fim card header --}}
                {{-- Inicio card body --}}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <table id="table_imoveis" class="table table-sm table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="15%">Status</th>
                                        <th width="40%">Proprietario</th>
                                        <th>Endereço</th>
                                        <th width="10%"></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
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

{{-- INicio scripts --}}
@push ('scripts')
    {{-- Carrega o arquivo de data table --}}
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    {{-- Carrega o arquivo de data table do bootstrap 4 --}}
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    {{-- Carrega o js da tela --}}
    <script src="{{ asset('js/relatorio/imoveis.js') }}"></script>
@endpush
{{-- Fim scripts --}}

@include ('includes/footer') {{-- Carrega o footer --}}