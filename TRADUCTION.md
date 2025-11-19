# 🌍 Système de Traduction WindsIT

## Vue d'ensemble

Le site WindsIT intègre un système de traduction multilingue supportant **3 langues** :
- 🇫🇷 **Français** (langue par défaut)
- 🇬🇧 **Anglais**
- 🇪🇸 **Espagnol**

## Fonctionnalités

✅ **Sélecteur de langue** dans la barre de navigation  
✅ **Traduction automatique** des éléments marqués  
✅ **Sauvegarde de la préférence** dans le navigateur (localStorage)  
✅ **Changement instantané** sans rechargement de page  

## Comment ça fonctionne

### 1. Fichier de traductions (`js/translations.js`)

Toutes les traductions sont centralisées dans ce fichier :

```javascript
const translations = {
    fr: {
        nav_home: "Accueil",
        nav_services: "Services",
        // ... autres traductions
    },
    en: {
        nav_home: "Home",
        nav_services: "Services",
        // ... autres traductions
    },
    es: {
        nav_home: "Inicio",
        nav_services: "Servicios",
        // ... autres traductions
    }
};
```

### 2. Marquage des éléments HTML

Pour qu'un élément soit traduit, ajoutez l'attribut `data-i18n` avec la clé de traduction :

```html
<a href="index.html" class="nav-link" data-i18n="nav_home">Accueil</a>
```

### 3. Sélecteur de langue

Le sélecteur doit être ajouté dans chaque page, dans la navigation :

```html
<li class="language-selector">
    <i class="fas fa-globe"></i>
    <select id="languageSelector">
        <option value="fr">Français</option>
        <option value="en">English</option>
        <option value="es">Español</option>
    </select>
</li>
```

### 4. Chargement des scripts

Les scripts doivent être chargés dans cet ordre :

```html
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="js/translations.js"></script>
<script src="js/main.js"></script>
```

## Ajouter des traductions

### Étape 1 : Ajouter les clés dans `translations.js`

```javascript
const translations = {
    fr: {
        // ... traductions existantes
        new_key: "Nouveau texte en français",
    },
    en: {
        // ... traductions existantes
        new_key: "New text in English",
    },
    es: {
        // ... traductions existantes
        new_key: "Nuevo texto en español",
    }
};
```

### Étape 2 : Marquer l'élément HTML

```html
<h2 data-i18n="new_key">Nouveau texte en français</h2>
```

## Pages actuellement traduites

✅ **index.html** (Page d'accueil)
- Navigation
- Section héro
- Footer

## Pages à traduire

Pour ajouter la traduction aux autres pages, suivez ces étapes :

1. Ajoutez le sélecteur de langue dans la navigation
2. Ajoutez l'attribut `data-i18n` aux éléments à traduire
3. Chargez le script `translations.js`
4. Ajoutez les clés de traduction dans `translations.js` si nécessaire

### Exemple pour la page Contact

```html
<!-- Navigation avec sélecteur de langue -->
<ul class="nav-menu" id="nav-menu">
    <!-- ... liens -->
    <li class="language-selector">
        <i class="fas fa-globe"></i>
        <select id="languageSelector">
            <option value="fr">Français</option>
            <option value="en">English</option>
            <option value="es">Español</option>
        </select>
    </li>
</ul>

<!-- Éléments traduits -->
<h1>
    <span data-i18n="contact_hero_title">Contactez</span>
    <span class="gradient-text" data-i18n="contact_hero_title_gradient">nous</span>
</h1>

<!-- Scripts -->
<script src="js/translations.js"></script>
<script src="js/main.js"></script>
```

## API du gestionnaire de langues

### LanguageManager.setLanguage(lang)
Change la langue du site.

```javascript
LanguageManager.setLanguage('en'); // Change en anglais
```

### LanguageManager.t(key)
Récupère une traduction par sa clé.

```javascript
const translation = LanguageManager.t('nav_home'); // Retourne "Home" si langue = en
```

### LanguageManager.currentLang
Langue actuellement active.

```javascript
console.log(LanguageManager.currentLang); // "fr", "en", ou "es"
```

## Conseils

💡 **Gardez les clés cohérentes** : Utilisez un préfixe pour chaque section (ex: `nav_`, `hero_`, `footer_`)  
💡 **Texte par défaut** : Toujours mettre le texte français dans le HTML (langue par défaut)  
💡 **Cas spéciaux** : Pour les placeholders d'input, le système les gère automatiquement  
💡 **Traductions manquantes** : Si une clé n'existe pas, le texte original s'affiche  

## Structure des clés de traduction

```
nav_*           → Navigation
hero_*          → Section héro
services_*      → Section services
cta_*           → Call-to-action
footer_*        → Pied de page
contact_*       → Page contact
about_*         → Page à propos
careers_*       → Page carrières
blog_*          → Page blog
```

## Support et développement futur

Pour ajouter une nouvelle langue :

1. Ajoutez une option dans le sélecteur :
```html
<option value="de">Deutsch</option>
```

2. Ajoutez la langue dans `translations.js` :
```javascript
const translations = {
    fr: { /* ... */ },
    en: { /* ... */ },
    es: { /* ... */ },
    de: {
        nav_home: "Startseite",
        // ... toutes les traductions
    }
};
```

---

**Développé par WindsIT** 🚀

