<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Food</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this food?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="deleteButton">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteFood(foodId) {
        // Perform delete action
        window.location.href = "{{ url('/deleteFood/') }}" + '/' + foodId;
    }

    var deleteConfirmationModal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'), {});
    document.querySelectorAll('.btn-delete').forEach(function (button) {
        button.addEventListener('click', function () {
            var foodId = this.dataset.foodId;
            deleteConfirmationModal.show();
            document.getElementById('deleteButton').addEventListener('click', function () {
                deleteFood(foodId);
            });
        });
    });
</script>
