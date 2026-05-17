# 🚀 Déployer Krilywete en démo sur Render (gratuit)

Guide étape par étape pour mettre une démo en ligne en ~10 minutes.

## Ce qui a été préparé

| Fichier | Rôle |
|---|---|
| `Dockerfile` | Construit l'image (PHP 8.2 + SQLite + Node pour Vite) |
| `render.yaml` | Configure le service web Render (free plan, Frankfurt) |
| `.dockerignore` | Réduit la taille de l'image |
| `app/Http/Middleware/DemoMode.php` | Bloque POST/PUT/DELETE quand `DEMO_MODE=true` |
| `.env.example` | Configuré pour SQLite par défaut |
| `database/seeders/*` | Idempotents (peuvent être relancés sans erreur) |

## Étapes

### 1. Pousser les changements sur GitHub

```bash
git add .
git commit -m "feat: prepare for Render demo deployment (SQLite + demo mode)"
git push origin master
```

### 2. Créer un compte Render

→ https://render.com (login avec GitHub, c'est plus simple)

### 3. Créer le service

1. Dashboard Render → **New +** → **Blueprint**
2. Connecter le repo GitHub `medghilly/krilywete`
3. Render détecte automatiquement le `render.yaml` → cliquer **Apply**
4. Attendre ~5-8 minutes que le build se termine

### 4. Récupérer l'URL

Une fois le déploiement terminé, ton URL sera du style :
```
https://krilywete.onrender.com
```

C'est ce lien à mettre sur ton CV.

## Comptes de démo (créés automatiquement par le seeder)

| Rôle | Email | Mot de passe |
|---|---|---|
| Admin | `medou@email.com` | `pass1234` |
| Client | `mghilly@email.com` | `pass1234` |
| Client | `cheikhani@email.com` | `pass1234` |

Les identifiants sont aussi affichés dans la bannière en haut du site en mode démo.

## Notes importantes (free plan)

- ⏰ **Cold start** : après 15 minutes sans visite, l'app s'endort. Le premier visiteur attendra ~30-60s. Pour éviter ça :
  - Soit upgrader à $7/mois (no sleep)
  - Soit utiliser un service de ping gratuit (UptimeRobot toutes les 5 min)
- 💾 **SQLite est volatile** : à chaque redéploiement, la base est recréée depuis les seeders. Toute donnée créée par les visiteurs est perdue → c'est OK pour une démo
- 🌍 **Région** : Frankfurt (modifie `region:` dans `render.yaml` si tu préfères Singapore/Ohio/Oregon)

## Tester localement avec la même config

```bash
# Build l'image Docker
docker build -t krilywete .

# Lance le conteneur
docker run -p 8080:8080 -e DEMO_MODE=true -e APP_KEY=$(php artisan key:generate --show) krilywete
```

Ouvre http://localhost:8080
