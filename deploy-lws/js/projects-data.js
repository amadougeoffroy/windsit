/* ==========================================
   Projects Data for WindsIT Portfolio
   ========================================== */

const projectsData = {
    project1: {
        id: "project1",
        title: "Rebranding TechStart",
        category: "Identité Visuelle",
        client: "TechStart Inc.",
        duration: "4 semaines",
        year: "2024",
        description: "Création complète d'une nouvelle identité visuelle moderne et impactante pour une startup technologique en pleine croissance. Le projet incluait la conception du logo, de la charte graphique et de tous les supports de communication.",
        image: "images/portfolio/project-1.svg",
        challenge: "TechStart souhaitait se démarquer dans un secteur hautement compétitif tout en conservant une image professionnelle et innovante. L'ancien logo ne reflétait plus les valeurs et l'ambition de l'entreprise.",
        solution: "Nous avons créé une identité visuelle audacieuse basée sur des formes géométriques modernes et une palette de couleurs énergique. Le nouveau logo symbolise l'innovation et la croissance, avec des éléments visuels qui évoquent la technologie et le progrès.",
        deliverables: [
            "Logo et variations (couleur, noir & blanc, monochrome)",
            "Charte graphique complète (couleurs, typographies, styles)",
            "Cartes de visite et papeterie",
            "Templates pour réseaux sociaux",
            "Guidelines d'utilisation de la marque",
            "Mockups et présentation"
        ],
        results: [
            "Augmentation de 40% de la notoriété de la marque",
            "Reconnaissance immédiate dans le secteur",
            "Feedback positif de 95% des clients",
            "Cohérence visuelle sur tous les supports",
            "Impact fort lors des événements professionnels"
        ],
        technologies: ["Adobe Illustrator", "Adobe Photoshop", "Figma", "Adobe InDesign"],
        testimonial: {
            text: "WindsIT a parfaitement compris notre vision et l'a transformée en une identité visuelle exceptionnelle. Notre nouvelle image nous a vraiment propulsés vers un nouveau niveau !",
            author: "Sophie Martin",
            position: "CEO, TechStart"
        }
    },
    
    project2: {
        id: "project2",
        title: "Fashion Store E-commerce",
        category: "Site E-commerce",
        client: "Fashion Store",
        duration: "10 semaines",
        year: "2024",
        description: "Développement complet d'une boutique en ligne moderne pour une marque de mode. Site performant avec intégration de paiement sécurisé, gestion de stock et tableau de bord administrateur.",
        image: "images/portfolio/project-2.svg",
        challenge: "Le client avait besoin d'une plateforme e-commerce capable de gérer un large catalogue de produits, d'offrir une excellente expérience utilisateur et de s'intégrer avec leurs systèmes existants.",
        solution: "Nous avons développé un site e-commerce sur mesure avec une interface élégante et intuitive. Le site intègre un système de filtrage avancé, des recommandations personnalisées et un processus de paiement optimisé pour maximiser les conversions.",
        deliverables: [
            "Site e-commerce responsive complet",
            "Catalogue produits avec filtres avancés",
            "Système de paiement sécurisé (Stripe, PayPal)",
            "Espace client personnalisé",
            "Tableau de bord administrateur",
            "Intégration avec système de stock",
            "Module de recommandations",
            "Optimisation SEO complète"
        ],
        results: [
            "+200% de taux de conversion en 3 mois",
            "Temps de chargement < 2 secondes",
            "Taux de rebond réduit de 45%",
            "+150% de visiteurs mensuels",
            "Score Google PageSpeed : 95/100",
            "Panier moyen augmenté de 35%"
        ],
        technologies: ["React", "Node.js", "MongoDB", "Stripe API", "AWS", "Redux"],
        testimonial: {
            text: "Notre site e-commerce a dépassé toutes nos attentes. Les ventes ont explosé et nos clients adorent l'expérience d'achat !",
            author: "Marc Dubois",
            position: "Directeur, Fashion Store"
        }
    },
    
    project3: {
        id: "project3",
        title: "FitTracker App",
        category: "Application Mobile",
        client: "FitTracker",
        duration: "16 semaines",
        year: "2023",
        description: "Application mobile de fitness complète pour iOS et Android. Suivi d'activités, plans d'entraînement personnalisés, nutrition et communauté intégrée.",
        image: "images/portfolio/project-3.svg",
        challenge: "Créer une application engageante qui motive les utilisateurs à maintenir une routine fitness régulière, tout en offrant des fonctionnalités avancées de suivi et de personnalisation.",
        solution: "Développement d'une application mobile native avec React Native, intégrant des fonctionnalités de gamification, des défis communautaires et un système de suivi détaillé des progrès.",
        deliverables: [
            "Application iOS et Android",
            "Suivi d'activités en temps réel",
            "Plans d'entraînement personnalisés",
            "Suivi nutritionnel",
            "Système de défis et récompenses",
            "Intégration avec wearables (Apple Watch, Fitbit)",
            "Chat communautaire",
            "Tableau de bord analytique"
        ],
        results: [
            "50,000+ téléchargements en 6 mois",
            "Note de 4.8/5 sur App Store",
            "Note de 4.7/5 sur Google Play",
            "Taux de rétention de 65% après 30 jours",
            "30,000 utilisateurs actifs mensuels",
            "Durée moyenne de session : 18 minutes"
        ],
        technologies: ["React Native", "Firebase", "Redux", "Node.js", "Health Kit", "Google Fit API"],
        testimonial: {
            text: "WindsIT a créé bien plus qu'une app, ils ont créé une expérience qui transforme vraiment la vie de nos utilisateurs.",
            author: "Amélie Laurent",
            position: "Founder, FitTracker"
        }
    },
    
    project4: {
        id: "project4",
        title: "Campagne BeautyBrand",
        category: "Social Media",
        client: "BeautyBrand",
        duration: "6 mois",
        year: "2024",
        description: "Gestion complète de la présence sur les réseaux sociaux pour une marque de cosmétiques. Stratégie de contenu, création visuelle, community management et publicités ciblées.",
        image: "images/portfolio/project-4.svg",
        challenge: "Augmenter la notoriété de la marque dans un secteur saturé, générer de l'engagement authentique et convertir les followers en clients.",
        solution: "Mise en place d'une stratégie de contenu axée sur l'authenticité et l'éducation. Création de contenu visuel de haute qualité, collaborations avec influenceurs et campagnes publicitaires ciblées.",
        deliverables: [
            "Stratégie de contenu mensuelle",
            "120+ posts créés (photos, vidéos, reels)",
            "Community management quotidien",
            "Campagnes publicitaires sur 4 plateformes",
            "Collaborations avec 15 influenceurs",
            "Reporting mensuel détaillé",
            "Création de templates branded",
            "Gestion de crise et modération"
        ],
        results: [
            "+300% de followers Instagram en 6 mois",
            "Engagement rate passé de 2% à 7%",
            "+250% de trafic vers le site web",
            "ROI publicitaire de 450%",
            "2M+ d'impressions mensuelles",
            "Génération de 500+ leads qualifiés/mois"
        ],
        technologies: ["Adobe Creative Suite", "Canva", "Later", "Meta Business Suite", "Analytics Tools"],
        testimonial: {
            text: "Notre présence sur les réseaux sociaux a été complètement transformée. WindsIT a créé une communauté engagée et fidèle autour de notre marque.",
            author: "Julie Petit",
            position: "Marketing Director, BeautyBrand"
        }
    },
    
    project5: {
        id: "project5",
        title: "LogiPro ERP",
        category: "ERP Sur Mesure",
        client: "LogiPro",
        duration: "24 semaines",
        year: "2023",
        description: "Développement d'un ERP complet pour la gestion d'entreprise de logistique. Gestion des stocks, commandes, facturation, ressources humaines et reporting avancé.",
        image: "images/portfolio/project-5.svg",
        challenge: "Remplacer plusieurs systèmes disparates par une solution unifiée, tout en maintenant les opérations pendant la transition.",
        solution: "Création d'un ERP modulaire sur mesure avec interfaces intuitives et processus automatisés. Migration progressive des données et formation complète des équipes.",
        deliverables: [
            "Module de gestion des stocks en temps réel",
            "Gestion des commandes et facturation",
            "Module RH et planning",
            "Tableau de bord analytique",
            "Gestion des fournisseurs",
            "Système de rapports automatisés",
            "Application mobile compagnon",
            "Formation et documentation complète"
        ],
        results: [
            "40% de gain de productivité",
            "Réduction de 60% des erreurs de stock",
            "Processus de commande 3x plus rapide",
            "ROI atteint en 14 mois",
            "Satisfaction utilisateur : 92%",
            "Économies annuelles : 150k€"
        ],
        technologies: ["Angular", "Python Django", "PostgreSQL", "Docker", "AWS", "Redis"],
        testimonial: {
            text: "Ce système a révolutionné notre façon de travailler. L'efficacité et la visibilité qu'il apporte sont inestimables.",
            author: "Pierre Durand",
            position: "COO, LogiPro"
        }
    },
    
    project6: {
        id: "project6",
        title: "SmartBot Assistant",
        category: "Solution IA",
        client: "CustomerCare Inc.",
        duration: "12 semaines",
        year: "2024",
        description: "Chatbot intelligent avec IA pour service client 24/7. Traitement du langage naturel, apprentissage continu et intégration multi-canaux.",
        image: "images/portfolio/project-6.svg",
        challenge: "Automatiser le service client sans perdre en qualité et en personnalisation. Gérer des requêtes complexes et maintenir la satisfaction client.",
        solution: "Développement d'un chatbot basé sur GPT-4 avec fine-tuning sur les données spécifiques du client. Intégration avec CRM existant et escalade intelligente vers agents humains.",
        deliverables: [
            "Chatbot IA conversationnel",
            "Intégration site web et Facebook Messenger",
            "Dashboard de monitoring",
            "Système d'apprentissage continu",
            "Base de connaissances dynamique",
            "Rapports d'analyse des conversations",
            "Transfert intelligent vers agents",
            "Support multilingue (FR, EN, ES)"
        ],
        results: [
            "70% de requêtes résolues automatiquement",
            "Temps de réponse < 3 secondes",
            "Satisfaction client : 88%",
            "Économie de 200 heures/mois pour le support",
            "Disponibilité 24/7",
            "Réduction de 45% des coûts de support"
        ],
        technologies: ["Python", "OpenAI GPT-4", "TensorFlow", "Node.js", "WebSocket", "MongoDB"],
        testimonial: {
            text: "Le chatbot IA de WindsIT a transformé notre service client. Nos clients obtiennent des réponses instantanées et pertinentes à toute heure.",
            author: "Laurent Mercier",
            position: "Head of Customer Success, CustomerCare"
        }
    }
};

// Function to get project data
function getProjectData(projectId) {
    return projectsData[projectId] || null;
}
