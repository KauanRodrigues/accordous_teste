{{-- Inicio styles --}}
@push ('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endpush
{{-- Fim styles --}}

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
                    <span>Relatório de Proprietário</span>
                </div>
                {{-- Fim card header --}}
                {{-- Inicio card body --}}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <table id="table_proprietario" class="table table-sm table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="35%">Nome</th>
                                        <th width="35%">E-mail</th>
                                        <th>CPF</th>
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

{{-- Inicio scripts --}}
@push ('scripts')
    {{-- Carrega o arquivo de data table --}}
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    {{-- Carrega o arquivo de data table do bootstrap 4--}}
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    {{-- Carrega o arquivo de js da tela --}}
    <script src="{{ asset('js/relatorio/proprietario.js') }}"></script>
@endpush
{{-- Fim scripts --}}

@include ('includes/footer') {{-- Carrega o footer --}}