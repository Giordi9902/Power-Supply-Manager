<div class="row justify-content-center" style="margin: 0 90px;">
    <div class="col-10">
        <?php
        $currentOrderBy = $_GET['order_by'] ?? 'marca';
        $currentOrderDir = strtoupper($_GET['order_dir'] ?? 'ASC');
        $currentOrderDir = $currentOrderDir === 'DESC' ? 'DESC' : 'ASC';
        $persistParams = $_GET;
        unset($persistParams['order_by'], $persistParams['order_dir']);

        function buildOrderLink($col, $label, $currentOrderBy, $currentOrderDir, $persistParams)
        {
            $nextDir = ($currentOrderBy === $col && $currentOrderDir === 'ASC') ? 'DESC' : 'ASC';
            $params = array_merge($persistParams, [
                'page' => 'home',
                'order_by' => $col,
                'order_dir' => $nextDir
            ]);
            $query = http_build_query($params);

            $arrow = '<i class="bi bi-arrow-up-down order-arrow inactive-arrow"></i>';
            if ($currentOrderBy === $col) {
                $arrow = $currentOrderDir === 'ASC'
                    ? '<i class="bi bi-arrow-up-short order-arrow"></i>'
                    : '<i class="bi bi-arrow-down-short order-arrow"></i>';
            }

            return '<a href="index.php?' . htmlspecialchars($query) . '" class="text-white text-decoration-none d-inline-flex align-items-center">' . $label . $arrow . '</a>';
        }
        ?>
        <div class="d-flex justify-content-between mb-3">
            <h3>Elenco Alimentatori</h3>
            <a href="index.php?page=create" class="btn btn-success"><i class="bi bi-plus-circle"></i> Nuovo</a>
        </div>

        <div class="card p-4 mb-4 shadow-sm">
            <h5 class="card-title">Ricerca Alimentatori</h5>
            <form action="index.php?page=home" method="GET">
                <input type="hidden" name="page" value="home">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="marca" name="marca" value="<?= htmlspecialchars($_GET['marca'] ?? '') ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="output_details" class="form-label">Output (W)</label>
                        <input type="number" class="form-control" id="output_details" name="output_details" value="<?= htmlspecialchars($_GET['output_details'] ?? '') ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="min_amp_out" class="form-label">Ampere Output Min (A)</label>
                        <input type="number" step="0.01" class="form-control" id="min_amp_out" name="min_amp_out" value="<?= htmlspecialchars($_GET['min_amp_out'] ?? '') ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="max_amp_out" class="form-label">Ampere Output Max (A)</label>
                        <input type="number" step="0.01" class="form-control" id="max_amp_out" name="max_amp_out" value="<?= htmlspecialchars($_GET['max_amp_out'] ?? '') ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="freq_min" class="form-label">Frequenza Min (Hz)</label>
                        <input type="number" class="form-control" id="freq_min" name="freq_min" value="<?= htmlspecialchars($_GET['freq_min'] ?? '') ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="freq_max" class="form-label">Frequenza Max (Hz)</label>
                        <input type="number" class="form-control" id="freq_max" name="freq_max" value="<?= htmlspecialchars($_GET['freq_max'] ?? '') ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="made_in" class="form-label">Made in</label>
                        <input type="text" class="form-control" id="made_in" name="made_in" value="<?= htmlspecialchars($_GET['made_in'] ?? '') ?>">
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Cerca</button>
                    <a href="index.php?page=home" class="btn btn-secondary ms-2">Reset</a>
                </div>
            </form>
        </div>

        <div class="table-responsive card p-2">
            <table class="table psu-table align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="text-nowrap"><?= buildOrderLink('marca', 'Marca / Modello', $currentOrderBy, $currentOrderDir, $persistParams) ?></th>
                        <th class="text-center"><?= buildOrderLink('output_details', 'Output', $currentOrderBy, $currentOrderDir, $persistParams) ?></th>
                        <th class="text-center"><?= buildOrderLink('ampere_output', 'Ampere Out', $currentOrderBy, $currentOrderDir, $persistParams) ?></th>
                        <th class="text-center">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($alimentatori)): ?>
                        <tr>
                            <td colspan="4" class="text-center">Nessun risultato trovato.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($alimentatori as $psu): ?>
                            <tr>
                                <td class="psu-brand">
                                    <strong><?= htmlspecialchars($psu['marca']) ?></strong>
                                    <small class="text-muted"><?= htmlspecialchars($psu['modello']) ?></small>
                                    <span class="badge badge-made"><?= htmlspecialchars($psu['made_in']) ?></span>
                                </td>
                                <td class="text-center">
                                    <?= htmlspecialchars($psu['output_details']) ?> W
                                </td>
                                <td class="text-center">
                                    <?= htmlspecialchars($psu['ampere_output']) ?> A
                                </td>
                                <td class="text-center action-buttons">
                                    <a href="index.php?page=details&id=<?= $psu['id'] ?>" class="btn btn-outline-info btn-sm" title="Dettagli">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="index.php?page=edit&id=<?= $psu['id'] ?>" class="btn btn-outline-warning btn-sm" title="Modifica">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="index.php?page=delete&id=<?= $psu['id'] ?>" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" title="Elimina">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'confirm_delete_modal.php'; ?>