<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Affiliate Link Management Tool</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Affiliate Link Management Tool</h1>
    <form action="add_link.php" method="post">
        <label for="url">Original URL:</label>
        <input type="url" id="url" name="url" required>
        <button type="submit">Add Link</button>
    </form>

    <?php
    $db = new PDO('sqlite:db/database.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $result = $db->query("SELECT * FROM links");

    echo "<table>";
    echo "<tr><th>Short URL</th><th>Original URL</th><th>Clicks</th><th>QR Code</th></tr>";
    foreach ($result as $row) {
        $short_code = htmlspecialchars($row['short_code']);
        $original_url = htmlspecialchars($row['original_url']);
        $clicks = $row['clicks'];
        echo "<tr>
                <td><a href='redirect.php?code={$short_code}'>http://localhost/affiliate_link_manager/redirect.php?code={$short_code}</a></td>
                <td>{$original_url}</td>
                <td>{$clicks}</td>
                <td><img src='generate_qr.php?code={$short_code}' alt='QR Code'></td>
              </tr>";
    }
    echo "</table>";
    ?>
</body>
</html>
