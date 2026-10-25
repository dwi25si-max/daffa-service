<?php
// Script to generate high-resolution tldraw board HTML and render to image

$adminBase64 = base64_encode(file_get_contents(__DIR__ . '/screenshot_admin.png'));
$guestBase64 = base64_encode(file_get_contents(__DIR__ . '/screenshot_guest.png'));

// Git log entries
$gitOutput = shell_exec('git log --pretty=format:"%h|%s|%cr|%an" -n 8');
$gitLines = explode("\n", trim($gitOutput));
$gitHtml = "";
foreach ($gitLines as $line) {
    if (empty(trim($line))) continue;
    $parts = explode('|', $line);
    $hash = htmlspecialchars($parts[0] ?? '');
    $msg = htmlspecialchars($parts[1] ?? '');
    $time = htmlspecialchars($parts[2] ?? '');
    $author = htmlspecialchars($parts[3] ?? '');
    $gitHtml .= "<div class='git-row'><span class='git-hash'>$hash</span> <span class='git-msg'>$msg</span> <span class='git-time'>$time</span></div>\n";
}

$html = <<<HTML
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tugas Pertemuan 6 - Daffa Service</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap');

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        width: 1920px;
        min-height: 1080px;
        background-color: #f8f9fa;
        background-image: radial-gradient(#d1d5db 1.2px, transparent 1.2px);
        background-size: 24px 24px;
        font-family: 'Inter', -apple-system, sans-serif;
        color: #1f2937;
        padding: 40px;
    }

    /* Board Header */
    .board-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #ffffff;
        border: 2px solid #e5e7eb;
        border-radius: 16px;
        padding: 24px 32px;
        margin-bottom: 32px;
        box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05), 0 2px 4px -2px rgba(0,0,0,0.05);
    }

    .board-title h1 {
        font-size: 28px;
        font-weight: 800;
        color: #111827;
        letter-spacing: -0.5px;
    }

    .board-title p {
        font-size: 15px;
        color: #6b7280;
        margin-top: 4px;
    }

    .board-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #fee2e2;
        color: #dc2626;
        font-weight: 700;
        font-size: 14px;
        padding: 8px 16px;
        border-radius: 9999px;
        border: 1px solid #fecaca;
    }

    /* Grid layout 2x2 */
    .canvas-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 28px;
    }

    .card {
        background: #ffffff;
        border: 2px solid #e5e7eb;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -4px rgba(0, 0, 0, 0.05);
        display: flex;
        flex-direction: column;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 18px;
        padding-bottom: 12px;
        border-bottom: 2px dashed #f3f4f6;
    }

    .card-title {
        font-size: 20px;
        font-weight: 700;
        color: #1f2937;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .card-tag {
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        padding: 4px 10px;
        border-radius: 6px;
        letter-spacing: 0.5px;
    }

    .tag-blue { background: #e0f2fe; color: #0284c7; }
    .tag-green { background: #dcfce7; color: #16a34a; }
    .tag-purple { background: #f3e8ff; color: #9333ea; }
    .tag-amber { background: #fef3c7; color: #d97706; }

    /* Browser Mockup Window */
    .browser-window {
        border-radius: 10px;
        border: 1px solid #d1d5db;
        overflow: hidden;
        background: #ffffff;
        box-shadow: 0 4px 6px -1px rgba(0,0,0,0.08);
    }

    .browser-bar {
        background: #f3f4f6;
        border-bottom: 1px solid #e5e7eb;
        padding: 8px 12px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .window-dots {
        display: flex;
        gap: 6px;
    }

    .dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
    }
    .dot-red { background: #ef4444; }
    .dot-yellow { background: #f59e0b; }
    .dot-green { background: #10b981; }

    .browser-url {
        background: #ffffff;
        padding: 3px 12px;
        border-radius: 4px;
        font-size: 11px;
        font-family: 'JetBrains Mono', monospace;
        color: #4b5563;
        border: 1px solid #e5e7eb;
        flex-grow: 1;
        max-width: 320px;
    }

    .browser-body img {
        width: 100%;
        display: block;
        height: auto;
    }

    /* Terminal Window for Git */
    .terminal-window {
        background: #0f172a;
        color: #f8fafc;
        border-radius: 10px;
        border: 1px solid #334155;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0,0,0,0.2);
        font-family: 'JetBrains Mono', monospace;
        font-size: 12.5px;
        line-height: 1.6;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .terminal-bar {
        background: #1e293b;
        padding: 8px 12px;
        display: flex;
        align-items: center;
        gap: 10px;
        border-bottom: 1px solid #334155;
    }

    .terminal-title {
        color: #94a3b8;
        font-size: 12px;
    }

    .terminal-content {
        padding: 16px;
        overflow: hidden;
    }

    .git-prompt {
        color: #38bdf8;
        margin-bottom: 12px;
        font-weight: 600;
    }

    .git-prompt span {
        color: #f43f5e;
    }

    .git-row {
        margin-bottom: 7px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .git-hash {
        color: #fbbf24;
        font-weight: 600;
        min-width: 65px;
    }

    .git-msg {
        color: #e2e8f0;
        flex-grow: 1;
    }

    .git-time {
        color: #64748b;
        font-size: 11px;
    }

    .git-badge-summary {
        margin-top: 14px;
        padding-top: 12px;
        border-top: 1px solid #334155;
        color: #10b981;
        font-size: 12px;
    }

    /* Rationale Section / Sticky notes */
    .rationale-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
        flex-grow: 1;
    }

    .sticky-note {
        padding: 16px;
        border-radius: 12px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 0 2px 4px rgba(0,0,0,0.04);
        border: 1px solid rgba(0,0,0,0.06);
    }

    .note-yellow {
        background: #fef9c3;
        color: #713f12;
    }

    .note-blue {
        background: #e0f2fe;
        color: #075985;
    }

    .note-pink {
        background: #ffe4e6;
        color: #9f1239;
    }

    .note-green {
        background: #dcfce7;
        color: #14532d;
    }

    .sticky-header {
        font-weight: 700;
        font-size: 14px;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .sticky-body {
        font-size: 12.5px;
        line-height: 1.5;
    }

    .tldraw-stamp {
        font-family: 'Caveat', cursive;
        font-size: 22px;
        color: #4b5563;
        margin-top: 12px;
        text-align: right;
    }

    .footer-note {
        text-align: center;
        margin-top: 20px;
        font-size: 13px;
        color: #6b7280;
    }
</style>
</head>
<body>

<div class="board-header">
    <div class="board-title">
        <h1>Tugas Pertemuan 6 - Pemrograman Framework Web (PFW)</h1>
        <p>Implementasi CRUD Pelanggan, Integrasi Branding Logo, dan Version Control Git pada Proyek Daffa Service</p>
    </div>
    <div class="board-badge">
        <span>🚗</span>
        <span>Daffa Service Bengkel Mobil</span>
    </div>
</div>

<div class="canvas-grid">
    <!-- 1. Tampilan Admin -->
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <span>1.</span> Tampilan Awal Admin (Dengan Logo)
            </div>
            <span class="card-tag tag-blue">Halaman Admin</span>
        </div>
        <div class="browser-window">
            <div class="browser-bar">
                <div class="window-dots">
                    <div class="dot dot-red"></div>
                    <div class="dot dot-yellow"></div>
                    <div class="dot dot-green"></div>
                </div>
                <div class="browser-url">http://127.0.0.1:8000/pelanggan</div>
            </div>
            <div class="browser-body">
                <img src="data:image/png;base64,{$adminBase64}" alt="Tampilan Admin">
            </div>
        </div>
    </div>

    <!-- 2. Tampilan Guest -->
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <span>2.</span> Tampilan Awal Guest (Dengan Logo)
            </div>
            <span class="card-tag tag-green">Halaman Landing</span>
        </div>
        <div class="browser-window">
            <div class="browser-bar">
                <div class="window-dots">
                    <div class="dot dot-red"></div>
                    <div class="dot dot-yellow"></div>
                    <div class="dot dot-green"></div>
                </div>
                <div class="browser-url">http://127.0.0.1:8000/</div>
            </div>
            <div class="browser-body">
                <img src="data:image/png;base64,{$guestBase64}" alt="Tampilan Guest">
            </div>
        </div>
    </div>

    <!-- 3. Commit Git -->
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <span>3.</span> Commit Git (Version Control)
            </div>
            <span class="card-tag tag-purple">Git History</span>
        </div>
        <div class="terminal-window">
            <div class="terminal-bar">
                <div class="window-dots">
                    <div class="dot dot-red"></div>
                    <div class="dot dot-yellow"></div>
                    <div class="dot dot-green"></div>
                </div>
                <div class="terminal-title">bash - daffa-service (branch: main)</div>
            </div>
            <div class="terminal-content">
                <div class="git-prompt">daffa-service:git (<span>main</span>) $ git log --oneline -n 8</div>
                {$gitHtml}
                <div class="git-badge-summary">✓ Repository sinkron dengan origin/main (GitHub: dwi25si-max/daffa-service)</div>
            </div>
        </div>
    </div>

    <!-- 4. Alasan Desain -->
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <span>4.</span> Alasan Setiap Desain yang Diambil
            </div>
            <span class="card-tag tag-amber">Design Rationale</span>
        </div>
        <div class="rationale-grid">
            <div class="sticky-note note-yellow">
                <div class="sticky-header">🏷️ 1. Penempatan Logo & Branding</div>
                <div class="sticky-body">
                    Logo <strong>Daffa Service</strong> ditempatkan secara konsisten di sudut kiri atas navbar Guest dan sidebar Admin. Hal ini memperkuat identitas merek bengkel, memberikan kesan profesional, dan memudahkan navigasi pengguna.
                </div>
            </div>
            <div class="sticky-note note-blue">
                <div class="sticky-header">📊 2. Desain Tabel Bersih & Simpel</div>
                <div class="sticky-body">
                    Tabel pelanggan dirancang minimalis dan rapi tanpa ornamen berlebih agar fokus pada keterbacaan data esensial (Nama, Tanggal Lahir, Jenis Kelamin, Email, No HP) dengan kontras yang jelas.
                </div>
            </div>
            <div class="sticky-note note-pink">
                <div class="sticky-header">🎨 3. Skema Warna Otomotif</div>
                <div class="sticky-body">
                    Aksen merah menyala (<em>Automotive Crimson Red</em>) dipadukan dengan latar belakang putih dan sidebar dark slate melambangkan energi, ketepatan, dan dinamika industri servis otomotif modern.
                </div>
            </div>
            <div class="sticky-note note-green">
                <div class="sticky-header">⚡ 4. UX Aksi & Form Feedback</div>
                <div class="sticky-body">
                    Tombol aksi (Tambah, Edit, Hapus) menggunakan warna tematik yang kontras. Dilengkapi validasi form dengan penanda error merah serta pesan konfirmasi sukses untuk menjamin kejelasan operasional admin.
                </div>
            </div>
        </div>
        <div class="tldraw-stamp">✨ Board Tugas Pertemuan 6 - Siap Dinilai</div>
    </div>
</div>

<div class="footer-note">
    Daffa Service Web Application • Pemrograman Framework Web • Semester Gasal 2026/2027
</div>

</body>
</html>
HTML;

file_put_contents(__DIR__ . '/tldraw_submission.html', $html);
echo "HTML board generated: tldraw_submission.html\n";
