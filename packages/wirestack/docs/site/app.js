const docs = {
  fr: {
    hero: {
      tagline: "Laravel 12 + Livewire 4",
      title: "Documentation complete de Wirestack UI",
      subtitle:
        "Guide officiel multilingue pour installer, configurer, personnaliser et exploiter Wirestack UI dans des projets Laravel 12 modernes.",
      metrics: [
        { value: "70+", label: "Composants Blade" },
        { value: "5", label: "Composants Livewire" },
        { value: "v12", label: "Compatible Laravel" },
        { value: "FR/EN", label: "Langues disponibles" },
      ],
    },
    ui: {
      searchPlaceholder: "Rechercher dans la documentation...",
      clearSearch: "Effacer la recherche",
      navLabel: "Navigation",
      results: (count, total, query) => {
        if (!query) {
          return `${total} sections disponibles`;
        }
        return `${count} sections sur ${total} pour "${query}"`;
      },
      emptyTitle: "Aucun resultat",
      emptyBody:
        "Aucune section ne correspond a votre recherche. Essayez avec des mots comme installation, modal, datatable, theme, Laravel 12.",
      footer:
        "Wirestack UI Documentation Site - Concu pour Laravel 12, Livewire 4 et Tailwind CSS v4.",
    },
    sections: [
      {
        id: "installation",
        title: "Installation",
        summary:
          "Installez rapidement Wirestack dans une application Laravel 12 et activez les assets du package.",
        tags: ["composer", "vite", "assets", "laravel12"],
        items: [
          "Composer: composer require darken10/wirestack",
          "Ajoutez @wsStyles dans head et @wsScripts avant la fermeture de body",
          "Importez les @source Tailwind pour scanner les vues du package",
          "Placez <livewire:ws::toast /> une seule fois dans le layout principal",
          "Optionnel: vendor:publish pour config, vues et assets",
        ],
      },
      {
        id: "quickstart",
        title: "Demarrage rapide",
        summary:
          "Mettez en place une page UI complete en moins de 10 minutes.",
        tags: ["blade", "layout", "components"],
        items: [
          "Construisez une base avec x-ws::container, x-ws::section et x-ws::card",
          "Ajoutez des actions avec x-ws::button variants solid, outline, ghost",
          "Affichez le feedback avec x-ws::alert et x-ws::badge",
          "Creez des formulaires coherents via x-ws::input, x-ws::select, x-ws::textarea",
        ],
      },
      {
        id: "laravel12",
        title: "Integration Laravel 12",
        summary:
          "Bonnes pratiques specifiques a la structure Laravel 12 simplifiee.",
        tags: ["bootstrap/app.php", "middleware", "laravel12"],
        items: [
          "Utilisez bootstrap/app.php pour middleware, exceptions et routing",
          "Les commandes console sont auto-decouvertes, pas de Console Kernel manuel",
          "Gardez les composants Wirestack dans des layouts Blade nommes et reutilisables",
          "Pour les routes web UI, appuyez-vous sur les noms de routes et helpers route()",
        ],
      },
      {
        id: "config",
        title: "Configuration globale",
        summary:
          "Maitrisez config/ws.php pour adapter Wirestack a votre design systeme.",
        tags: ["tokens", "defaults", "theme", "prefix"],
        items: [
          "prefix: ws par defaut, personnalisable pour vos conventions",
          "theme: light, dark ou system selon le comportement voulu",
          "defaults: variantes globales pour button, input, card, alert, modal",
          "toast et datatable: reglez duree, position, options de tri et pagination",
        ],
      },
      {
        id: "tokens",
        title: "Design tokens",
        summary:
          "Unifiez les couleurs, rayons, ombres, transitions et typo via variables CSS.",
        tags: ["css variables", "hsl", "branding"],
        items: [
          "Primary color en HSL: primary-h, primary-s, primary-l",
          "Scale radius: sm, md, lg, xl, 2xl, full",
          "Transitions fast, normal, slow pour un mouvement coherent",
          "Shadows sm a xl pour gerer la profondeur visuelle",
          "Font token global pour harmoniser toutes les pages",
        ],
      },
      {
        id: "components-blade",
        title: "Composants Blade",
        summary:
          "Catalogue complet des composants UI classes par categorie.",
        tags: ["atoms", "forms", "layout", "navigation", "feedback", "interactive"],
        items: [
          "Atomes: button, badge, avatar, spinner, icon, divider",
          "Formulaires: input, textarea, select, checkbox, radio, toggle, range",
          "Layout: card, container, section, stack, inline, panel",
          "Navigation: breadcrumb, pagination, steps, nav, tabs",
          "Feedback: alert, progress, skeleton, empty-state",
          "Interactifs: dropdown, tooltip, popover, accordion, collapsible",
        ],
      },
      {
        id: "components-livewire",
        title: "Composants Livewire",
        summary:
          "Composants reactifs prets a l emploi avec API JS de controle.",
        tags: ["modal", "drawer", "toast", "datatable", "command palette"],
        items: [
          "Modal: ouverture et fermeture avec DsModal.open/close",
          "Drawer: panneau laterral pour actions secondaires",
          "Toast: notifications success, error, warning, info",
          "DataTable: recherche, tri, pagination et slots pour cellules",
          "CommandPalette: raccourci Cmd+K / Ctrl+K pour actions rapides",
        ],
      },
      {
        id: "javascript-api",
        title: "API JavaScript",
        summary:
          "Helpers globaux pour piloter l UX sans recoder la plomberie front.",
        tags: ["DsToast", "DsModal", "DsDrawer", "DsCopy"],
        items: [
          "DsToast.success/error/warning/info(message, options)",
          "DsModal.open(id) et DsModal.close(id)",
          "DsDrawer.open(id) et DsDrawer.close(id)",
          "DsCommandPalette.open() et close()",
          "DsCopy.copy(text, element) pour copier avec feedback utilisateur",
        ],
      },
      {
        id: "theming",
        title: "Theming et mode sombre",
        summary:
          "Support natif light/dark/system et personnalisation de marque avancee.",
        tags: ["dark mode", "theme", "localStorage"],
        items: [
          "theme system pour suivre prefers-color-scheme",
          "Persistance utilisateur via localStorage ws-theme",
          "Toggle manuel avec class dark sur html",
          "Palettes recommandees pour SaaS, dashboard, admin enterprise",
        ],
      },
      {
        id: "accessibility",
        title: "Accessibilite et qualite",
        summary:
          "Objectif: interfaces robustes, lisibles, navigables clavier et mobile.",
        tags: ["a11y", "keyboard", "mobile", "responsive"],
        items: [
          "Toujours associer label/hint/error sur les champs",
          "Verifier les contrastes texte/fond en mode clair et sombre",
          "Tester les interactions au clavier: tab, enter, escape",
          "Conserver de grandes zones tactiles sur smartphone",
          "Limiter le poids visuel et optimiser la lisibilite des grilles",
        ],
      },
      {
        id: "deployment",
        title: "Build et deploiement",
        summary:
          "Checklist production pour publier une UI stable et performante.",
        tags: ["npm run build", "cache", "artisan"],
        items: [
          "Executer npm install puis npm run build pour regenerer les assets",
          "Nettoyer les caches avec php artisan cache:clear si besoin",
          "Verifier migration et seed selon votre pipeline",
          "Confirmer que public/build/manifest.json existe avant de deployer",
        ],
      },
    ],
  },
  en: {
    hero: {
      tagline: "Laravel 12 + Livewire 4",
      title: "Complete Wirestack UI Documentation",
      subtitle:
        "Official multilingual guide to install, configure, customize, and scale Wirestack UI in modern Laravel 12 projects.",
      metrics: [
        { value: "70+", label: "Blade components" },
        { value: "5", label: "Livewire components" },
        { value: "v12", label: "Laravel support" },
        { value: "FR/EN", label: "Available languages" },
      ],
    },
    ui: {
      searchPlaceholder: "Search documentation...",
      clearSearch: "Clear search",
      navLabel: "Navigation",
      results: (count, total, query) => {
        if (!query) {
          return `${total} available sections`;
        }
        return `${count} sections out of ${total} for "${query}"`;
      },
      emptyTitle: "No results",
      emptyBody:
        "No section matches your search. Try keywords such as installation, modal, datatable, theme, Laravel 12.",
      footer:
        "Wirestack UI Documentation Site - Built for Laravel 12, Livewire 4 and Tailwind CSS v4.",
    },
    sections: [
      {
        id: "installation",
        title: "Installation",
        summary:
          "Set up Wirestack quickly in a Laravel 12 app and enable package assets.",
        tags: ["composer", "vite", "assets", "laravel12"],
        items: [
          "Composer: composer require darken10/wirestack",
          "Add @wsStyles in head and @wsScripts before closing body",
          "Import Tailwind @source entries to scan package Blade views",
          "Mount <livewire:ws::toast /> once in your root layout",
          "Optional: vendor:publish config, views, and static assets",
        ],
      },
      {
        id: "quickstart",
        title: "Quickstart",
        summary:
          "Build a complete UI page in under 10 minutes.",
        tags: ["blade", "layout", "components"],
        items: [
          "Start with x-ws::container, x-ws::section, and x-ws::card",
          "Add actions with x-ws::button solid, outline, and ghost variants",
          "Display feedback with x-ws::alert and x-ws::badge",
          "Create coherent forms using x-ws::input, x-ws::select, and x-ws::textarea",
        ],
      },
      {
        id: "laravel12",
        title: "Laravel 12 integration",
        summary:
          "Best practices aligned with Laravel 12 streamlined app structure.",
        tags: ["bootstrap/app.php", "middleware", "laravel12"],
        items: [
          "Use bootstrap/app.php for middleware, exception handling, and routing",
          "Console commands are auto-discovered, no manual Console Kernel",
          "Keep Wirestack components inside reusable named Blade layouts",
          "Prefer named routes and route() helpers for app navigation",
        ],
      },
      {
        id: "config",
        title: "Global configuration",
        summary:
          "Control config/ws.php to adapt Wirestack to your design language.",
        tags: ["tokens", "defaults", "theme", "prefix"],
        items: [
          "prefix: ws by default, customizable to your conventions",
          "theme: choose light, dark, or system behavior",
          "defaults: set shared variants for button, input, card, alert, modal",
          "toast and datatable: tune duration, position, sorting and pagination",
        ],
      },
      {
        id: "tokens",
        title: "Design tokens",
        summary:
          "Unify colors, radii, shadows, transitions, and typography through CSS variables.",
        tags: ["css variables", "hsl", "branding"],
        items: [
          "Primary color in HSL: primary-h, primary-s, primary-l",
          "Radius scale: sm, md, lg, xl, 2xl, full",
          "Fast, normal, and slow transitions for consistent motion",
          "Shadow levels from sm to xl for controlled visual depth",
          "Global font token to keep all screens aligned",
        ],
      },
      {
        id: "components-blade",
        title: "Blade components",
        summary:
          "Full UI component catalog organized by practical categories.",
        tags: ["atoms", "forms", "layout", "navigation", "feedback", "interactive"],
        items: [
          "Atoms: button, badge, avatar, spinner, icon, divider",
          "Forms: input, textarea, select, checkbox, radio, toggle, range",
          "Layout: card, container, section, stack, inline, panel",
          "Navigation: breadcrumb, pagination, steps, nav, tabs",
          "Feedback: alert, progress, skeleton, empty-state",
          "Interactive: dropdown, tooltip, popover, accordion, collapsible",
        ],
      },
      {
        id: "components-livewire",
        title: "Livewire components",
        summary:
          "Reactive building blocks with a practical JavaScript control API.",
        tags: ["modal", "drawer", "toast", "datatable", "command palette"],
        items: [
          "Modal: open and close with DsModal.open/close",
          "Drawer: sliding panel for secondary actions",
          "Toast: success, error, warning, and info notifications",
          "DataTable: search, sorting, pagination, and cell slots",
          "CommandPalette: Cmd+K / Ctrl+K keyboard driven actions",
        ],
      },
      {
        id: "javascript-api",
        title: "JavaScript API",
        summary:
          "Global helpers to drive UX without rewriting plumbing code.",
        tags: ["DsToast", "DsModal", "DsDrawer", "DsCopy"],
        items: [
          "DsToast.success/error/warning/info(message, options)",
          "DsModal.open(id) and DsModal.close(id)",
          "DsDrawer.open(id) and DsDrawer.close(id)",
          "DsCommandPalette.open() and close()",
          "DsCopy.copy(text, element) for clipboard with visual feedback",
        ],
      },
      {
        id: "theming",
        title: "Theming and dark mode",
        summary:
          "Built-in light/dark/system support with advanced brand customization.",
        tags: ["dark mode", "theme", "localStorage"],
        items: [
          "Use system theme to follow prefers-color-scheme",
          "Persist user choice with ws-theme localStorage key",
          "Manual switch by toggling dark class on html",
          "Recommended palettes for SaaS, dashboards, and enterprise admin",
        ],
      },
      {
        id: "accessibility",
        title: "Accessibility and quality",
        summary:
          "Target robust, readable, keyboard-friendly, and mobile-first interfaces.",
        tags: ["a11y", "keyboard", "mobile", "responsive"],
        items: [
          "Always pair labels, hints, and errors on form controls",
          "Validate color contrast in both light and dark modes",
          "Test keyboard paths: tab, enter, and escape",
          "Keep touch targets comfortably large on phones",
          "Reduce visual noise and optimize content legibility",
        ],
      },
      {
        id: "deployment",
        title: "Build and deployment",
        summary:
          "Production checklist for shipping a stable and performant UI.",
        tags: ["npm run build", "cache", "artisan"],
        items: [
          "Run npm install then npm run build to regenerate assets",
          "Clear caches with php artisan cache:clear when needed",
          "Validate migrations and seeds in your deployment pipeline",
          "Ensure public/build/manifest.json exists before deployment",
        ],
      },
    ],
  },
};

