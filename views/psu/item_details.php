<?php if (isset($error)): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
<?php else: ?>
    <div class="card shadow-sm mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Dettagli Alimentatore</h5>
            <a href="index.php?page=home" class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-left"></i> Indietro</a>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <h6 class="text-muted">Marca / Modello</h6>
                    <p class="fw-semibold mb-0"><?= htmlspecialchars($alimentatore['marca']) ?></p>
                    <p class="small text-muted"><?= htmlspecialchars($alimentatore['modello']) ?></p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-muted">Made in</h6>
                    <span class="badge bg-info text-dark"><?= htmlspecialchars($alimentatore['made_in']) ?></span>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col-md-6">
                    <h6 class="text-muted">Input Volt (V)</h6>
                    <p class="mb-0"><?= htmlspecialchars($alimentatore['input_min_v']) ?> - <?= htmlspecialchars($alimentatore['input_max_v']) ?> V</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-muted">Ampere (A)</h6>
                    <p class="mb-0">In: <?= htmlspecialchars($alimentatore['ampere_input']) ?>A<br>Out: <?= htmlspecialchars($alimentatore['ampere_output']) ?>A</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <h6 class="text-muted">Frequenza (Hz)</h6>
                    <p class="mb-0"><?= htmlspecialchars($alimentatore['freq_min_hz']) ?> - <?= htmlspecialchars($alimentatore['freq_max_hz']) ?> Hz</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-muted">Output (W)</h6>
                    <p class="mb-0"><?= htmlspecialchars($alimentatore['output_details']) ?></p>
                </div>
            </div>
            <?php if (!empty($alimentatore['note'])): ?>
                <div class="row mb-3">
                    <div class="col-12">
                        <h6 class="text-muted">Note</h6>
                        <p class="mb-0 small bg-light border rounded p-2"><?= nl2br(htmlspecialchars($alimentatore['note'])) ?></p>
                    </div>
                </div>
            <?php endif; ?>
            <hr>
            <div class="d-flex gap-2">
                <a href="index.php?page=edit&id=<?= $alimentatore['id'] ?>" class="btn btn-warning"><i class="bi bi-pencil"></i> Modifica</a>
                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-delete-url="index.php?page=delete&id=<?= $alimentatore['id'] ?>" data-bs-target="#confirmDeleteModal"><i class="bi bi-trash"></i> Elimina</a>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- Include il modal di conferma eliminazione -->
<?php include 'confirm_delete_modal.php'; ?>