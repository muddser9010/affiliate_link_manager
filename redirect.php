<?php
if (isset($_GET['code'])) {
    $short_code = htmlspecialchars($_GET['code']);

    try {
        $db = new PDO('sqlite:db/database.sqlite');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $db->prepare("SELECT original_url FROM links WHERE short_code = :short_code");
        $stmt->execute([':short_code' => $short_code]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $original_url = $row['original_url'];
            $stmt = $db->prepare("UPDATE links SET clicks = clicks + 1 WHERE short_code = :short_code");
            $stmt->execute([':short_code' => $short_code]);
            header("Location: {$original_url}");
            exit;
        } else {
            die('Invalid link');
        }
    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }
} else {
    die('No short code provided');
}
?>