const state = {
  lang: "fr",
  query: "",
};

const elements = {
  desktopNav: document.getElementById("desktopNav"),
  mobileNav: document.getElementById("mobileNav"),
  contentGrid: document.getElementById("contentGrid"),
  searchInput: document.getElementById("searchInput"),
  resultsText: document.getElementById("resultsText"),
  clearSearch: document.getElementById("clearSearch"),
  heroTagline: document.getElementById("heroTagline"),
  heroTitle: document.getElementById("heroTitle"),
  heroSubtitle: document.getElementById("heroSubtitle"),
  heroMetrics: document.getElementById("heroMetrics"),
  emptyState: document.getElementById("emptyState"),
  emptyTitle: document.getElementById("emptyTitle"),
  emptyBody: document.getElementById("emptyBody"),
  footerText: document.getElementById("footerText"),
  menuButton: document.getElementById("menuButton"),
  closeMenuButton: document.getElementById("closeMenuButton"),
  mobileDrawer: document.getElementById("mobileDrawer"),
  langButtons: Array.from(document.querySelectorAll(".lang-btn")),
};

function normalize(text) {
  return text
    .toLowerCase()
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "");
}

function getFilteredSections() {
  const current = docs[state.lang];
  const query = normalize(state.query.trim());

  if (!query) {
    return current.sections;
  }

  return current.sections.filter((section) => {
    const blob = normalize(
      [section.title, section.summary, section.tags.join(" "), section.items.join(" ")].join(" "),
    );
    return blob.includes(query);
  });
}

