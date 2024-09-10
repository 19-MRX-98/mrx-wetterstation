<?php

    $ini = parse_ini_file("config/cloudpanel.ini");

    function parseEnvFile($file) {
        $env = [];
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            // Kommentare überspringen
            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            // Teile die Zeile in Schlüssel und Wert
            list($key, $value) = explode('=', $line, 2);
            $env[trim($key)] = trim($value);
        }
        return $env;
    }
    
    // .env Datei auslesen
    $env = parseEnvFile($ini["env_path"]);


?>
  <div class="container mt-5">
        <div class="accordion" id="envAccordion">
            <?php foreach ($env as $key => $value): ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading<?= $key ?>">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $key ?>" aria-expanded="true" aria-controls="collapse<?= $key ?>">
                            <?= $key ?>
                        </button>
                    </h2>
                    <div id="collapse<?= $key ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $key ?>" data-bs-parent="#envAccordion">
                        <div class="accordion-body">
                            <p><strong>Wert:</strong> <?= $value ?></p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal3" data-key="<?= $key ?>" data-value="<?= $value ?>">
                                Bearbeiten
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editModal3" tabindex="-1" aria-labelledby="editModal3Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModal3Label">Wert bearbeiten</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post" action="/edit_docker_env">
                        <div class="mb-3">
                            <label for="key" class="form-label">Schlüssel</label>
                            <input type="text" class="form-control" id="key" name="key" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="value" class="form-label">Wert</label>
                            <input type="text" class="form-control" id="value" name="value">
                        </div>
                        <button type="submit" class="btn btn-primary">Speichern</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        var editModal3 = document.getElementById('editModal3')
        editModal3.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget
            var key = button.getAttribute('data-key')
            var value = button.getAttribute('data-value')

            var modalKeyInput = editModal3.querySelector('#key')
            var modalValueInput = editModal3.querySelector('#value')

            modalKeyInput.value = key
            modalValueInput.value = value
        })
    </script>