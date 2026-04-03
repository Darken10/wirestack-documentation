<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Wirestack UI Documentation</title>
  <meta name="description" content="Documentation complete de Wirestack UI: installation, composants Blade, Livewire, theming, API JavaScript." />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&family=Manrope:wght@400;500;700;800&display=swap" rel="stylesheet" />
  @php
      $docsCss = file_get_contents(resource_path('css/wirestack-docs.css'));
      $docsJs = file_get_contents(resource_path('js/wirestack-docs.js'));
  @endphp
  <style>{!! $docsCss !!}</style>
</head>
<body>
  <div class="bg-noise" aria-hidden="true"></div>
  <header class="topbar">
    <a class="brand" href="#top" aria-label="Wirestack documentation home">
      <span class="brand-mark">WS</span>
      <span class="brand-text">Wirestack Docs</span>
    </a>

    <button id="menuButton" class="icon-btn menu-btn" aria-label="Open navigation" aria-expanded="false">☰</button>

    <nav id="desktopNav" class="desktop-nav" aria-label="Main navigation"></nav>

    <div class="topbar-actions">
      <label class="search-field" for="searchInput">
        <span class="search-icon" aria-hidden="true">⌕</span>
        <input id="searchInput" type="search" placeholder="Search docs..." autocomplete="off" />
      </label>

      <div class="lang-switch" role="group" aria-label="Language switch">
        <button class="lang-btn is-active" data-lang="fr" type="button">FR</button>
        <button class="lang-btn" data-lang="en" type="button">EN</button>
      </div>
    </div>
  </header>

  <aside id="mobileDrawer" class="mobile-drawer" aria-label="Mobile navigation" aria-hidden="true">
    <div class="drawer-header">
      <strong>Documentation</strong>
      <button id="closeMenuButton" class="icon-btn" aria-label="Close navigation">✕</button>
    </div>
    <nav id="mobileNav" class="mobile-nav"></nav>
  </aside>

  <main id="top" class="page">
    <section class="hero">
      <p id="heroTagline" class="hero-tagline"></p>
      <h1 id="heroTitle"></h1>
      <p id="heroSubtitle" class="hero-subtitle"></p>
      <div class="hero-metrics" id="heroMetrics"></div>
    </section>

    <section class="results-bar">
      <p id="resultsText"></p>
      <button id="clearSearch" class="ghost-btn" type="button">Clear search</button>
    </section>

    <section id="contentGrid" class="content-grid" aria-live="polite"></section>

    <section id="emptyState" class="empty-state" hidden>
      <h2 id="emptyTitle"></h2>
      <p id="emptyBody"></p>
    </section>
  </main>

  <footer class="footer">
    <p id="footerText"></p>
  </footer>
  <script>{!! $docsJs !!}</script>
</body>
</html>