function navLink(section) {
  return `<a href="#${section.id}">${section.title}</a>`;
}

function sectionCard(section) {
  const chips = section.tags.map((tag) => `<span class="doc-chip">${tag}</span>`).join("");
  const items = section.items.map((item) => `<li>${item}</li>`).join("");

  return `
    <article id="${section.id}" class="doc-card" data-id="${section.id}">
      <h2>${section.title}</h2>
      <p>${section.summary}</p>
      <div class="doc-meta">${chips}</div>
      <ul class="doc-list">${items}</ul>
    </article>
  `;
}

function renderHero() {
  const current = docs[state.lang];
  const { hero } = current;

  elements.heroTagline.textContent = hero.tagline;
  elements.heroTitle.textContent = hero.title;
  elements.heroSubtitle.textContent = hero.subtitle;

  elements.heroMetrics.innerHTML = hero.metrics
    .map(
      (metric) =>
        `<div class="metric"><strong>${metric.value}</strong><span>${metric.label}</span></div>`,
    )
    .join("");
}

function renderNavigation(filteredSections) {
  elements.desktopNav.innerHTML = filteredSections.map(navLink).join("");
  elements.mobileNav.innerHTML = filteredSections.map(navLink).join("");
}

function renderContent() {
  const current = docs[state.lang];
  const filteredSections = getFilteredSections();

  renderHero();
  renderNavigation(filteredSections);

  elements.contentGrid.innerHTML = filteredSections.map(sectionCard).join("");

  elements.searchInput.placeholder = current.ui.searchPlaceholder;
  elements.clearSearch.textContent = current.ui.clearSearch;
  elements.resultsText.textContent = current.ui.results(
    filteredSections.length,
    current.sections.length,
    state.query,
  );

  elements.emptyTitle.textContent = current.ui.emptyTitle;
  elements.emptyBody.textContent = current.ui.emptyBody;
  elements.footerText.textContent = current.ui.footer;

  const hasResults = filteredSections.length > 0;
  elements.emptyState.hidden = hasResults;
  elements.contentGrid.hidden = !hasResults;
}

