<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Done Ga bang?' ?> · Done Ga bang?</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                },
            },
        };
    </script>
    <style>
        @keyframes toastIn { from { opacity: 0; transform: translateY(6px); } to { opacity: 1; transform: translateY(0); } }
        .animate-toast-in { animation: toastIn .18s ease-out; }
    </style>
</head>
<body class="bg-slate-50 text-slate-700 text-sm antialiased font-sans">

<div class="min-h-screen flex flex-col">

    <!-- Top navbar -->
    <header class="h-12 bg-slate-900 text-white flex items-center px-4 gap-4 shrink-0 relative z-20">
        <button type="button" id="sidebarToggle" aria-label="Buka menu"
                class="p-1.5 -ml-1 rounded hover:bg-slate-800 active:scale-95 transition text-slate-300 sm:hidden">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                <path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            </svg>
        </button>

        <div class="flex items-center gap-2 shrink-0 sm:w-56">
            <svg class="w-6 h-6 text-blue-400" viewBox="0 0 24 24" fill="none">
                <rect x="3" y="3" width="18" height="18" rx="5" fill="currentColor" opacity="0.15"/>
                <path d="M8 12.5L10.5 15 16 9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="font-semibold tracking-tight">Done Ga bang?</span>
        </div>

        <div class="flex-1 max-w-sm">
            <div class="relative">
                <svg class="w-4 h-4 text-slate-400 absolute left-2.5 top-1/2 -translate-y-1/2" viewBox="0 0 24 24" fill="none">
                    <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"/>
                    <path d="M21 21l-4.3-4.3" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
                <input id="searchInput" type="text" placeholder="Cari murid..."
                       class="w-full bg-slate-800 text-slate-200 placeholder-slate-500 text-sm rounded-md pl-9 pr-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-slate-700 transition-colors">
            </div>
        </div>

        <div class="flex-1"></div>

        <button type="button" class="p-1.5 rounded hover:bg-slate-800 text-slate-300" title="Notifikasi">
            <svg class="w-4.5 h-4.5" width="18" height="18" viewBox="0 0 24 24" fill="none">
                <path d="M18 8a6 6 0 10-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                <path d="M9.5 20a2.5 2.5 0 005 0" stroke="currentColor" stroke-width="1.8"/>
            </svg>
        </button>
        <div class="w-7 h-7 rounded-full bg-blue-500 flex items-center justify-center text-xs font-semibold shrink-0">R</div>
    </header>

    <div class="flex flex-1 min-h-0">

        <!-- Overlay (mobile only, shown while sidebar is open) -->
        <div id="sidebarOverlay" onclick="toggleSidebar(false)"
             class="fixed inset-0 bg-slate-900/40 z-20 hidden sm:hidden"></div>

        <!-- Sidebar -->
        <aside id="sidebar"
               class="fixed sm:static top-12 sm:top-auto left-0 bottom-0 w-56 bg-white border-r border-slate-200 shrink-0 flex flex-col z-30 -translate-x-full sm:translate-x-0 transition-transform duration-200 ease-in-out shadow-xl sm:shadow-none">
            <nav class="p-3 space-y-0.5">
                <p class="px-2.5 pt-2 pb-1.5 text-xs font-semibold text-slate-400 uppercase tracking-wide">Menu</p>

                <a href="index.php"
                   class="flex items-center gap-2.5 px-2.5 py-2 rounded-md text-sm transition-colors <?= ($active ?? '') === 'dashboard' ? 'bg-blue-50 text-blue-700 font-medium' : 'text-slate-600 hover:bg-slate-50' ?>">
                    <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none">
                        <rect x="3" y="3" width="7" height="9" rx="1.5" stroke="currentColor" stroke-width="1.8"/>
                        <rect x="14" y="3" width="7" height="5" rx="1.5" stroke="currentColor" stroke-width="1.8"/>
                        <rect x="14" y="12" width="7" height="9" rx="1.5" stroke="currentColor" stroke-width="1.8"/>
                        <rect x="3" y="16" width="7" height="5" rx="1.5" stroke="currentColor" stroke-width="1.8"/>
                    </svg>
                    Dashboard
                </a>

                <a href="tambah.php"
                   class="flex items-center gap-2.5 px-2.5 py-2 rounded-md text-sm transition-colors <?= ($active ?? '') === 'tambah' ? 'bg-blue-50 text-blue-700 font-medium' : 'text-slate-600 hover:bg-slate-50' ?>">
                    <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/>
                        <path d="M12 8v8M8 12h8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                    </svg>
                    Tambah Murid
                </a>
            </nav>

            <div class="mt-auto p-3 text-xs text-slate-400 border-t border-slate-100">
                Done Ga bang? &middot; XI RPL 3
            </div>
        </aside>

        <!-- Main content -->
        <main class="flex-1 overflow-y-auto">
            <div class="max-w-5xl mx-auto px-6 py-6">
