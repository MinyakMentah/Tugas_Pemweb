            </div>
        </main>
    </div>
</div>

<!-- Toast container -->
<div id="toastContainer" class="fixed bottom-4 right-4 z-50 flex flex-col gap-2 items-end"></div>

<!-- Custom confirm dialog (replaces native confirm()) -->
<div id="confirmModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/40 p-4">
    <div class="bg-white rounded-lg shadow-xl max-w-sm w-full p-5">
        <h3 class="text-sm font-semibold text-slate-900 mb-1">Hapus data?</h3>
        <p id="confirmModalText" class="text-sm text-slate-500 mb-4">Data yang dihapus tidak bisa dikembalikan.</p>
        <div class="flex justify-end gap-2">
            <button type="button" id="confirmCancel"
                    class="px-3 py-1.5 text-sm rounded-md text-slate-600 hover:bg-slate-100 active:scale-95 transition">Batal</button>
            <button type="button" id="confirmOk"
                    class="px-3 py-1.5 text-sm rounded-md bg-red-600 text-white hover:bg-red-700 active:scale-95 transition">Hapus</button>
        </div>
    </div>
</div>

<script>
// Search filter
(function () {
    var input = document.getElementById('searchInput');
    var rows = document.querySelectorAll('[data-row]');
    if (!input || !rows.length) return;
    input.addEventListener('input', function () {
        var q = this.value.toLowerCase();
        rows.forEach(function (row) {
            row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
        });
    });
})();

// Mobile sidebar toggle
function toggleSidebar(show) {
    var sidebar = document.getElementById('sidebar');
    var overlay = document.getElementById('sidebarOverlay');
    if (!sidebar || !overlay) return;
    sidebar.classList.toggle('-translate-x-full', !show);
    overlay.classList.toggle('hidden', !show);
}
(function () {
    var btn = document.getElementById('sidebarToggle');
    if (!btn) return;
    btn.addEventListener('click', function () {
        var sidebar = document.getElementById('sidebar');
        toggleSidebar(sidebar.classList.contains('-translate-x-full'));
    });
})();

// Toast notification
function showToast(message, type) {
    var container = document.getElementById('toastContainer');
    if (!container) return;
    var colors = { success: 'bg-emerald-600', error: 'bg-red-600', info: 'bg-slate-800' };
    var toast = document.createElement('div');
    toast.className = 'text-white text-sm px-4 py-2.5 rounded-md shadow-lg animate-toast-in ' + (colors[type] || colors.info);
    toast.textContent = message;
    container.appendChild(toast);
    setTimeout(function () {
        toast.style.transition = 'opacity .2s, transform .2s';
        toast.style.opacity = '0';
        toast.style.transform = 'translateY(4px)';
        setTimeout(function () { toast.remove(); }, 200);
    }, 2600);
}

// Custom confirm dialog, triggered by [data-confirm] links
(function () {
    var modal = document.getElementById('confirmModal');
    var textEl = document.getElementById('confirmModalText');
    var okBtn = document.getElementById('confirmOk');
    var cancelBtn = document.getElementById('confirmCancel');
    var pendingHref = null;

    function openModal(href, text) {
        pendingHref = href;
        if (text) textEl.textContent = text;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }
    function closeModal() {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        pendingHref = null;
    }

    document.querySelectorAll('[data-confirm]').forEach(function (el) {
        el.addEventListener('click', function (e) {
            e.preventDefault();
            openModal(el.getAttribute('href'), el.getAttribute('data-confirm'));
        });
    });

    cancelBtn.addEventListener('click', closeModal);
    modal.addEventListener('click', function (e) { if (e.target === modal) closeModal(); });
    okBtn.addEventListener('click', function () {
        if (pendingHref) window.location.href = pendingHref;
    });
})();

// Loading state on form submit buttons
document.querySelectorAll('form').forEach(function (form) {
    form.addEventListener('submit', function () {
        var btn = form.querySelector('button[type="submit"]');
        if (!btn || btn.disabled) return;
        btn.disabled = true;
        btn.dataset.originalText = btn.innerHTML;
        btn.classList.add('opacity-80', 'cursor-not-allowed');
        btn.innerHTML =
            '<svg class="w-4 h-4 animate-spin inline" viewBox="0 0 24 24" fill="none">' +
            '<circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2.5" stroke-opacity="0.25"/>' +
            '<path d="M21 12a9 9 0 00-9-9" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>' +
            '</svg> Menyimpan&hellip;';
    });
});
</script>
</body>
</html>
