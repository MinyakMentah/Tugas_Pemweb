<?php
    include 'koneksi-db.php';
    include 'includes/functions.php';
    $title = 'Dashboard';
    $active = 'dashboard';
    include 'includes/header.php';

    $data = mysqli_query($koneksi, "SELECT * FROM tb_murid ORDER BY id ASC");
    $total = mysqli_num_rows($data);

    $kelasSet = [];
    while ($row = mysqli_fetch_assoc($data)) {
        $kelasSet[$row['kelas']] = true;
    }
    $totalKelas = count($kelasSet);
    mysqli_data_seek($data, 0);
?>

<div class="mb-6">
    <h1 class="text-xl font-semibold text-slate-900">Dashboard</h1>
    <p class="text-sm text-slate-500 mt-0.5">Ringkasan data murid XI RPL 3.</p>
</div>

<div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-6">
    <div class="bg-white border border-slate-200 rounded-lg p-4">
        <p class="text-xs text-slate-500">Total Murid</p>
        <p class="text-2xl font-semibold text-slate-900 mt-1"><?= $total ?></p>
    </div>
    <div class="bg-white border border-slate-200 rounded-lg p-4">
        <p class="text-xs text-slate-500">Jumlah Kelas</p>
        <p class="text-2xl font-semibold text-slate-900 mt-1"><?= $totalKelas ?></p>
    </div>
</div>

<div class="bg-white border border-slate-200 rounded-lg overflow-hidden">
    <div class="flex items-center justify-between px-4 py-3 border-b border-slate-100">
        <h2 class="text-sm font-semibold text-slate-700">Semua Murid</h2>
        <a href="tambah.php"
           class="inline-flex items-center gap-1.5 rounded-md bg-blue-600 px-3 py-1.5 text-xs font-medium text-white hover:bg-blue-700 active:scale-95 transition">
            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none">
                <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/>
            </svg>
            Tambah Murid
        </a>
    </div>

    <table class="w-full text-sm text-left">
        <thead class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wide">
            <tr>
                <th class="px-4 py-2.5 font-medium">ID</th>
                <th class="px-4 py-2.5 font-medium">Nama</th>
                <th class="px-4 py-2.5 font-medium">NIS</th>
                <th class="px-4 py-2.5 font-medium">Alamat</th>
                <th class="px-4 py-2.5 font-medium">Kelas</th>
                <th class="px-4 py-2.5 font-medium text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
            <?php while ($list = mysqli_fetch_array($data)):
                $badge = kelasBadge($list['kelas']);
            ?>
            <tr data-row class="hover:bg-slate-50 transition-colors duration-150">
                <td class="px-4 py-2.5 text-slate-400 font-mono text-xs">MUR-<?= $list['id'] ?></td>
                <td class="px-4 py-2.5">
                    <div class="flex items-center gap-2.5">
                        <div class="w-6 h-6 rounded-full <?= avatarColor($list['nama_lengkap']) ?> text-white text-[11px] font-semibold flex items-center justify-center shrink-0">
                            <?= initial($list['nama_lengkap']) ?>
                        </div>
                        <span class="font-medium text-slate-800"><?= htmlspecialchars($list['nama_lengkap']) ?></span>
                    </div>
                </td>
                <td class="px-4 py-2.5 text-slate-600"><?= htmlspecialchars($list['nis']) ?></td>
                <td class="px-4 py-2.5 text-slate-600"><?= htmlspecialchars($list['alamat']) ?></td>
                <td class="px-4 py-2.5">
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium ring-1 ring-inset <?= $badge[0] ?> <?= $badge[1] ?> <?= $badge[2] ?>">
                        <?= htmlspecialchars($list['kelas']) ?>
                    </span>
                </td>
                <td class="px-4 py-2.5 text-right">
                    <div class="inline-flex items-center gap-1">
                        <a href="edit.php?id=<?= $list['id'] ?>" title="Edit"
                           class="p-1.5 rounded hover:bg-slate-100 text-slate-400 hover:text-blue-600 active:scale-90 transition inline-flex">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                                <path d="M4 20h4l10.5-10.5a2.1 2.1 0 00-3-3L5 17v3Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>
                            </svg>
                        </a>
                        <a href="delete.php?id=<?= $list['id'] ?>" title="Hapus"
                           data-confirm="Data murid <?= htmlspecialchars($list['nama_lengkap']) ?> akan dihapus permanen."
                           class="p-1.5 rounded hover:bg-slate-100 text-slate-400 hover:text-red-600 active:scale-90 transition inline-flex">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                                <path d="M5 7h14M9 7V5a1 1 0 011-1h4a1 1 0 011 1v2m2 0-1 13a1 1 0 01-1 1H8a1 1 0 01-1-1L6 7" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>
            <?php endwhile; ?>

            <?php if ($total === 0): ?>
            <tr>
                <td colspan="6" class="px-4 py-10 text-center text-slate-400">Belum ada data murid.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php
    $toastMap = [
        'created' => ['Murid berhasil ditambahkan.', 'success'],
        'updated' => ['Data murid berhasil diperbarui.', 'success'],
        'deleted' => ['Data murid berhasil dihapus.', 'success'],
    ];
    $status = $_GET['status'] ?? null;
    if ($status !== null && isset($toastMap[$status])):
?>
<script>
    window.addEventListener('DOMContentLoaded', function () {
        showToast(<?= json_encode($toastMap[$status][0]) ?>, <?= json_encode($toastMap[$status][1]) ?>);
    });
</script>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
