<?php

namespace Ds\Ui;

class DsScriptRenderer
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
</script>
HTML;
    }
}
