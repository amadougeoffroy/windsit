# 📧 Intégration Brevo API - WindsIT

## ✅ Configuration Terminée

L'intégration de l'API Brevo est maintenant complète et fonctionnelle pour les formulaires de contact et de candidature.

---

## 📋 Fichiers Créés

### 1. **config.php** (⚠️ SENSIBLE - Ne pas commiter)
Configuration centralisée contenant :
- Clé API Brevo
- Adresses email expéditeur/destinataire
- Paramètres de sécurité (CORS)

### 2. **send-contact.php**
Backend pour le formulaire de contact :
- Validation des données
- Envoi d'email via Brevo API
- Emails HTML stylisés
- Gestion des erreurs

### 3. **send-application.php**
Backend pour le formulaire de carrières :
- Gestion des uploads de fichiers (CV, Portfolio)
- Envoi avec pièces jointes
- Validation complète
- Emails HTML professionnels

### 4. **.gitignore**
Protège les fichiers sensibles (config.php notamment)

### 5. Modifications des formulaires
- **contact.html** : Ajout du JavaScript d'envoi
- **carrieres.html** : Mise à jour pour utiliser l'API

---

## 🔑 Configuration Actuelle

| Paramètre | Valeur |
|-----------|--------|
| **Email expéditeur** | `amadougeoffroy@gmail.com` (temporaire) |
| **Nom expéditeur** | WindsIT |
| **Email destinataire** | `amadougeoffroy@gmail.com` |
| **Clé API** | ✅ Configurée |

### ⚠️ À FAIRE : Configurer l'email professionnel

**Pour utiliser `contact@windsit.com` :**

1. **Créer l'email dans Brevo :**
   - Connectez-vous sur https://app.brevo.com
   - Allez dans **Expéditeurs** → **Ajouter un expéditeur**
   - Ajoutez `contact@windsit.com`
   - Vérifiez l'email (cliquez sur le lien envoyé)

2. **Mettre à jour config.php :**
   ```php
   define('EMAIL_FROM', 'contact@windsit.com');
   ```

3. **Alternative : Utiliser un domaine**
   - Allez dans **Expéditeurs** → **Domaines**
   - Ajoutez `windsit.com`
   - Configurez les enregistrements DNS (SPF, DKIM, DMARC)
   - Cela permet d'envoyer depuis n'importe quelle adresse @windsit.com

---

## 🚀 Comment ça fonctionne

### Formulaire de Contact

```
1. Utilisateur remplit le formulaire
2. JavaScript récupère les données
3. Envoi AJAX vers send-contact.php
4. send-contact.php valide et envoie via Brevo API
5. Email reçu sur amadougeoffroy@gmail.com
6. Notification de succès affichée
```

### Formulaire de Carrières

```
1. Utilisateur remplit + upload CV/Portfolio
2. JavaScript crée un FormData
3. Envoi vers send-application.php
4. Fichiers encodés en base64
5. Email avec pièces jointes via Brevo API
6. Candidature reçue avec CV attaché
```

---

## 📧 Format des Emails Reçus

### Email de Contact
```
Sujet: 💼 Contact WindsIT : [Sujet choisi]

Contenu:
- Nom complet
- Email (cliquable)
- Téléphone (cliquable)
- Sujet
- Message
- Date/heure
```

### Email de Candidature
```
Sujet: 💼 Candidature : [Prénom Nom] - [Poste]

Contenu:
- Nom/Prénom
- Coordonnées
- Poste souhaité
- Profil LinkedIn
- Lettre de motivation
- CV (pièce jointe)
- Portfolio (si fourni)
```

---

## 🔒 Sécurité

### ✅ Mesures Implémentées

1. **Clé API côté serveur uniquement**
   - Jamais exposée dans le code frontend
   - Stockée dans config.php

2. **Validation des données**
   - Nettoyage HTML (htmlspecialchars)
   - Validation email (filter_var)
   - Vérification des champs requis

3. **Protection CORS**
   - Liste blanche des origines autorisées
   - Empêche les requêtes non autorisées

