# Kaynarca Web

Geçici olarak boş beyaz sayfa gösteren ve arama motorlarının indekslemesini engelleyen PHP yayın yapılandırması.

## Davranış

- Tüm sayfa adresleri boş ana sayfayı gösterir.
- `X-Robots-Tag` ve meta robots ile `noindex, nofollow, noarchive` uygulanır.
- `robots.txt` tüm taramayı engeller.
- cPanel Cron betiği değişiklikleri `/home/metecomtr/public_html` dizinine dağıtır.
