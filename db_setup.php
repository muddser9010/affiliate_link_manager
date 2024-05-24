<?php
try {
    $db = new PDO('sqlite:db/database.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $db->exec("CREATE TABLE IF NOT EXISTS links (
        id INTEGER PRIMARY KEY,
        original_url TEXT,
        short_code TEXT UNIQUE,
        clicks INTEGER DEFAULT 0
    )");

    echo "Database setup completed.";
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