4. **Validation des fichiers**
   - Vérification du type de fichier
   - Limite de taille (configurée par PHP)
   - Nettoyage du nom de fichier

5. **Protection Git**
   - .gitignore protège config.php
   - Clé API jamais commitée

---

## 🧪 Test en Local

### 1. Lancer le serveur PHP
```bash
cd /Users/amadougeoffroy/PROJETS/questions/website
./start-server.sh
```

### 2. Tester le formulaire de contact
1. Allez sur `http://localhost:8000/contact.html`
2. Remplissez le formulaire
3. Cliquez sur "Envoyer"
4. Vérifiez votre email (amadougeoffroy@gmail.com)

### 3. Tester le formulaire de carrières
1. Allez sur `http://localhost:8000/carrieres.html`
2. Remplissez le formulaire
3. Uploadez un PDF comme CV
4. Cliquez sur "Envoyer ma candidature"
5. Vérifiez l'email avec la pièce jointe

---

## 📊 Limites Brevo (Plan Gratuit)

| Limite | Valeur |
|--------|--------|
| **Emails/jour** | 300 |
| **Contacts** | Illimité |
| **Pièces jointes** | 10 MB max |
| **API calls** | Illimité |

Pour un site vitrine, 300 emails/jour est largement suffisant !

---

## 🐛 Dépannage

### Les emails n'arrivent pas

1. **Vérifier les logs PHP**
   ```bash
   tail -f /var/log/php_errors.log
   ```

2. **Vérifier la clé API**
   - Connectez-vous sur Brevo
   - Vérifiez que la clé est active
   - Régénérez si nécessaire

3. **Vérifier l'email expéditeur**
   - Doit être vérifié dans Brevo
   - Allez dans **Expéditeurs**

4. **Tester l'API directement**
   ```bash
   curl -X POST https://api.brevo.com/v3/smtp/email \
     -H "api-key: VOTRE_CLE" \
     -H "Content-Type: application/json" \
     -d '{
       "sender":{"email":"amadougeoffroy@gmail.com"},
       "to":[{"email":"amadougeoffroy@gmail.com"}],
       "subject":"Test",
       "htmlContent":"<p>Test</p>"
     }'
   ```

### Erreur CORS

Si vous obtenez une erreur CORS :
1. Vérifiez que votre origine est dans `ALLOWED_ORIGINS` (config.php)
2. Ajoutez votre URL de développement/production

### Fichiers trop volumineux

Modifiez `php.ini` :
```ini
upload_max_filesize = 10M
post_max_size = 10M
```

---

## 🚀 Déploiement en Production

### Avant de déployer

1. **Vérifier config.php**
   - Mettre la bonne URL du site
   - Ajouter le domaine de production dans ALLOWED_ORIGINS
   - Configurer contact@windsit.com si disponible

2. **Vérifier .gitignore**
   - config.php doit être ignoré
   - Ne pas commiter la clé API

3. **Créer config.php sur le serveur**
   - Copiez config.php manuellement sur le serveur
   - Ou utilisez des variables d'environnement

### Sur le serveur de production

```bash
# 1. Uploader tous les fichiers SAUF config.php
# 2. Créer config.php manuellement sur le serveur
# 3. Vérifier les permissions
chmod 644 config.php
chmod 644 send-*.php

# 4. Tester
curl -X POST https://windsit.com/send-contact.php \
  -H "Content-Type: application/json" \
  -d '{"name":"Test","email":"test@test.com","phone":"123","subject":"Test","message":"Test"}'
```

---

## 📞 Support

### Brevo
- Documentation : https://developers.brevo.com
- Support : https://help.brevo.com

### Configuration du Projet
Pour toute question sur l'intégration, consultez ce fichier ou les commentaires dans le code.

---

## 📈 Statistiques

Une fois en production, vous pouvez suivre les statistiques d'envoi :
- Connectez-vous sur https://app.brevo.com
- Allez dans **Statistiques** → **Emails transactionnels**
- Vous verrez : emails envoyés, ouverts, cliqués, etc.

---

**Intégration réalisée pour WindsIT** ✉️🚀

