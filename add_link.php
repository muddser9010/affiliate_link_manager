<?php
function generateShortCode($length = 6) {
    return substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $length);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $original_url = filter_var($_POST['url'], FILTER_SANITIZE_URL);
    if (!filter_var($original_url, FILTER_VALIDATE_URL)) {
        die('Invalid URL');
    }

    try {
        $db = new PDO('sqlite:db/database.sqlite');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        do {
            $short_code = generateShortCode();
            $stmt = $db->prepare("SELECT COUNT(*) FROM links WHERE short_code = :short_code");
            $stmt->execute([':short_code' => $short_code]);
        } while ($stmt->fetchColumn() > 0);

        $stmt = $db->prepare("INSERT INTO links (original_url, short_code) VALUES (:original_url, :short_code)");
        $stmt->execute([':original_url' => $original_url, ':short_code' => $short_code]);

        header("Location: index.php?short_code={$short_code}");
    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }
}
?>
