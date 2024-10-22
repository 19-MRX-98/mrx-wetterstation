<?php
$ini = parse_ini_file("config/cloudpanel.ini");

// Load and parse log file
function parseLogFile($filePath) {
    $logs = [];
    $file = fopen($filePath, 'r');

    while (($line = fgets($file)) !== false) {
        preg_match('/\[(.*?)\]-->\[(.*?)\]-->\[(.*?)\]/', $line, $matches);
        if (count($matches) == 4 && !empty($matches[3])) {
            $logs[] = [
                'timestamp' => $matches[1],
                'level' => $matches[2],
                'message' => $matches[3]
            ];
        }
    }
    
    fclose($file);
    return array_reverse($logs);
}

$logfile1 = $ini['log_path'];  // First log file path
$logfile2 = $ini['dbc_log'];   // Second log file path
$logfile3 = $ini['webapp_log']; // Third log file path

$selectedLog = isset($_GET['logfile']) ? 
    ($_GET['logfile'] == '3' ? $logfile3 : 
    ($_GET['logfile'] == '2' ? $logfile2 : $logfile1)) : 
    $logfile1;

$logs = parseLogFile($selectedLog);

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 10;
$totalPages = ceil(count($logs) / $perPage);
$start = ($page - 1) * $perPage;
$logs = array_slice($logs, $start, $perPage);

// Define log level colors
$logLevelColors = [
    'INFO' => 'green',
    'ERROR' => 'red',
    'WARNING' => 'orange',
    'DEBUG' => 'grey'
];
?>
<h1>Logs</h1>
    <form method="get" class="mb-3">
        <div class="form-group">
            <label for="logfile">Select Logfile:</label>
            <select id="logfile" name="logfile" class="form-select form-select-sm" onchange="this.form.submit()">
                <option value="1" <?= $selectedLog == $logfile1 ? 'selected' : '' ?>><?php echo $logfile1 ?></option>
                <option value="2" <?= $selectedLog == $logfile2 ? 'selected' : '' ?>><?php echo $logfile2 ?></option>
                <option value="3" <?= $selectedLog == $logfile3 ? 'selected' : '' ?>><?php echo $logfile3 ?></option>
            </select>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Timestamp</th>
                <th>Level</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($logs as $log): ?>
            <tr>
                <td><?= $log['timestamp'] ?></td>
                <td><span class="badge text-bg-light" style="color: <?= $logLevelColors[$log['level']] ?? 'black' ?>;"><?= $log['level'] ?></span></td>
                <td><?= $log['message'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <nav>
        <ul class="pagination">
            <?php for ($i = 1; $i <= min($totalPages, 5); $i++): ?>
                <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i ?>&logfile=<?= $_GET['logfile'] ?? 1 ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>