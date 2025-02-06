<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>

    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Saját css -->
    <link href="/Public/css/style.css" rel="stylesheet">

    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="conmtainer-fluid navbar d-flex gap-1 justify-content-center align-items-center">
        <?php if (isset($_SESSION['user_id'])) : ?>
            <a href="/profile" class="btn btn-primary">Profil</a>
            <a href="/users" class="btn btn-primary">Felhasználók</a>
            <a href="/logout" class="btn btn-primary">Kijelentkezés</a>
        <?php else : ?>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">Belépés</button>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerModal">Regisztráció</button>
        <?php endif; ?>
    </div>
    <div class="contents">
        <?php if (isset($title)) : ?>
            <h2><?php echo $title ?></h2>
        <?php endif; ?>