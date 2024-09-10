<?php
   // Anzahl der Einträge pro Seite
$entriesPerPage = 10;

// Maximale Anzahl der Seiten
$maxPages = 5;

// Logdateipfad
$logFilePath = 'logs/app.log';

// Lese die Logdatei
$logEntries = file($logFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Filtere leere Nachrichtenteile heraus und sortiere nach Datum (neuste zuerst)
$filteredEntries = array_filter($logEntries, function($line) {
    return preg_match('/\[(.*?)\]-->.*?-->/', $line);
});
usort($filteredEntries, function($a, $b) {
    return strtotime(substr($b, 1, 19)) - strtotime(substr($a, 1, 19));
});

// Paginierung
$totalEntries = count($filteredEntries);
$totalPages = min(ceil($totalEntries / $entriesPerPage), $maxPages);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, min($page, $totalPages));

$offset = ($page - 1) * $entriesPerPage;
$entriesToShow = array_slice($filteredEntries, $offset, $entriesPerPage);

// Log-Level Farben
$logLevelColors = [
    'INFO' => 'blue',
    'ERROR' => 'red',
    'WARNING' => 'yellow',
];

?>
<style>
    .log-info { color: Green; }
    .log-error { color: red; }
    .log-warning { color: orange; }
</style>
    <table class="table-responsive table-dark table-striped">
        <thead>
            <tr>
                <th>Date</th>
                <th>Level</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($entriesToShow as $entry): ?>
                <?php
                if (preg_match('/\[(.*?)\]-->\[(.*?)\]-->\[(.*?)\]/', $entry, $matches)) {
                    $date = $matches[1];
                    $level = $matches[2];
                    $message = $matches[3];
                    if (empty($message)) continue;
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($date); ?></td>
                    <td class="<?php echo 'log-' . strtolower($level); ?>">
                        <?php echo htmlspecialchars($level); ?>
                    </td>
                    <td><?php echo htmlspecialchars($message); logs("TEST-ERROR","WARNING")?></td>
                </tr>
                <?php } ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <nav>
        <ul class="pagination">
            <li class="page-item <?php echo ($page == 1) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?page=<?php echo ($page - 1); ?>">Previous</a>
            </li>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
            <li class="page-item <?php echo ($page == $totalPages) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?page=<?php echo ($page + 1); ?>">Next</a>
            </li>
        </ul>
    </nav>
</div>