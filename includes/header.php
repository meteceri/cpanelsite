<?php
declare(strict_types=1);

$pageTitle = $pageTitle ?? 'Ana Sayfa';
$currentPage = $currentPage ?? '';
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="PHP ve HTML5 ile hazırlanmış modern, hızlı ve mobil uyumlu örnek web sitesi.">
    <title>Kaynarca Web | <?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<header class="site-header">
    <div class="container nav-wrap">
        <a class="brand" href="/" aria-label="Kaynarca Web ana sayfa">
            <span class="brand-mark">K</span>
            <span>Kaynarca <span>Web</span></span>
        </a>
        <button class="menu-button" type="button" aria-label="Menüyü aç" aria-expanded="false" aria-controls="main-nav">
            <span></span><span></span><span></span>
        </button>
        <nav id="main-nav" class="main-nav" aria-label="Ana menü">
            <a class="<?= $currentPage === 'home' ? 'active' : '' ?>" href="/">Ana Sayfa</a>
            <a class="<?= $currentPage === 'about' ? 'active' : '' ?>" href="/hakkimizda">Hakkımızda</a>
            <a class="<?= $currentPage === 'contact' ? 'active' : '' ?>" href="/iletisim">İletişim</a>
        </nav>
    </div>
</header>
<main>
