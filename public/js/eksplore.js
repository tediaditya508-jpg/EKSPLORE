/**
 * EKSPLORE - shared UI behaviour
 * - mencegah submit ganda
 * - memberi feedback loading pada tombol
 * - auto-dismiss pesan sukses
 * - menutup sidebar mobile dengan Escape / klik overlay
 */
(function () {
    'use strict';

    function ready(callback) {
        if (document.readyState !== 'loading') {
            callback();
            return;
        }

        document.addEventListener('DOMContentLoaded', callback);
    }

    ready(function () {
        // -------------------------------------------------
        // 1. Auto-dismiss pesan sukses
        // -------------------------------------------------
        document.querySelectorAll('.success, .alert-success, [data-auto-dismiss]').forEach(function (element) {
            window.setTimeout(function () {
                element.classList.add('is-hiding');
                window.setTimeout(function () {
                    element.remove();
                }, 350);
            }, 5000);
        });

        // -------------------------------------------------
        // 2. Loading state & cegah submit ganda
        // -------------------------------------------------
        document.querySelectorAll('form').forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (event.defaultPrevented || form.dataset.submitting === 'true') {
                    event.preventDefault();
                    return;
                }

                var button = event.submitter || form.querySelector('button[type="submit"], input[type="submit"]');

                if (!button || button.dataset.noLoading === 'true') {
                    return;
                }

                form.dataset.submitting = 'true';

                window.setTimeout(function () {
                    if (button.tagName === 'INPUT') {
                        button.value = 'Memproses...';
                    } else {
                        button.dataset.originalHtml = button.innerHTML;
                        button.innerHTML = '<span class="btn-spinner" aria-hidden="true"></span>Memproses...';
                    }

                    button.disabled = true;
                    button.setAttribute('aria-busy', 'true');
                }, 0);
            });
        });

        // -------------------------------------------------
        // 3. Sidebar mobile: Escape & scroll lock
        // -------------------------------------------------
        var sidebar = document.getElementById('appSidebar');
        var overlay = document.getElementById('sidebarOverlay');

        function closeMobileSidebar() {
            if (!sidebar) {
                return;
            }

            sidebar.classList.remove('mobile-open');

            if (overlay) {
                overlay.classList.remove('show');
            }

            document.body.classList.remove('eksplore-nav-open');
        }

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeMobileSidebar();
            }
        });

        if (overlay) {
            overlay.addEventListener('click', closeMobileSidebar);
        }

        if (sidebar && 'MutationObserver' in window) {
            var observer = new MutationObserver(function () {
                var isOpen = sidebar.classList.contains('mobile-open') && window.innerWidth <= 900;
                document.body.classList.toggle('eksplore-nav-open', isOpen);
            });

            observer.observe(sidebar, { attributes: true, attributeFilter: ['class'] });

            window.addEventListener('resize', function () {
                if (window.innerWidth > 900) {
                    closeMobileSidebar();
                }
            });
        }
    });
})();
