#!/bin/bash

set -euo pipefail

REPOSITORY_PATH="/home/metecomtr/site"
DEPLOY_PATH="/home/metecomtr/public_html"

cd "$REPOSITORY_PATH"

# GitHub'daki main dalının son durumunu çalışma dosyalarını değiştirmeden al.
git fetch --quiet origin main

LOCAL_COMMIT="$(git rev-parse HEAD)"
REMOTE_COMMIT="$(git rev-parse origin/main)"

# Yeni commit varsa yalnızca güvenli, ileri yönlü güncellemeyi uygula.
if [ "$LOCAL_COMMIT" != "$REMOTE_COMMIT" ]; then
    git merge --ff-only origin/main
fi

# Çekilmiş fakat henüz canlıya kopyalanmamış commitleri de takip et.
DEPLOYED_FILE="$REPOSITORY_PATH/.git/cpanel-last-deployed"
DEPLOYED_COMMIT="$(cat "$DEPLOYED_FILE" 2>/dev/null || true)"

if [ "$DEPLOYED_COMMIT" = "$REMOTE_COMMIT" ]; then
    exit 0
fi

# Sunucudaki uapi çalışmadığı için .cpanel.yml ile aynı dosyaları doğrudan yayınla.
mkdir -p "$DEPLOY_PATH"
cp .htaccess "$DEPLOY_PATH/"
cp index.php "$DEPLOY_PATH/"
cp hakkimizda.php "$DEPLOY_PATH/"
cp iletisim.php "$DEPLOY_PATH/"
cp -R assets "$DEPLOY_PATH/"
cp -R includes "$DEPLOY_PATH/"

printf '%s\n' "$REMOTE_COMMIT" > "$DEPLOYED_FILE"

echo "$(date '+%Y-%m-%d %H:%M:%S') - $REMOTE_COMMIT canlı siteye dağıtıldı."
