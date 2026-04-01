/* ============================================================
   DS UI — JavaScript helpers
   Designed for Alpine.js + Livewire 4
   ============================================================ */

/* ---------- Toast dispatcher ---------- */
window.DsToast = {
    dispatch(type, message, options = {}) {
        window.dispatchEvent(new CustomEvent('ds-toast', {
            detail: { type, message, ...options },
        }));
    },
    success(msg, opts = {}) { this.dispatch('success', msg, opts); },
    error(msg, opts = {})   { this.dispatch('error', msg, opts); },
    warning(msg, opts = {}) { this.dispatch('warning', msg, opts); },
    info(msg, opts = {})    { this.dispatch('info', msg, opts); },
};

/* ---------- Modal helpers ---------- */
window.DsModal = {
    open(id)  { window.dispatchEvent(new CustomEvent(`ds-modal-open:${id}`)); },
    close(id) { window.dispatchEvent(new CustomEvent(`ds-modal-close:${id}`)); },
};

/* ---------- Drawer helpers ---------- */
window.DsDrawer = {
    open(id)  { window.dispatchEvent(new CustomEvent(`ds-drawer-open:${id}`)); },
    close(id) { window.dispatchEvent(new CustomEvent(`ds-drawer-close:${id}`)); },
};

/* ---------- Command Palette helpers ---------- */
window.DsCommandPalette = {
    open()  { window.dispatchEvent(new Event('ds-command-palette-open')); },
    close() { window.dispatchEvent(new Event('ds-command-palette-close')); },
};

/* ---------- Clipboard helper ---------- */
window.DsCopy = {
    async copy(text, el) {
        try {
            await navigator.clipboard.writeText(text);
            if (el) {
                const original = el.innerHTML;
                el.innerHTML   = '✓ Copied!';
                el.classList.add('text-emerald-600');
                setTimeout(() => {
                    el.innerHTML = original;
                    el.classList.remove('text-emerald-600');
                }, 1500);
            }
            return true;
        } catch {
            return false;
        }
    },
};

/* ---------- Keyboard shortcut: Cmd/Ctrl+K → command palette ---------- */
document.addEventListener('keydown', (e) => {
    if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
        e.preventDefault();
        window.DsCommandPalette.open();
    }
});
