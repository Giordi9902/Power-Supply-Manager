<?php
$marca = $alimentatore['marca'] ?? '';
$modello = $alimentatore['modello'] ?? '';
$input_min = $alimentatore['input_min_v'] ?? '';
$input_max = $alimentatore['input_max_v'] ?? '';
$ampere_input = $alimentatore['ampere_input'] ?? '';
$ampere_output = $alimentatore['ampere_output'] ?? '';
$freq_min = $alimentatore['freq_min_hz'] ?? '';
$freq_max = $alimentatore['freq_max_hz'] ?? '';
$output = $alimentatore['output_details'] ?? '';
$made_in = $alimentatore['made_in'] ?? '';
$note = $alimentatore['note'] ?? '';
?>

<div class="card p-4 shadow-sm">
    <h2 class="text-center mb-4">Modifica Alimentatore</h2>
    <form action="index.php?page=edit&id=<?= htmlspecialchars($alimentatore['id']) ?>" method="POST">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" value="<?= htmlspecialchars($marca) ?>" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="modello" class="form-label">Modello</label>
                <input type="text" class="form-control" id="modello" name="modello" value="<?= htmlspecialchars($modello) ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="input_min" class="form-label">Input Min (V)</label>
                <input type="number" class="form-control" id="input_min" name="input_min" value="<?= htmlspecialchars($input_min) ?>" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="input_max" class="form-label">Input Max (V)</label>
                <input type="number" class="form-control" id="input_max" name="input_max" value="<?= htmlspecialchars($input_max) ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="ampere_input" class="form-label">Ampere Input (A)</label>
                <input type="number" step="0.01" class="form-control" id="ampere_input" name="ampere_input" value="<?= htmlspecialchars($ampere_input) ?>" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="ampere_output" class="form-label">Ampere Output (A)</label>
                <input type="number" step="0.01" class="form-control" id="ampere_output" name="ampere_output" value="<?= htmlspecialchars($ampere_output) ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="freq_min" class="form-label">Frequenza Min (Hz)</label>
                <input type="number" class="form-control" id="freq_min" name="freq_min" value="<?= htmlspecialchars($freq_min) ?>" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="freq_max" class="form-label">Frequenza Max (Hz)</label>
                <input type="number" class="form-control" id="freq_max" name="freq_max" value="<?= htmlspecialchars($freq_max) ?>" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="output" class="form-label">Output</label>
            <input type="text" class="form-control" id="output" name="output" value="<?= htmlspecialchars($output) ?>" required>
        </div>
        <div class="mb-3">
            <label for="made_in" class="form-label">Made in</label>
            <input type="text" class="form-control" id="made_in" name="made_in" value="<?= htmlspecialchars($made_in) ?>" required>
        </div>
        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <textarea class="form-control" id="note" name="note" rows="3" placeholder="Informazioni aggiuntive"><?= htmlspecialchars($note) ?></textarea>
        </div>
        <div class="d-flex justify-content-between">
            <a href="#" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#confirmCancelModal">Annulla</a>
            <button type="submit" class="btn btn-primary">Salva Modifiche</button>
        </div>
    </form>
</div>

<div class="modal fade" id="confirmCancelModal" tabindex="-1" aria-labelledby="confirmCancelModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmCancelModalLabel">Conferma Annullamento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Sei sicuro di voler annullare le modifiche? Eventuali dati non salvati andranno persi.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Continua Modifica</button>
                <a href="index.php?page=home" class="btn btn-danger">Annulla Modifiche</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cancelButton = document.querySelector('[data-bs-toggle="modal"]');
        const confirmCancelModal = new bootstrap.Modal(document.getElementById('confirmCancelModal'));
        const continueButton = document.querySelector('#confirmCancelModal .btn-secondary');
        const closeButton = document.querySelector('#confirmCancelModal .btn-close');

        cancelButton.addEventListener('click', function(event) {
            event.preventDefault();
            confirmCancelModal.show();
        });

        continueButton.addEventListener('click', function() {
            confirmCancelModal.hide();
        });

        closeButton.addEventListener('click', function() {
            confirmCancelModal.hide();
        });
    });
</script>