/**
 * EKSPLORE - shared sidebar navigation
 * Desktop : collapse / expand sidebar, remember preference.
 * Mobile  : open / close drawer with overlay, Escape, and link click.
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
        var sidebar = document.getElementById('appSidebar');
        var overlay = document.getElementById('appSidebarOverlay');
        var toggleButton = document.getElementById('appSidebarToggle');
        var openButton = document.getElementById('appSidebarOpen');

        if (!sidebar) {
            return;
        }

        var storageKey = 'eksplore-sidebar-collapsed';

        function isMobile() {
            return window.innerWidth <= 900;
        }

        function closeMobileSidebar() {
            sidebar.classList.remove('app-mobile-open');

            if (overlay) {
                overlay.classList.remove('app-show');
            }

            document.body.classList.remove('app-nav-open');

            if (openButton) {
                openButton.setAttribute('aria-expanded', 'false');
            }
        }

        function openMobileSidebar() {
            sidebar.classList.add('app-mobile-open');

            if (overlay) {
                overlay.classList.add('app-show');
            }

            document.body.classList.add('app-nav-open');

            if (openButton) {
                openButton.setAttribute('aria-expanded', 'true');
            }
        }

        function toggleSidebar() {
            if (isMobile()) {
                if (sidebar.classList.contains('app-mobile-open')) {
                    closeMobileSidebar();
                } else {
                    openMobileSidebar();
                }

                return;
            }

            var isCollapsed = document.body.classList.toggle('app-sidebar-collapsed');

            try {
                window.localStorage.setItem(storageKey, isCollapsed ? '1' : '0');
            } catch (error) {
                /* localStorage can be unavailable in private mode. */
            }
        }

        if (toggleButton) {
            toggleButton.addEventListener('click', toggleSidebar);
        }

        if (openButton) {
            openButton.addEventListener('click', toggleSidebar);
        }

        if (overlay) {
            overlay.addEventListener('click', closeMobileSidebar);
        }

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeMobileSidebar();
            }
        });

        sidebar.querySelectorAll('.app-sidebar-link').forEach(function (link) {
            link.addEventListener('click', function () {
                if (isMobile()) {
                    closeMobileSidebar();
                }
            });
        });

        try {
            if (!isMobile() && window.localStorage.getItem(storageKey) === '1') {
                document.body.classList.add('app-sidebar-collapsed');
            }
        } catch (error) {
            /* Ignore unavailable storage. */
        }

        window.addEventListener('resize', function () {
            if (!isMobile()) {
                closeMobileSidebar();
            }
        });
    });
})();