function setLanguage(lang) {
  if (!docs[lang]) {
    return;
  }

  state.lang = lang;
  elements.langButtons.forEach((button) => {
    button.classList.toggle("is-active", button.dataset.lang === lang);
  });

  document.documentElement.lang = lang;
  renderContent();
}

function setSearchQuery(value) {
  state.query = value;
  renderContent();

  if (!value.trim()) {
    return;
  }

  const firstCard = document.querySelector(".doc-card");
  if (firstCard) {
    firstCard.classList.add("is-highlight");
    window.setTimeout(() => firstCard.classList.remove("is-highlight"), 700);
  }
}

function closeDrawer() {
  elements.mobileDrawer.classList.remove("is-open");
  elements.mobileDrawer.setAttribute("aria-hidden", "true");
  elements.menuButton.setAttribute("aria-expanded", "false");
}

function openDrawer() {
  elements.mobileDrawer.classList.add("is-open");
  elements.mobileDrawer.setAttribute("aria-hidden", "false");
  elements.menuButton.setAttribute("aria-expanded", "true");
}

function setupListeners() {
  elements.langButtons.forEach((button) => {
    button.addEventListener("click", () => {
      setLanguage(button.dataset.lang);
    });
  });

  elements.searchInput.addEventListener("input", (event) => {
    setSearchQuery(event.target.value);
  });

  elements.clearSearch.addEventListener("click", () => {
    elements.searchInput.value = "";
    setSearchQuery("");
    elements.searchInput.focus();
  });

  elements.menuButton.addEventListener("click", openDrawer);
  elements.closeMenuButton.addEventListener("click", closeDrawer);

  document.addEventListener("click", (event) => {
    if (!elements.mobileDrawer.classList.contains("is-open")) {
      return;
    }

    const clickInsideDrawer = elements.mobileDrawer.contains(event.target);
    const clickOnMenuButton = elements.menuButton.contains(event.target);

    if (!clickInsideDrawer && !clickOnMenuButton) {
      closeDrawer();
    }
  });

  [elements.desktopNav, elements.mobileNav].forEach((container) => {
    container.addEventListener("click", () => {
      closeDrawer();
    });
  });
}

setupListeners();
renderContent();
