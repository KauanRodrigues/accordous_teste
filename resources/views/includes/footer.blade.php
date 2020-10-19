
<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titulo_modal"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="body_modal">
            ...
        </div>
        <div class="modal-footer footer_modal center">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Fechar</button>
            {{-- <button type="button" class="btn btn-sm btn-primary">Salvar mudanças</button> --}}
        </div>
        </div>
    </div>
</div>

{{-- Carrega o jquery v3.5.1 --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
{{-- Carrega o Bootstrap 4 --}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
{{-- Carrega o popper do bootstrap 4 --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
{{-- Carrega o sweetalert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- Carrega o arquivo de funções gerais utilizados no sistema --}}
<script src="{{ asset('plugins/funcoes.js') }}" type="text/javascript"></script>
@stack ('scripts')

<script>
    let base_url = $("#base_url").val();
    let _token = $("#_token").val();
</script>

</body>
</html>