<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="row justify-content-center card p-4 shadow-sm" style="margin: 0 120px; max-width: 800px;">
        <h2 class="text-center mb-4">Aggiungi Alimentatore</h2>
        <form action="index.php?page=create" method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="marca" class="form-label">Marca <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="marca" name="marca" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="modello" class="form-label">Modello <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="modello" name="modello" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="input_min" class="form-label">Input Min (V) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="input_min" name="input_min" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="input_max" class="form-label">Input Max (V) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="input_max" name="input_max" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="ampere_input" class="form-label">Ampere Input (A) <span class="text-danger">*</span></label>
                    <input type="number" step="0.01" class="form-control" id="ampere_input" name="ampere_input" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="ampere_output" class="form-label">Ampere Output (A) <span class="text-danger">*</span></label>
                    <input type="number" step="0.01" class="form-control" id="ampere_output" name="ampere_output" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="freq_min" class="form-label">Frequenza Min (Hz) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="freq_min" name="freq_min" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="freq_max" class="form-label">Frequenza Max (Hz) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="freq_max" name="freq_max" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="output" class="form-label">Output <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="output" name="output" required>
            </div>
            <div class="mb-3">
                <label for="made_in" class="form-label">Made in <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="made_in" name="made_in" required>
            </div>
            <div class="mb-3">
                <label for="note" class="form-label">Note</label>
                <textarea class="form-control" id="note" name="note" rows="3" placeholder="Informazioni aggiuntive"></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Salva</button>
        </form>
    </div>
</div>