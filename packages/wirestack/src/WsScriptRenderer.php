<?php

namespace Wirestack\Ui;

class WsScriptRenderer
{
    public function render(): string
    {
        return <<<'HTML'
<script>
/* DS UI — Toast dispatcher */
window.DsToast = {
    dispatch(type, message, options = {}) {
        window.dispatchEvent(new CustomEvent('ds-toast', {
            detail: { type, message, ...options }
        }));
    },
    success(message, options = {}) { this.dispatch('success', message, options); },
    error(message, options = {})   { this.dispatch('error', message, options); },
    warning(message, options = {}) { this.dispatch('warning', message, options); },
    info(message, options = {})    { this.dispatch('info', message, options); },
};
/* DS UI — Modal helper */
window.DsModal = {
    open(id)  { window.dispatchEvent(new CustomEvent(`ds-modal-open:${id}`)); },
    close(id) { window.dispatchEvent(new CustomEvent(`ds-modal-close:${id}`)); },
};
/* DS UI — Drawer helper */
window.DsDrawer = {
    open(id)  { window.dispatchEvent(new CustomEvent(`ds-drawer-open:${id}`)); },
    close(id) { window.dispatchEvent(new CustomEvent(`ds-drawer-close:${id}`)); },
};
/* DS UI — Command Palette helper */
window.DsCommandPalette = {
    open()  { window.dispatchEvent(new Event('ds-command-palette-open')); },
    close() { window.dispatchEvent(new Event('ds-command-palette-close')); },
};
/* DS UI — Clipboard helper */
window.DsCopy = {
    async copy(text, el) {
        try {
            await navigator.clipboard.writeText(text);
            if (el) {
                const original = el.innerHTML;
                el.innerHTML = '✓ Copied!';
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
/* DS UI — Keyboard shortcut: Cmd/Ctrl+K → command palette */
document.addEventListener('keydown', (e) => {
    if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
        e.preventDefault();
        window.DsCommandPalette.open();
    }
});
</script>
HTML;
    }
}
