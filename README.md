# 🚀 WindsIT - Site Web Moderne et Animé

Site web professionnel pour l'agence de digitalisation WindsIT, développé avec des technologies modernes, animations fluides et approche mobile-first.

## ✨ Caractéristiques

### Design & UX
- 🎨 **Couleurs chaudes** : Palette orange (#FF6B35, #F7931E) et rouge (#E63946)
- 📱 **Mobile First** : Optimisé pour tous les appareils
- ⚡ **Animations fluides** : AOS (Animate On Scroll), transitions CSS, effets parallaxe
- 🎭 **Interactions avancées** : Hover effects, tilt effects, cursor follower (desktop)
- 🌊 **Effets visuels** : Formes animées, dégradés, ombres élégantes

### Fonctionnalités
- 🔍 **Navigation intelligente** : Menu responsive avec hamburger mobile
- 📊 **Compteurs animés** : Statistiques avec animation au scroll
- 🎯 **Filtres portfolio** : Système de filtrage des projets
- 📋 **Formulaire de contact** : Validation complète avec notifications
- ❓ **FAQ interactive** : Accordéon avec animations
- 🗺️ **Carte Google Maps** : Intégration de la localisation
- ⬆️ **Bouton scroll to top** : Retour en haut de page fluide

### Performance & SEO
- ⚡ **Chargement rapide** : CSS optimisé, lazy loading images
- 🔍 **SEO friendly** : Meta tags, structure sémantique
- ♿ **Accessibilité** : ARIA labels, navigation au clavier
- 📐 **Code propre** : Organisation modulaire, commentaires détaillés

## 📁 Structure du Projet

```
website/
├── index.html              # Page d'accueil
├── services.html           # Page des services
├── realisations.html       # Portfolio avec filtres
├── about.html              # À propos de l'agence
├── contact.html            # Page de contact avec formulaire
├── css/
│   └── style.css          # Styles principaux (mobile-first)
├── js/
│   └── main.js            # JavaScript avec animations
├── images/
│   ├── portfolio/         # Images des projets
│   └── avatars/           # Photos équipe et témoignages
└── README.md              # Ce fichier
```

## 🚀 Installation & Démarrage

### Option 1 : Serveur local simple

```bash
# Avec Python 3
cd website
python -m http.server 8000

# Avec Python 2
python -m SimpleHTTPServer 8000

# Avec Node.js (http-server)
npx http-server -p 8000
```

Ensuite, ouvrez votre navigateur à : `http://localhost:8000`

### Option 2 : Ouvrir directement

Double-cliquez simplement sur `index.html` pour ouvrir dans votre navigateur par défaut.

### Option 3 : Live Server (VS Code)

1. Installer l'extension "Live Server" dans VS Code
2. Clic droit sur `index.html`
3. Sélectionner "Open with Live Server"

## 🎨 Personnalisation

### Couleurs

Modifiez les couleurs dans `css/style.css` (lignes 15-25) :

```css
:root {
    --primary: #FF6B35;      /* Orange principal */
    --secondary: #F7931E;    /* Orange secondaire */
    --accent: #E63946;       /* Rouge accent */
    --dark: #1a1a2e;         /* Texte foncé */
    --light: #FFF8F3;        /* Fond clair */
}
```

### Contenu

#### Informations de contact

Remplacez dans tous les fichiers HTML (footer et contact.html) :

```html
<!-- Adresse -->
123 Avenue des Champs-Élysées, 75008 Paris

<!-- Email -->
contact@windsit.com

<!-- Téléphone -->
+33 1 23 45 67 89
```

#### Images

Ajoutez vos images dans les dossiers appropriés :

```
images/
├── portfolio/
│   ├── branding-1.jpg        # Projets identité visuelle
│   ├── ecommerce-1.jpg       # Sites e-commerce
│   ├── app-1.jpg             # Applications mobiles
│   ├── social-1.jpg          # Projets social media
│   ├── erp-1.jpg             # Solutions ERP
│   └── ai-1.jpg              # Projets IA
└── avatars/
    ├── client-1.jpg          # Témoignages clients
    └── team-1.jpg            # Photos équipe
```

**Dimensions recommandées :**
- Portfolio : 800x600px (format paysage)
- Avatars clients : 150x150px (carré)
- Photos équipe : 500x500px (carré)

### Textes et Services

Modifiez le contenu directement dans les fichiers HTML :

- **index.html** : Page d'accueil, hero section, services preview
- **services.html** : Description détaillée des services
- **realisations.html** : Projets avec résultats et témoignages
- **about.html** : Histoire, équipe, valeurs
- **contact.html** : Formulaire et informations de contact

## 🎯 Fonctionnalités JavaScript

### Navigation Mobile

```javascript
// Menu hamburger automatique sur mobile
// Fermeture automatique au clic sur un lien
```

### Compteurs Animés

```javascript
// Animation des chiffres au scroll
// Utilise Intersection Observer
```

### Filtres Portfolio

```javascript
// Filtrage des projets par catégorie
// Animation smooth lors du changement
```

### Formulaire de Contact

```javascript
// Validation complète
// Notifications de succès/erreur
// Support email regex
```

### Effets Visuels

```javascript
// Parallax sur certains éléments
// Tilt effect sur les cartes (desktop)
// Cursor follower personnalisé (desktop)
// Lazy loading des images
```

## 📱 Responsive Design

Le site s'adapte automatiquement à toutes les tailles d'écran :

- **Mobile** : < 768px (menu hamburger, colonnes simples)
- **Tablet** : 768px - 1024px (grilles 2 colonnes)
- **Desktop** : > 1024px (grilles 3 colonnes, effets avancés)

### Breakpoints

```css
/* Mobile First - styles par défaut pour mobile */

@media (min-width: 768px) {
    /* Tablet */
}

@media (min-width: 1024px) {
    /* Desktop */
}
```

## 🔧 Technologies Utilisées

### Frontend
- **HTML5** : Structure sémantique
- **CSS3** : Flexbox, Grid, Animations, Transitions
- **JavaScript (Vanilla)** : Pas de framework, code optimisé
- **Font Awesome 6** : Icônes modernes
- **AOS Library** : Animate On Scroll

### CDN Utilisés
```html
<!-- Font Awesome Icons -->
https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css

<!-- AOS Animations -->
https://unpkg.com/aos@2.3.1/dist/aos.css
https://unpkg.com/aos@2.3.1/dist/aos.js
```

## 🎨 Guide des Animations

### AOS (Animate On Scroll)

Ajoutez des animations simplement :

```html
<div data-aos="fade-up">Contenu</div>
<div data-aos="fade-left" data-aos-delay="100">Contenu décalé</div>
<div data-aos="zoom-in" data-aos-duration="1000">Animation longue</div>
```

**Types d'animations disponibles :**
- `fade-up`, `fade-down`, `fade-left`, `fade-right`
- `zoom-in`, `zoom-out`
- `flip-left`, `flip-right`
- `slide-up`, `slide-down`

**Options :**
- `data-aos-delay="100"` : Délai en ms
- `data-aos-duration="1000"` : Durée en ms
- `data-aos-once="true"` : Animation une seule fois

### CSS Animations

```css
/* Fade In Up */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Utilisation */
.element {
    animation: fadeInUp 0.6s ease-out;
}
```

## 📧 Configuration du Formulaire de Contact

Le formulaire actuel est en mode simulation. Pour l'activer :

### Option 1 : Formspree (Gratuit, facile)

```html
<form action="https://formspree.io/f/YOUR_ID" method="POST">
    <!-- Vos champs -->
</form>
```

### Option 2 : EmailJS

```javascript
// Dans main.js, remplacez la fonction submitForm
emailjs.send("service_id", "template_id", formData)
    .then(response => {
        showNotification('Message envoyé !', 'success');
    });
```

### Option 3 : Backend personnalisé (PHP, Node.js, etc.)

Créez un endpoint API et modifiez `main.js` :

```javascript
fetch('/api/contact', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(formData)
})
```

## 🌐 Déploiement

### GitHub Pages (Gratuit)

1. Créez un repo GitHub
2. Uploadez les fichiers
3. Allez dans Settings > Pages
4. Sélectionnez la branche `main`
5. Votre site sera sur : `username.github.io/repo-name`

### Netlify (Gratuit, recommandé)

```bash
# Installer Netlify CLI
npm install -g netlify-cli

# Déployer
cd website
netlify deploy --prod
```

### Vercel (Gratuit)

```bash
# Installer Vercel CLI
npm install -g vercel

# Déployer
cd website
vercel --prod
```

### Hébergement classique (OVH, Ionos, etc.)

1. Connectez-vous via FTP
2. Uploadez tous les fichiers
3. Assurez-vous que `index.html` est à la racine

## 🔍 SEO - Optimisation

### Meta Tags à personnaliser

Dans chaque page HTML, modifiez :

```html
<meta name="description" content="Votre description">
<meta property="og:title" content="Titre pour réseaux sociaux">
<meta property="og:description" content="Description">
<meta property="og:image" content="URL de l'image de preview">
<meta name="twitter:card" content="summary_large_image">
```

### Fichiers supplémentaires recommandés

**robots.txt** (à la racine) :
```
User-agent: *
Allow: /
Sitemap: https://votre-domaine.com/sitemap.xml
```

**sitemap.xml** (à générer) :
Utilisez des outils en ligne ou des générateurs automatiques.

## ♿ Accessibilité

Le site respecte les standards WCAG :

- ✅ Navigation au clavier
- ✅ ARIA labels sur les liens et boutons
- ✅ Contraste des couleurs conforme
- ✅ Images avec attributs `alt`
- ✅ Structure HTML sémantique
- ✅ Focus visible sur les éléments interactifs

### Tests d'accessibilité

```bash
# Lighthouse (intégré à Chrome DevTools)
# Ou en ligne : web.dev/measure

# WAVE Tool
# wave.webaim.org
```

## 🐛 Dépannage

### Les animations ne fonctionnent pas

- Vérifiez que la bibliothèque AOS est bien chargée
- Ouvrez la console (F12) pour voir les erreurs
- Assurez-vous d'avoir une connexion internet (pour les CDN)

### Les images ne s'affichent pas

- Vérifiez les chemins d'accès (relatifs vs absolus)
- Assurez-vous que les images existent dans le dossier
- Vérifiez l'extension (jpg, png, etc.)

### Le formulaire ne fonctionne pas

- C'est normal ! Il est en mode simulation
- Suivez la section "Configuration du Formulaire" ci-dessus
- Vérifiez la console pour les erreurs JavaScript

### Le site est lent

- Optimisez vos images (compression, format WebP)
- Activez la mise en cache côté serveur
- Minifiez CSS et JavaScript en production

## 📞 Support

Pour toute question ou problème :

- 📧 Email : contact@windsit.com
- 💬 Issues GitHub : [Créer une issue]
- 📱 Téléphone : +33 1 23 45 67 89

## 📄 Licence

© 2025 WindsIT. Tous droits réservés.

Ce code est fourni à titre d'exemple. Vous pouvez l'utiliser et le modifier pour vos propres projets.

## 🎉 Crédits

- **Design & Développement** : WindsIT Team
- **Icons** : Font Awesome
- **Animations** : AOS Library
- **Polices** : System fonts (Segoe UI, Inter, Poppins)

---

**Développé avec ❤️ par WindsIT**

*Transformez votre vision digitale en réalité* 🚀

