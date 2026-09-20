<?php
$pageTitle = 'Ana Sayfa';
$currentPage = 'home';
require __DIR__ . '/includes/header.php';
?>
<section class="hero">
    <div class="container hero-grid">
        <div class="hero-copy">
            <span class="eyebrow">PHP + HTML5 + cPanel</span>
            <h1>Fikirlerinizi web'de <span>hayata geçirin.</span></h1>
            <p>Hızlı, sade ve tüm ekranlara uyum sağlayan örnek web projesi. GitHub üzerinden yönetilir, cPanel üzerinde kolayca yayınlanır.</p>
            <div class="hero-actions">
                <a class="button primary" href="/iletisim">Bize Ulaşın</a>
                <a class="button secondary" href="/hakkimizda">Daha Fazla Bilgi</a>
            </div>
            <div class="hero-stats">
                <div><strong>100%</strong><span>Mobil uyumlu</span></div>
                <div><strong>PHP 8+</strong><span>Temiz altyapı</span></div>
                <div><strong>GitHub</strong><span>Sürüm kontrolü</span></div>
            </div>
        </div>
        <div class="hero-visual" aria-hidden="true">
            <div class="code-card">
                <div class="window-bar"><i></i><i></i><i></i></div>
                <pre><code><b>&lt;?php</b>
$proje = [
  <span>'hızlı'</span>,
  <span>'responsive'</span>,
  <span>'güvenli'</span>
];

echo <span>'Merhaba Dünya!'</span>;
<b>?&gt;</b></code></pre>
            </div>
            <span class="orbit orbit-one"></span>
            <span class="orbit orbit-two"></span>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-heading">
            <span class="eyebrow">Neler sunuyoruz?</span>
            <h2>Basit, modern ve geliştirilebilir</h2>
            <p>Bu başlangıç projesi temel bir kurumsal sitenin ihtiyaç duyduğu yapıyı içerir.</p>
        </div>
        <div class="card-grid">
            <article class="feature-card"><span class="icon">⚡</span><h3>Yüksek Performans</h3><p>Hafif kod yapısı sayesinde sayfalar hızlı yüklenir ve ziyaretçiler beklemez.</p></article>
            <article class="feature-card"><span class="icon">◫</span><h3>Mobil Uyumlu</h3><p>Telefon, tablet ve masaüstü ekranlarında rahat kullanılan esnek tasarım.</p></article>
            <article class="feature-card"><span class="icon">⌘</span><h3>Kolay Yönetim</h3><p>Ortak PHP bileşenleri ile menü ve alt bilgi tek noktadan güncellenir.</p></article>
        </div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
