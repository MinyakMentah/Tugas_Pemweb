<?php
    $title = 'Tambah Murid';
    $active = 'tambah';
    include 'includes/header.php';
?>

<a href="index.php" class="text-sm text-slate-500 hover:text-blue-600 inline-flex items-center gap-1 mb-4">
    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
        <path d="M19 12H5M11 18l-6-6 6-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    Kembali ke Dashboard
</a>

<div class="max-w-lg bg-white border border-slate-200 rounded-lg p-6">
    <h1 class="text-base font-semibold text-slate-900 mb-1">Tambah Murid</h1>
    <p class="text-sm text-slate-500 mb-5">Isi data murid baru di bawah ini.</p>

    <form action="create.php" method="POST" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-slate-600 mb-1">Nama Lengkap</label>
            <input type="text" name="nama" required
                   class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-600 mb-1">NIS</label>
            <input type="number" name="nis" required
                   class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-600 mb-1">Alamat</label>
            <input type="text" name="alamat" required
                   class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-600 mb-1">Kelas</label>
            <input type="text" name="kelas" required
                   class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <button type="submit"
                class="w-full rounded-md bg-blue-600 text-white text-sm font-medium py-2 hover:bg-blue-700 active:scale-[0.98] transition">
            Simpan
        </button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
