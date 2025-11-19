# 🔗 Configuration des URLs Propres - WindsIT

## Objectif

Retirer l'extension `.html` des URLs pour avoir des URLs plus propres et professionnelles.

## Avant / Après

| Avant | Après |
|-------|-------|
| `windsit.com/services.html` | `windsit.com/services` |
| `windsit.com/about.html` | `windsit.com/about` |
| `windsit.com/contact.html` | `windsit.com/contact` |

## Configuration

### Fichier `.htaccess` (Apache)

Le fichier `.htaccess` a été créé à la racine du site avec les règles suivantes :

1. **Redirection 301** : Les URLs avec `.html` redirigent automatiquement vers l'URL propre
2. **Réécriture interne** : Le serveur ajoute `.html` en interne pour trouver les fichiers
3. **Optimisations** : Compression, cache navigateur, headers de sécurité

### Serveur Nginx (alternative)

Si vous utilisez Nginx au lieu d'Apache, créez un fichier `nginx.conf` :

```nginx
server {
    listen 80;
    server_name windsit.com www.windsit.com;
    root /var/www/html;
    index index.html;

    # Remove .html extension
    location / {
        try_files $uri $uri.html $uri/ =404;
    }

    # Redirect .html to clean URL
    if ($request_uri ~ ^/(.*)\.html$) {
        return 301 /$1;
    }

    # Security headers
    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header X-XSS-Protection "1; mode=block" always;

    # Gzip compression
    gzip on;
    gzip_types text/plain text/css application/json application/javascript text/xml application/xml;
}
```

## Liens internes mis à jour

Tous les liens internes du site ont été mis à jour :

### Navigation
```html
<!-- Avant -->
<a href="services.html">Services</a>

<!-- Maintenant -->
<a href="/services">Services</a>
```

### Logo
```html
<!-- Avant -->
<a href="index.html">WindsIT</a>

<!-- Maintenant -->
<a href="/">WindsIT</a>
```

### Liens relatifs vs absolus

Tous les liens utilisent maintenant des **chemins absolus** depuis la racine :
- `/` → Page d'accueil
- `/services` → Page services
- `/contact` → Page contact
- etc.

## Avantages

✅ **SEO amélioré** : URLs plus propres et professionnelles  
✅ **Expérience utilisateur** : URLs faciles à lire et partager  
✅ **Professionnalisme** : Aspect plus moderne  
✅ **Compatibilité** : Fonctionne avec la plupart des hébergeurs  

## Test local

### Avec serveur PHP intégré
```bash
cd website
php -S localhost:8000
```

### Avec Python
```bash
cd website
python3 -m http.server 8000
```

**Note** : Le serveur de développement ne prend pas en charge `.htaccess`. Pour tester en local, vous devez :
- Utiliser Apache/Nginx localement (XAMPP, MAMP, WAMP)
- Ou laisser les extensions `.html` en développement et tester en production

## Déploiement

### Hébergement partagé (cPanel, etc.)
✅ Le fichier `.htaccess` fonctionne automatiquement  
✅ Aucune configuration supplémentaire nécessaire

### VPS / Serveur dédié (Apache)
```bash
# Activer mod_rewrite
sudo a2enmod rewrite
sudo systemctl restart apache2

# Vérifier la configuration
apache2ctl configtest
```

### VPS / Serveur dédié (Nginx)
```bash
# Éditer la configuration
sudo nano /etc/nginx/sites-available/windsit.com

# Tester la configuration
sudo nginx -t

# Recharger Nginx
sudo systemctl reload nginx
```

### Netlify / Vercel
Créer un fichier `_redirects` à la racine :
```
# Netlify redirects
/*.html  /:splat  301
```

Ou fichier `vercel.json` :
```json
{
  "cleanUrls": true
}
```

### GitHub Pages
Créer un fichier `_config.yml` :
```yaml
permalink: pretty
```

## Troubleshooting

### Erreur 404
- Vérifiez que le fichier `.htaccess` est bien à la racine
- Vérifiez que `mod_rewrite` est activé (Apache)
- Vérifiez les permissions des fichiers (644 pour les fichiers, 755 pour les dossiers)

### Boucle de redirection
- Vérifiez qu'il n'y a pas de conflit dans `.htaccess`
- Videz le cache du navigateur

### Ne fonctionne pas en local
- Utilisez un serveur Apache/Nginx local
- Ou attendez le déploiement en production pour tester

## Pages mises à jour

✅ index.html  
✅ services.html  
✅ realisations.html  
✅ about.html  
✅ contact.html  
✅ blog.html  
✅ faq.html  
✅ carrieres.html  

---

**Configuration créée pour WindsIT** 🚀

