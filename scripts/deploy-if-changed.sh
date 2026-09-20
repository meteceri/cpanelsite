#!/bin/bash

set -euo pipefail

REPOSITORY_PATH="/home/metecomtr/site"
CPANEL_UAPI="/usr/local/cpanel/bin/uapi"

cd "$REPOSITORY_PATH"

# GitHub'daki main dalının son durumunu çalışma dosyalarını değiştirmeden al.
git fetch --quiet origin main

LOCAL_COMMIT="$(git rev-parse HEAD)"
REMOTE_COMMIT="$(git rev-parse origin/main)"

# Yeni commit yoksa dağıtım yapmadan çık.
if [ "$LOCAL_COMMIT" = "$REMOTE_COMMIT" ]; then
    exit 0
fi

# Yalnızca güvenli, ileri yönlü güncellemeye izin ver.
git merge --ff-only origin/main

# .cpanel.yml içindeki görevleri çalıştırarak canlı siteyi güncelle.
"$CPANEL_UAPI" VersionControlDeployment create \
    repository_root="$REPOSITORY_PATH"
