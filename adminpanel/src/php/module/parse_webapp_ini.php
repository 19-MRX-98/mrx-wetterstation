<?php
    $ini_array = parse_ini_file("/tkf_ini/webapp.ini", true, INI_SCANNER_RAW);
?>
 <div class="container my-5">
        <div class="accordion" id="accordionExample">
            <?php foreach ($ini_array as $section => $values): ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-<?php echo $section; ?>">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $section; ?>" aria-expanded="true" aria-controls="collapse-<?php echo $section; ?>">
                            <?php echo htmlspecialchars($section); ?>
                        </button>
                    </h2>
                    <div id="collapse-<?php echo $section; ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?php echo $section; ?>" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul class="list-group">
                                <?php foreach ($values as $key => $value): ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <?php echo htmlspecialchars($key); ?>: <?php echo htmlspecialchars($value); ?>
                                        <?php if (!in_array($key, non_editable_keys_webapp()) && !in_array($section, non_editable_sections_webapp())): ?>
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-section="<?php echo htmlspecialchars($section); ?>" data-key="<?php echo htmlspecialchars($key); ?>" data-value="<?php echo htmlspecialchars($value); ?>">
                                                Bearbeiten
                                            </button>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Modal zum Bearbeiten -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="/edit_webapp_ini">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Wert bearbeiten</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="section" class="form-label">Sektion</label>
                            <input type="text" class="form-control" id="section" name="section" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="key" class="form-label">Schlüssel</label>
                            <input type="text" class="form-control" id="key" name="key" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="value" class="form-label">Wert</label>
                            <input type="text" class="form-control" id="value" name="value">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Schließen</button>
                        <button type="submit" class="btn btn-primary">Speichern</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Daten an das Modal übergeben
        var editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var section = button.getAttribute('data-section');
            var key = button.getAttribute('data-key');
            var value = button.getAttribute('data-value');

            var modalSection = editModal.querySelector('.modal-body #section');
            var modalKey = editModal.querySelector('.modal-body #key');
            var modalValue = editModal.querySelector('.modal-body #value');

            modalSection.value = section;
            modalKey.value = key;
            modalValue.value = value;
        });
    </script>