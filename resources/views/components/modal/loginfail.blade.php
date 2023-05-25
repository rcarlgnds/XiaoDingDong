@if ($errors->any())
<div class="modal show" id="myModal" tabindex="-1" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark-red">
                <h5 class="modal-title text-white" id="errorModalLabel">Login Error</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{ $errors->first() }} please try again.</p>
            </div>
            <div class="modal-footer bg-dark-red">
                <button type="button" class="btn btn-secondary bg-gray" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    var myModal = new bootstrap.Modal(document.getElementById('myModal'), {})
    myModal.toggle()
</script>
@endif
