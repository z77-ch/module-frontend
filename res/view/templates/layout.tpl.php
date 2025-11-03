<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Meine Anwendung') ?></title>
</head>
<body>
    <header>
        <nav>
            <a href="/">Startseite</a> |
            <a href="/user/profile">Profil</a> |
            <a href="/logout">Logout</a>
        </nav>
    </header>

    <main>
        <?= $documentContent /* hier wird das Body-Template eingesetzt */ ?>
    </main>

    <footer>
        <small>&copy; <?= date('Y') ?> Z77 Framework</small>
    </footer>
</body>
</html>
