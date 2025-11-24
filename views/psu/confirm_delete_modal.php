<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Conferma Eliminazione</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Sei sicuro di voler eliminare questo elemento?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <a href="#" id="confirmDeleteBtn" class="btn btn-danger">Elimina</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
        const confirmDeleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
        const cancelButton = document.querySelector('#confirmDeleteModal .btn-secondary');
        const closeButton = document.querySelector('#confirmDeleteModal .btn-close');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const deleteUrl = this.getAttribute('data-delete-url');
                confirmDeleteBtn.setAttribute('href', deleteUrl);
                confirmDeleteModal.show();
            });
        });

        // Aggiungi azione per il bottone "Annulla"
        cancelButton.addEventListener('click', function() {
            confirmDeleteModal.hide();
        });

        // Aggiungi azione per il bottone "X"
        closeButton.addEventListener('click', function() {
            confirmDeleteModal.hide();
        });
    });
</script>