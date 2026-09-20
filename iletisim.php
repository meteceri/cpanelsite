<?php
declare(strict_types=1);

$pageTitle = 'İletişim';
$currentPage = 'contact';
$errors = [];
$success = false;
$name = '';
$email = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim((string) ($_POST['name'] ?? ''));
    $email = trim((string) ($_POST['email'] ?? ''));
    $message = trim((string) ($_POST['message'] ?? ''));
    $honeypot = trim((string) ($_POST['website'] ?? ''));

    if ($honeypot !== '') {
        $errors[] = 'İşlem doğrulanamadı.';
    }
    if (mb_strlen($name) < 2 || mb_strlen($name) > 80) {
        $errors[] = 'Adınız 2–80 karakter arasında olmalıdır.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Geçerli bir e-posta adresi yazın.';
    }
    if (mb_strlen($message) < 10 || mb_strlen($message) > 2000) {
        $errors[] = 'Mesajınız 10–2000 karakter arasında olmalıdır.';
    }

    if ($errors === []) {
        $success = true;
        $name = $email = $message = '';
    }
}

require __DIR__ . '/includes/header.php';
?>
<section class="page-hero">
    <div class="container narrow"><span class="eyebrow">İletişim</span><h1>Birlikte konuşalım</h1><p>Sorularınız ve proje fikirleriniz için formu kullanabilirsiniz.</p></div>
</section>
<section class="section">
    <div class="container contact-grid">
        <div class="contact-info">
            <span class="eyebrow">Bize ulaşın</span><h2>Size nasıl yardımcı olabiliriz?</h2>
            <p>Bu form şu anda test modundadır. Bilgiler doğrulanır ancak kaydedilmez ve e-posta olarak gönderilmez.</p>
            <div class="contact-item"><span>@</span><div><small>E-posta</small><strong>info@meteceri.com.tr</strong></div></div>
            <div class="contact-item"><span>⌖</span><div><small>Konum</small><strong>İstanbul, Türkiye</strong></div></div>
        </div>
        <form class="contact-form" method="post" action="/iletisim" novalidate>
            <?php if ($success): ?><div class="alert success" role="status">Teşekkürler! Form başarıyla doğrulandı.</div><?php endif; ?>
            <?php if ($errors !== []): ?><div class="alert error" role="alert"><strong>Lütfen aşağıdakileri düzeltin:</strong><ul><?php foreach ($errors as $error): ?><li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li><?php endforeach; ?></ul></div><?php endif; ?>
            <div class="field trap" aria-hidden="true"><label for="website">Web sitesi</label><input id="website" name="website" tabindex="-1" autocomplete="off"></div>
            <div class="field"><label for="name">Adınız</label><input id="name" name="name" type="text" minlength="2" maxlength="80" value="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>" required placeholder="Adınız Soyadınız"></div>
            <div class="field"><label for="email">E-posta adresiniz</label><input id="email" name="email" type="email" maxlength="160" value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>" required placeholder="ornek@email.com"></div>
            <div class="field"><label for="message">Mesajınız</label><textarea id="message" name="message" minlength="10" maxlength="2000" required placeholder="Size nasıl yardımcı olabiliriz?"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></textarea></div>
            <button class="button primary full" type="submit">Mesajı Gönder</button>
        </form>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
