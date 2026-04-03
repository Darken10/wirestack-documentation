const docs = {
  fr: {
    hero: {
      tagline: "Laravel 12 + Livewire 4",
      title: "Documentation complete de Wirestack UI",
      subtitle:
        "Reference complete pour construire une interface Laravel 12 professionnelle avec Wirestack: architecture, composants, theming, accessibilite, tests et deploiement.",
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
      results: (count, total, query) => {
        if (!query) {
          return `${total} sections disponibles`;
        }
        return `${count} sections sur ${total} pour \"${query}\"`;
      },
      emptyTitle: "Aucun resultat",
      emptyBody:
        "Aucune section ne correspond a votre recherche. Essayez des mots cles comme installation, config, modal, datatable, tokens, deployment.",
      footer:
        "Wirestack UI Documentation - Laravel 12, Livewire 4, Tailwind CSS v4.",
    },
    sections: [
      {
        id: "prerequis",
        title: "Prerequis et compatibilite",
        summary:
          "Validez l environnement technique et les versions requises avant integration.",
        tags: ["php", "laravel12", "livewire4", "tailwind4"],
        items: [
          "PHP 8.2+ minimum, recommande 8.4 en production",
          "Laravel 11 ou 12, structure moderne avec bootstrap/app.php",
          "Livewire 4 requis pour les composants reactifs ws::*",
          "Tailwind CSS v4 recommande pour un rendu coherent des styles",
          "Node et npm necessaires pour compiler les assets frontend",
          "Verifier que le package est present dans composer.lock",
          "En CI/CD, verifier aussi public/build/manifest.json",
        ],
      },
      {
        id: "installation",
        title: "Installation",
        summary:
          "Procedure complete: package, assets, directives Blade et composants globaux.",
        tags: ["composer", "vite", "wsStyles", "wsScripts"],
        items: [
          "Installer le package: composer require darken10/wirestack",
          "Ajouter @wsStyles dans head pour injecter les design tokens",
          "Ajouter @wsScripts avant </body> pour les helpers JS",
          "Configurer @source Tailwind vers vues Blade et classes PHP du package",
          "Monter <livewire:ws::toast /> une fois dans le layout principal",
          "Publier config/ws.php avec vendor:publish --tag=ws-config",
          "Publier les vues override via --tag=ws-views si personnalisation",
          "Publier assets statiques via --tag=ws-assets si pas de Vite",
        ],
      },
      {
        id: "quickstart",
        title: "Demarrage rapide",
        summary:
          "Mise en place d une page complete en quelques blocs Wirestack.",
        tags: ["container", "card", "button", "form"],
        items: [
          "Structure de page: container + section + card",
          "Actions primaires/secondaires: button solid, outline, ghost",
          "Feedback utilisateur: alert + badge + progress",
          "Formulaire standardise: input, select, textarea, toggle",
          "Navigation UI: breadcrumb + tabs + pagination",
          "Etat vide: empty-state quand aucune donnee",
          "Placeholders de chargement: skeleton pendant fetch async",
        ],
      },
      {
        id: "laravel12",
        title: "Integration Laravel 12",
        summary:
          "Bonnes pratiques specifiques au cycle de vie Laravel 12.",
        tags: ["bootstrap/app.php", "routes", "middleware", "views"],
        items: [
          "Configurer middleware et exceptions dans bootstrap/app.php",
          "Routes web UI dans routes/web.php avec noms explicites",
          "Conserver une convention de layouts Blade reutilisables",
          "Eviter les logiques lourdes dans les vues, utiliser actions/services",
          "Utiliser route() partout pour les liens internes",
          "Verifier auth/verified sur pages necessitant securite",
          "Tester chaque route publique par un test Feature",
        ],
      },
      {
        id: "configuration",
        title: "Configuration detaillee",
        summary:
          "Reference de config/ws.php: prefix, theme, tokens et defaults.",
        tags: ["config/ws.php", "prefix", "defaults", "theme"],
        items: [
          "prefix: controle le namespace des composants (ws par defaut)",
          "theme: light, dark, system selon votre politique UI",
          "tokens: primaire HSL, rayons, typos, ombres, transitions",
          "defaults: valeurs globales de button, input, card, badge",
          "options toast: position, duree, style",
          "options datatable: pagination, tri par defaut, densite",
          "Toujours vider le cache config apres changement critique",
        ],
      },
      {
        id: "design-tokens",
        title: "Design tokens et theming",
        summary:
          "Personnalisez le design system sans toucher aux composants internes.",
        tags: ["css variables", "hsl", "radius", "font"],
        items: [
          "Primary hue/saturation/lightness pour branding central",
          "Echelle radius sm..2xl pour coherence des angles",
          "Font globale via token font-sans",
          "Transitions fast/normal/slow pour uniformite des animations",
          "Shadows sm/md/lg/xl pour hierarchie visuelle",
          "Theme sombre: class dark sur html + preference utilisateur",
          "Stockage preference theme en localStorage (ws-theme)",
        ],
      },
      {
        id: "blade-atoms",
        title: "Reference composants Atomes",
        summary:
          "Button, badge, avatar, spinner, icon, divider, copy-button, kbd.",
        tags: ["atoms", "button", "badge", "avatar"],
        items: [
          "Button: variants solid/outline/ghost/soft/link",
          "Button: colors primary/secondary/neutral/success/warning/danger",
          "Button: states loading/disabled/full/square",
          "Badge: variant soft/solid/outline avec dot, icon, dismiss",
          "Avatar: initials fallback, image src, status online/busy/away",
          "AvatarGroup: limite d avatars + compteur overflow",
          "Spinner/Icon/Kbd pour micro interactions et lisibilite",
        ],
      },
      {
        id: "blade-forms",
        title: "Reference composants Formulaires",
        summary:
          "Input, textarea, select, checkbox, radio, toggle, range et composition.",
        tags: ["forms", "input", "validation", "wire:model"],
        items: [
          "Input avec label, hint, error et icones leading/trailing",
          "Prefix/suffix pour devise, URL, unite metrique",
          "Textarea avec autoresize pour meilleure UX mobile",
          "Select avec options et placeholder",
          "Checkbox/Radio/Toggle relies aux FormRequest Laravel",
          "Range pour controles de valeurs progressives",
          "Toujours lier erreurs serveur via $errors->first(name)",
          "Support natif wire:model pour formulaires Livewire",
        ],
      },
      {
        id: "blade-layout",
        title: "Reference Layout et Navigation",
        summary:
          "Card, container, section, stack, inline, nav, breadcrumb, steps, tabs.",
        tags: ["layout", "navigation", "card", "tabs"],
        items: [
          "Card + header/body/footer pour structurer les blocs",
          "Container pour controler largeur max et centrage",
          "Section pour titres, sous-titres et espacement vertical",
          "Stack/Inline pour alignements flex reutilisables",
          "Breadcrumb pour hierarchie de pages",
          "Pagination standalone hors datatable",
          "Tabs/Steps pour experiences multi-etapes",
        ],
      },
      {
        id: "blade-feedback",
        title: "Reference Feedback et affichage de donnees",
        summary:
          "Alert, progress, progress-bar, skeleton, stat, table, timeline, code.",
        tags: ["feedback", "table", "stat", "skeleton"],
        items: [
          "Alert contextuel info/success/warning/danger",
          "Progress simple et progress-bar multi segments",
          "Skeleton pour etats de chargement asynchrones",
          "Stat et StatGroup pour KPI dashboard",
          "Table statique pour datasets deja prepares",
          "Timeline pour historique d evenements",
          "Code/Kbd/Chip pour presentation technique",
        ],
      },
      {
        id: "blade-interactive",
        title: "Reference Interactifs",
        summary:
          "Dropdown, tooltip, popover, accordion, collapsible et overlays.",
        tags: ["interactive", "dropdown", "tooltip", "popover"],
        items: [
          "Dropdown avec trigger custom, alignement et separators",
          "DropdownItem avec etat danger et disabled",
          "Tooltip positions top/right/bottom/left",
          "Popover pour contenu riche et actions contextuelles",
          "Accordion pour FAQ et sections compactes",
          "Collapsible pour repli dynamique d informations",
          "Integration Alpine prete a l emploi",
        ],
      },
      {
        id: "livewire-components",
        title: "Reference composants Livewire",
        summary:
          "Modal, drawer, toast, datatable et command-palette en detail.",
        tags: ["livewire", "modal", "drawer", "datatable", "toast"],
        items: [
          "Modal: ouverture via event ou DsModal.open(id)",
          "Drawer: panneau lateral pour actions secondaires",
          "Toast: files de notifications centralisees",
          "DataTable: recherche, tri, pagination, slots cellules",
          "CommandPalette: actions clavier Cmd+K / Ctrl+K",
          "Gestion des props et events cote composant",
          "Tester chaque composant Livewire avec interactions reelles",
        ],
      },
      {
        id: "javascript-api",
        title: "API JavaScript",
        summary:
          "Helpers globaux: toast, modal, drawer, command palette, copy.",
        tags: ["DsToast", "DsModal", "DsDrawer", "DsCommandPalette", "DsCopy"],
        items: [
          "DsToast.success/error/warning/info(message, {title,duration})",
          "DsModal.open(id) / DsModal.close(id)",
          "DsDrawer.open(id) / DsDrawer.close(id)",
          "DsCommandPalette.open() / close()",
          "DsCopy.copy(text, element) retourne true/false",
          "Toujours inclure @wsScripts pour enregistrer ces helpers",
          "Centraliser les appels dans des handlers front reutilisables",
        ],
      },
      {
        id: "accessibilite",
        title: "Accessibilite et UX",
        summary:
          "Checklist pratique pour un rendu inclusif et utilisable sur mobile.",
        tags: ["a11y", "keyboard", "contrast", "mobile"],
        items: [
          "Associer label, hint et message d erreur a chaque champ",
          "Contrastes minimum WCAG sur light et dark mode",
          "Navigation clavier complete: tab, shift+tab, enter, escape",
          "Focus visible sur boutons, liens, tabs et inputs",
          "Targets tactiles suffisantes (minimum 44px) sur mobile",
          "Lang attribut html coherent avec la langue active",
          "Eviter animations agressives et respecter prefer-reduced-motion",
        ],
      },
      {
        id: "tests",
        title: "Tests et assurance qualite",
        summary:
          "Strategie de tests Laravel/Pest pour securiser la documentation UI.",
        tags: ["pest", "feature", "livewire test", "qa"],
        items: [
          "Feature test pour chaque page publique essentielle",
          "Tests Livewire pour modal/drawer/toast/datatable",
          "Assertions de contenu critique et etats d erreur",
          "Tester la presence de routes nommees",
          "Valider les regressions UI majeures apres release",
          "Executer tests cibles avant deploy puis suite complete en CI",
          "Documenter les scenarios de non regression",
        ],
      },
      {
        id: "performance",
        title: "Performance et optimisation",
        summary:
          "Bonnes pratiques pour garder une interface rapide et stable.",
        tags: ["vite", "cache", "lazy", "bundle"],
        items: [
          "Minifier assets CSS/JS en build production",
          "Eviter surcharge de composants dans une meme vue",
          "Paginer les tables volumineuses via datatable",
          "Utiliser skeleton au lieu de blocs vides pendant chargement",
          "Nettoyer classes utilitaires inutiles dans templates",
          "Surveiller taille du bundle frontend apres ajout de features",
          "Mesurer TTFB et render initial sur pages critiques",
        ],
      },
      {
        id: "deployment",
        title: "Deploiement et operations",
        summary:
          "Checklist operationnelle pour publier sans casser l interface.",
        tags: ["deploy", "npm run build", "artisan", "rollback"],
        items: [
          "composer install puis npm install sur la cible",
          "npm run build pour regenerer le manifest Vite",
          "php artisan cache:clear puis route:cache/config:cache si besoin",
          "php artisan migrate sous controle de version",
          "Verifier symlink storage et permissions fichiers",
          "Tester route wirestack-docs apres deploiement",
          "Prevoir rollback rapide en cas d incident visuel",
        ],
      },
      {
        id: "maintenance",
        title: "Maintenance et evolution",
        summary:
          "Process pour garder la doc a jour avec le package Wirestack.",
        tags: ["changelog", "versioning", "backward compatibility"],
        items: [
          "Mettre a jour la doc a chaque nouveau composant",
          "Synchroniser les props avec la source package",
          "Conserver un changelog de documentation",
          "Indiquer les ruptures de compatibilite clairement",
          "Taguer les features par version minimale requise",
          "Reviser periodicement les exemples de code",
          "Prevoir revue de doc avant chaque release publique",
        ],
      },
    ],
  },
  en: {
    hero: {
      tagline: "Laravel 12 + Livewire 4",
      title: "Complete Wirestack UI Documentation",
      subtitle:
        "Comprehensive reference to build production-grade Laravel 12 interfaces with Wirestack: architecture, components, theming, accessibility, testing, and deployment.",
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
      results: (count, total, query) => {
        if (!query) {
          return `${total} available sections`;
        }
        return `${count} sections out of ${total} for \"${query}\"`;
      },
      emptyTitle: "No results",
      emptyBody:
        "No section matches your search. Try keywords like installation, config, modal, datatable, tokens, deployment.",
      footer:
        "Wirestack UI Documentation - Laravel 12, Livewire 4, Tailwind CSS v4.",
    },
    sections: [
      {
        id: "prerequisites",
        title: "Prerequisites and compatibility",
        summary:
          "Validate runtime versions and tooling before integrating Wirestack.",
        tags: ["php", "laravel12", "livewire4", "tailwind4"],
        items: [
          "Minimum PHP 8.2, recommended PHP 8.4 for production",
          "Laravel 11/12 supported with modern bootstrap/app.php setup",
          "Livewire 4 required for ws::* reactive components",
          "Tailwind CSS v4 recommended for consistent rendering",
          "Node and npm required for frontend asset compilation",
          "Verify package resolution in composer.lock",
          "In CI/CD, validate public/build/manifest.json presence",
        ],
      },
      {
        id: "installation",
        title: "Installation",
        summary:
          "End-to-end setup: package install, directives, assets, and globals.",
        tags: ["composer", "vite", "wsStyles", "wsScripts"],
        items: [
          "Install package: composer require darken10/wirestack",
          "Add @wsStyles in head to inject design tokens",
          "Add @wsScripts before </body> for global JS helpers",
          "Configure Tailwind @source paths for package Blade and PHP",
          "Mount <livewire:ws::toast /> once in root layout",
          "Publish config with vendor:publish --tag=ws-config",
          "Publish views overrides via --tag=ws-views when needed",
          "Publish static assets via --tag=ws-assets when skipping Vite",
        ],
      },
      {
        id: "quickstart",
        title: "Quickstart",
        summary:
          "Build a complete page quickly using reusable Wirestack blocks.",
        tags: ["container", "card", "button", "form"],
        items: [
          "Page skeleton with container + section + card",
          "Primary and secondary actions with button variants",
          "User feedback with alert, badge, and progress",
          "Standardized forms with input, select, textarea, toggle",
          "Navigation with breadcrumb, tabs, and pagination",
          "Empty-state rendering when no records exist",
          "Skeleton placeholders during async loading",
        ],
      },
      {
        id: "laravel12",
        title: "Laravel 12 integration",
        summary:
          "Best practices aligned with Laravel 12 application lifecycle.",
        tags: ["bootstrap/app.php", "routes", "middleware", "views"],
        items: [
          "Configure middleware and exceptions in bootstrap/app.php",
          "Keep web UI routes in routes/web.php with explicit names",
          "Use reusable named Blade layouts for consistency",
          "Avoid heavy logic in views, move to actions/services",
          "Prefer route() helper for internal links",
          "Apply auth/verified middleware where required",
          "Cover each public UI route with Feature tests",
        ],
      },
      {
        id: "configuration",
        title: "Detailed configuration",
        summary:
          "Reference for config/ws.php: prefix, theme, defaults, and tokens.",
        tags: ["config/ws.php", "prefix", "defaults", "theme"],
        items: [
          "prefix controls component namespace (ws by default)",
          "theme supports light, dark, and system modes",
          "tokens include primary HSL, radii, font, shadows, transitions",
          "defaults centralize props for button/input/card/badge",
          "toast options: position, duration, and style",
          "datatable options: pagination, sorting, density",
          "Clear config cache after major configuration changes",
        ],
      },
      {
        id: "design-tokens",
        title: "Design tokens and theming",
        summary:
          "Customize global UI behavior without modifying internals.",
        tags: ["css variables", "hsl", "radius", "font"],
        items: [
          "Primary hue/saturation/lightness drives brand color",
          "Radius scale sm..2xl keeps corners consistent",
          "Global font token aligns typography across screens",
          "Transition tokens standardize motion behavior",
          "Shadow levels sm/md/lg/xl define visual hierarchy",
          "Dark mode via html.dark class strategy",
          "Persist user theme with localStorage ws-theme key",
        ],
      },
      {
        id: "blade-atoms",
        title: "Atoms component reference",
        summary:
          "Button, badge, avatar, spinner, icon, divider, copy-button, kbd.",
        tags: ["atoms", "button", "badge", "avatar"],
        items: [
          "Button variants: solid, outline, ghost, soft, link",
          "Button colors: primary, secondary, neutral, success, warning, danger",
          "Button states: loading, disabled, full, square",
          "Badge variants and semantic color states",
          "Avatar image + initials fallback + status indicators",
          "AvatarGroup max rendering with overflow counter",
          "Spinner/Icon/Kbd for micro interactions and readability",
        ],
      },
      {
        id: "blade-forms",
        title: "Forms component reference",
        summary:
          "Input, textarea, select, checkbox, radio, toggle, range, and composition.",
        tags: ["forms", "input", "validation", "wire:model"],
        items: [
          "Input with label, hint, error, and leading/trailing icons",
          "Prefix/suffix for currency, URL, and unit conventions",
          "Textarea autoresize for better mobile comfort",
          "Select with placeholder and controlled options",
          "Checkbox/Radio/Toggle integrated with FormRequest rules",
          "Range for progressive value controls",
          "Bind server errors with $errors->first(field)",
          "Native support for wire:model and Livewire reactivity",
        ],
      },
      {
        id: "blade-layout",
        title: "Layout and navigation reference",
        summary:
          "Card, container, section, stack, inline, nav, breadcrumb, steps, tabs.",
        tags: ["layout", "navigation", "card", "tabs"],
        items: [
          "Card header/body/footer for clean information structure",
          "Container controls max width and horizontal rhythm",
          "Section standardizes titles and spacing",
          "Stack/Inline simplify reusable flex alignment",
          "Breadcrumb supports clear page hierarchy",
          "Standalone pagination outside Livewire datatable",
          "Tabs/Steps for multi-step interaction flows",
        ],
      },
      {
        id: "blade-feedback",
        title: "Feedback and data-display reference",
        summary:
          "Alert, progress, skeleton, stat, table, timeline, and code blocks.",
        tags: ["feedback", "table", "stat", "skeleton"],
        items: [
          "Semantic alerts for info/success/warning/danger",
          "Progress and segmented progress-bar patterns",
          "Skeleton placeholders for loading states",
          "Stat and StatGroup for dashboard KPIs",
          "Static Table for pre-processed datasets",
          "Timeline for chronological activity rendering",
          "Code/Kbd/Chip helpers for developer-oriented screens",
        ],
      },
      {
        id: "blade-interactive",
        title: "Interactive reference",
        summary:
          "Dropdown, tooltip, popover, accordion, collapsible, and overlays.",
        tags: ["interactive", "dropdown", "tooltip", "popover"],
        items: [
          "Dropdown with custom trigger and alignment options",
          "DropdownItem supports danger and disabled states",
          "Tooltip supports top/right/bottom/left placement",
          "Popover for richer contextual content and actions",
          "Accordion for FAQ and compact documentation blocks",
          "Collapsible for progressive disclosure patterns",
          "Alpine-ready interaction model out of the box",
        ],
      },
      {
        id: "livewire-components",
        title: "Livewire components reference",
        summary:
          "Detailed guide for modal, drawer, toast, datatable, command-palette.",
        tags: ["livewire", "modal", "drawer", "datatable", "toast"],
        items: [
          "Modal opened via events or DsModal.open(id)",
          "Drawer for side-panel secondary workflows",
          "Toast queue for centralized notifications",
          "DataTable with search, sort, pagination, and slots",
          "CommandPalette with Cmd+K/Ctrl+K keyboard entry",
          "Explicit prop and event contracts per component",
          "Livewire tests for open/close/filter/sort interactions",
        ],
      },
      {
        id: "javascript-api",
        title: "JavaScript API",
        summary:
          "Global helpers: toast, modal, drawer, command palette, clipboard.",
        tags: ["DsToast", "DsModal", "DsDrawer", "DsCommandPalette", "DsCopy"],
        items: [
          "DsToast.success/error/warning/info(message, {title,duration})",
          "DsModal.open(id) and DsModal.close(id)",
          "DsDrawer.open(id) and DsDrawer.close(id)",
          "DsCommandPalette.open() and close()",
          "DsCopy.copy(text, element) returns boolean status",
          "Always include @wsScripts to register all helpers",
          "Centralize helper usage in dedicated frontend handlers",
        ],
      },
      {
        id: "accessibility",
        title: "Accessibility and UX",
        summary:
          "Practical checklist for inclusive and mobile-first interfaces.",
        tags: ["a11y", "keyboard", "contrast", "mobile"],
        items: [
          "Pair each control with label, hint, and error text",
          "Validate WCAG contrast in light and dark themes",
          "Keyboard navigation: tab, shift+tab, enter, escape",
          "Visible focus style on links, buttons, inputs, and tabs",
          "Touch targets at least 44px on phones",
          "Sync html lang attribute with active language",
          "Respect reduced-motion preference for animation-sensitive users",
        ],
      },
      {
        id: "testing",
        title: "Testing and quality assurance",
        summary:
          "Laravel/Pest testing strategy for robust UI documentation pages.",
        tags: ["pest", "feature", "livewire test", "qa"],
        items: [
          "Feature tests for each public and critical page",
          "Livewire tests for modal/drawer/toast/datatable behavior",
          "Assert key content and fallback states",
          "Assert named route availability and response codes",
          "Run targeted tests pre-deploy and full suite in CI",
          "Track non-regression scenarios for release stability",
          "Review test coverage when adding new docs sections",
        ],
      },
      {
        id: "performance",
        title: "Performance optimization",
        summary:
          "Keep interface rendering fast and stable across devices.",
        tags: ["vite", "cache", "lazy", "bundle"],
        items: [
          "Minify CSS/JS in production builds",
          "Avoid over-rendering many heavy components per screen",
          "Paginate large datasets with datatable",
          "Use skeletons instead of blank blocks while loading",
          "Prune dead utility classes in templates",
          "Monitor bundle size after major feature additions",
          "Measure TTFB and first paint for critical routes",
        ],
      },
      {
        id: "deployment",
        title: "Deployment and operations",
        summary:
          "Operational checklist for safe production rollout.",
        tags: ["deploy", "npm run build", "artisan", "rollback"],
        items: [
          "Run composer install then npm install on target",
          "Run npm run build to regenerate Vite manifest",
          "Use php artisan cache:clear and optional config/route cache",
          "Run php artisan migrate with controlled release process",
          "Verify storage symlink and file permissions",
          "Smoke-test wirestack-docs route after deployment",
          "Prepare quick rollback procedure for visual incidents",
        ],
      },
      {
        id: "maintenance",
        title: "Maintenance and evolution",
        summary:
          "Keep docs synchronized with Wirestack package releases.",
        tags: ["changelog", "versioning", "compatibility"],
        items: [
          "Update docs whenever a new component lands",
          "Synchronize prop lists with source implementation",
          "Maintain a documentation changelog",
          "Clearly mark breaking changes and migration notes",
          "Tag features with minimum compatible version",
          "Review examples periodically for accuracy",
          "Schedule a documentation QA pass before each release",
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
