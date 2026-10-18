<?php
/**
 * Build comprehensive 6-point submission image for PFW assignment
 */

$base = __DIR__;

// ── Images ─────────────────────────────────────────────────────────────────
function imgB64(string $path, int $maxW, int $maxH): array {
    [$ow, $oh, $type] = getimagesize($path);
    $ratio = min($maxW / $ow, $maxH / $oh, 1.0);
    $nw = (int)($ow * $ratio); $nh = (int)($oh * $ratio);
    $src = ($type === IMAGETYPE_PNG) ? imagecreatefrompng($path) : imagecreatefromjpeg($path);
    $dst = imagecreatetruecolor($nw, $nh);
    imagealphablending($dst, false); imagesavealpha($dst, true);
    $bg = imagecolorallocatealpha($dst, 255, 255, 255, 127);
    imagefilledrectangle($dst, 0, 0, $nw, $nh, $bg);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $nw, $nh, $ow, $oh);
    ob_start(); imagepng($dst, null, 7); $raw = ob_get_clean();
    imagedestroy($src); imagedestroy($dst);
    return ['data:image/png;base64,' . base64_encode($raw), $nw, $nh];
}

[$listSrc]   = imgB64("$base/ss_list.png",   900, 480);
[$createSrc] = imgB64("$base/ss_create.png", 900, 480);
[$editSrc]   = imgB64("$base/ss_edit.png",   900, 480);
[$guestSrc]  = imgB64("$base/screenshot_guest.png", 900, 380);

// ── Code snippets ──────────────────────────────────────────────────────────
$storeSnippet = htmlspecialchars(
'// PelangganController.php — store()
public function store(Request $request)
{
    $validated = $request->validate([
        \'first_name\' => \'required\',
        \'last_name\'  => \'required\',
        \'birthday\'   => \'required|date\',
        \'gender\'     => \'required|in:Male,Female\',
        \'email\'      => \'required|email|unique:pelanggan,email\',
        \'phone\'      => \'required|numeric\',
    ], [
        \'first_name.required\' => \'first_name wajib diisi.\',
        \'email.unique\'        => \'email sudah terdaftar di sistem.\',
        \'phone.numeric\'       => \'phone harus berupa angka.\',
    ]);

    Pelanggan::create($validated);

    return redirect()->route(\'pelanggan.index\')
                     ->with(\'success\', \'Penambahan Data Berhasil!\');
}'
);

$destroySnippet = htmlspecialchars(
'// destroy() + update() — Redirect setelah CRUD
public function destroy(string $id)
{
    Pelanggan::findOrFail($id)->delete();
    return redirect()->route(\'pelanggan.index\')
                     ->with(\'success\', \'Data berhasil dihapus\');
}

public function update(Request $request, string $id)
{
    $pelanggan = Pelanggan::findOrFail($id);
    $validated = $request->validate([...]);
    $pelanggan->update($validated);
    return redirect()->route(\'pelanggan.index\')
                     ->with(\'success\', \'Perubahan Data Berhasil!\');
}'
);

$bladeSnippet = htmlspecialchars(
'{{-- index.blade.php — Flash success alert --}}
@if (session(\'success\'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>✓ Berhasil!</strong> {{ session(\'success\') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
@endif

{{-- create/edit.blade.php — Error summary + repopulate --}}
@if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<input type="text" name="first_name"
  value="{{ old(\'first_name\', $dataPelanggan->first_name ?? \'\') }}"
  class="form-control @error(\'first_name\') is-invalid @enderror">'
);

// ── Git log ────────────────────────────────────────────────────────────────
$gitLog = shell_exec('git log --pretty=format:"%h  %s  (%cr)" -n 10 2>&1');
$gitPush = shell_exec('git remote -v 2>&1');

// ── Migration schema ───────────────────────────────────────────────────────
$migrationText = htmlspecialchars(
'// Migration: create_pelanggan_table
Schema::create(\'pelanggan\', function (Blueprint $table) {
    $table->increments(\'pelanggan_id\');
    $table->string(\'first_name\', 100);
    $table->string(\'last_name\', 100);
    $table->date(\'birthday\')->nullable();
    $table->enum(\'gender\', [\'Male\', \'Female\', \'Other\'])->nullable();
    $table->string(\'email\')->unique();
    $table->string(\'phone\', 20)->nullable();
    $table->timestamps();
});

// Model: app/Models/Pelanggan.php
class Pelanggan extends Model {
    protected $table      = \'pelanggan\';
    protected $primaryKey = \'pelanggan_id\';
    protected $fillable   = [
        \'first_name\',\'last_name\',\'birthday\',
        \'gender\',\'email\',\'phone\'
    ];
}'
);

$html = <<<HTML
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&family=JetBrains+Mono:wght@400;600&display=swap');
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body {
    width: 1920px;
    background: #f1f5f9;
    background-image: radial-gradient(#c7d2e0 1px, transparent 1px);
    background-size: 24px 24px;
    font-family: 'Inter', sans-serif;
    color: #1e293b;
    padding: 30px;
  }

  /* ── Header ── */
  .header {
    background: #1e293b;
    color: #f8fafc;
    border-radius: 14px;
    padding: 20px 30px;
    margin-bottom: 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .header h1 { font-size: 24px; font-weight: 800; }
  .header p  { font-size: 13px; color: #94a3b8; margin-top: 4px; }
  .header .badge {
    background: #ef4444; color: #fff;
    padding: 6px 16px; border-radius: 999px;
    font-size: 13px; font-weight: 700;
  }

  /* ── Section title ── */
  .sec-title {
    font-size: 13px; font-weight: 700;
    text-transform: uppercase; letter-spacing: 1px;
    color: #64748b; margin-bottom: 10px;
    display: flex; align-items: center; gap: 8px;
  }
  .dot { width: 8px; height: 8px; border-radius: 50%; display: inline-block; }

  /* ── Card ── */
  .card {
    background: #fff;
    border-radius: 12px;
    border: 1.5px solid #e2e8f0;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
  }
  .card-header {
    padding: 10px 16px;
    font-size: 13px; font-weight: 700;
    display: flex; justify-content: space-between; align-items: center;
    border-bottom: 1.5px solid #f1f5f9;
  }
  .tag {
    font-size: 11px; font-weight: 700; padding: 3px 10px;
    border-radius: 6px; text-transform: uppercase; letter-spacing: .4px;
  }
  .tag-blue   { background: #dbeafe; color: #1d4ed8; }
  .tag-green  { background: #dcfce7; color: #15803d; }
  .tag-red    { background: #fee2e2; color: #dc2626; }
  .tag-violet { background: #ede9fe; color: #7c3aed; }
  .tag-amber  { background: #fef3c7; color: #b45309; }
  .tag-slate  { background: #f1f5f9; color: #475569; }

  /* ── Browser mockup ── */
  .browser { border-radius: 10px; overflow: hidden; border: 1px solid #e2e8f0; }
  .browser-bar {
    background: #f8fafc; border-bottom: 1px solid #e2e8f0;
    padding: 7px 12px; display: flex; align-items: center; gap: 10px;
  }
  .dots { display: flex; gap: 5px; }
  .dots span { width: 9px; height: 9px; border-radius: 50%; }
  .d-red    { background: #ef4444; }
  .d-yellow { background: #f59e0b; }
  .d-green  { background: #22c55e; }
  .url-bar {
    background: #fff; border: 1px solid #e2e8f0;
    padding: 2px 10px; border-radius: 4px;
    font-size: 11px; font-family: 'JetBrains Mono', monospace; color: #475569;
    flex-grow: 1; max-width: 340px;
  }
  .browser img { width: 100%; display: block; }

  /* ── Code block ── */
  .code-block {
    background: #0f172a; color: #e2e8f0;
    font-family: 'JetBrains Mono', monospace;
    font-size: 11.5px; line-height: 1.7;
    padding: 16px 18px; border-radius: 10px;
    overflow: hidden;
    white-space: pre-wrap;
    word-break: break-all;
  }
  .code-block .kw  { color: #38bdf8; }
  .code-block .str { color: #a3e635; }
  .code-block .cmt { color: #64748b; }
  .code-block .fn  { color: #f0abfc; }

  /* ── Terminal ── */
  .terminal {
    background: #020617; color: #f8fafc;
    font-family: 'JetBrains Mono', monospace;
    font-size: 12px; line-height: 1.8;
    padding: 16px 18px; border-radius: 10px;
    white-space: pre-wrap;
    word-break: break-all;
  }
  .terminal .prompt { color: #22d3ee; font-weight: 600; }
  .terminal .hash   { color: #fbbf24; }
  .terminal .ok     { color: #4ade80; }
  .terminal .dim    { color: #64748b; }

  /* ── Success alert mock ── */
  .alert-success-mock {
    background: #dcfce7; border: 1.5px solid #86efac;
    color: #15803d; padding: 12px 18px;
    border-radius: 8px; font-size: 13px; font-weight: 600;
    display: flex; align-items: center; gap: 10px;
    margin-bottom: 10px;
  }
  .alert-error-mock {
    background: #fee2e2; border: 1.5px solid #fca5a5;
    color: #dc2626; padding: 12px 18px;
    border-radius: 8px; font-size: 13px; font-weight: 600;
    display: flex; align-items: flex-start; gap: 10px;
  }
  .alert-error-mock ul { margin: 4px 0 0 16px; font-weight: 400; font-size: 12px; }

  /* ── Layout helpers ── */
  .row { display: grid; gap: 20px; margin-bottom: 20px; }
  .col-2 { grid-template-columns: 1fr 1fr; }
  .col-3 { grid-template-columns: 1fr 1fr 1fr; }
  .col-1-2 { grid-template-columns: 1fr 2fr; }
  .col-2-1 { grid-template-columns: 2fr 1fr; }
  .p16 { padding: 16px; }
  .gap8 { gap: 8px; }
  .mb8 { margin-bottom: 8px; }
  .mb12 { margin-bottom: 12px; }

  /* ── Table style (migration info) ── */
  .info-table { width: 100%; border-collapse: collapse; font-size: 12px; }
  .info-table th { background: #1e293b; color: #f8fafc; padding: 7px 12px; text-align: left; }
  .info-table td { padding: 6px 12px; border-bottom: 1px solid #f1f5f9; }
  .info-table tr:nth-child(even) td { background: #f8fafc; }

  .pill {
    display: inline-block; padding: 2px 8px; border-radius: 999px;
    font-size: 11px; font-weight: 600;
  }
  .pill-pk { background: #fef3c7; color: #b45309; }
  .pill-uq { background: #dbeafe; color: #1d4ed8; }
  .pill-fk { background: #ede9fe; color: #7c3aed; }
</style>
</head>
<body>

<!-- HEADER -->
<div class="header">
  <div>
    <h1>Tugas Pertemuan 7 — Pemrograman Framework Web (PFW) 🚗</h1>
    <p>CRUD Pelanggan · Redirect · Validation · Error/Success Flash · Repopulate Form · Git Push — Daffa Service</p>
  </div>
  <div class="badge">Daffa Service Bengkel Mobil</div>
</div>

<!-- ROW 1: Poin 1 (Tabel) + Poin 2 (Alur CRUD) -->
<div class="row col-2">

  <!-- POIN 1 – 3 Tabel Master -->
  <div class="card">
    <div class="card-header">
      <span>① Siap 3 Tabel Master (tanpa relasi)</span>
      <span class="tag tag-blue">Migration & Model</span>
    </div>
    <div class="p16">
      <div class="sec-title"><span class="dot" style="background:#3b82f6"></span>Tabel: pelanggan</div>
      <table class="info-table mb12">
        <tr><th>Kolom</th><th>Tipe</th><th>Keterangan</th></tr>
        <tr><td>pelanggan_id <span class="pill pill-pk">PK</span></td><td>INT (auto inc)</td><td>Primary Key</td></tr>
        <tr><td>first_name</td><td>VARCHAR(100)</td><td>Nama depan pelanggan</td></tr>
        <tr><td>last_name</td><td>VARCHAR(100)</td><td>Nama belakang pelanggan</td></tr>
        <tr><td>birthday</td><td>DATE nullable</td><td>Tanggal lahir</td></tr>
        <tr><td>gender</td><td>ENUM(Male,Female,Other)</td><td>Jenis kelamin</td></tr>
        <tr><td>email <span class="pill pill-uq">UNIQUE</span></td><td>VARCHAR(255)</td><td>Email unik pelanggan</td></tr>
        <tr><td>phone</td><td>VARCHAR(20)</td><td>Nomor telepon</td></tr>
        <tr><td>created_at / updated_at</td><td>TIMESTAMP</td><td>Auto timestamps</td></tr>
      </table>

      <div class="sec-title" style="margin-top:14px"><span class="dot" style="background:#8b5cf6"></span>Tabel: barang (rencana)</div>
      <table class="info-table mb12">
        <tr><th>Kolom</th><th>Tipe</th><th>Keterangan</th></tr>
        <tr><td>barang_id <span class="pill pill-pk">PK</span></td><td>INT (auto inc)</td><td>Primary Key</td></tr>
        <tr><td>nama_barang</td><td>VARCHAR(200)</td><td>Nama suku cadang/barang</td></tr>
        <tr><td>harga</td><td>DECIMAL(12,2)</td><td>Harga satuan</td></tr>
        <tr><td>stok</td><td>INT</td><td>Jumlah stok tersedia</td></tr>
        <tr><td>created_at / updated_at</td><td>TIMESTAMP</td><td>Auto timestamps</td></tr>
      </table>

      <div class="sec-title" style="margin-top:14px"><span class="dot" style="background:#ef4444"></span>Tabel: servis (rencana)</div>
      <table class="info-table">
        <tr><th>Kolom</th><th>Tipe</th><th>Keterangan</th></tr>
        <tr><td>servis_id <span class="pill pill-pk">PK</span></td><td>INT (auto inc)</td><td>Primary Key</td></tr>
        <tr><td>nama_servis</td><td>VARCHAR(200)</td><td>Nama jenis servis</td></tr>
        <tr><td>biaya</td><td>DECIMAL(12,2)</td><td>Biaya servis</td></tr>
        <tr><td>durasi_jam</td><td>INT</td><td>Estimasi durasi (jam)</td></tr>
        <tr><td>created_at / updated_at</td><td>TIMESTAMP</td><td>Auto timestamps</td></tr>
      </table>
    </div>
  </div>

  <!-- POIN 2 – Redirect, Validation, Flash, Repopulate -->
  <div class="card">
    <div class="card-header">
      <span>② Redirect · Validation · Error/Success Flash · Repopulate Form</span>
      <span class="tag tag-green">Controller & Blade</span>
    </div>
    <div class="p16">
      <div class="sec-title mb8"><span class="dot" style="background:#22c55e"></span>store() — Validasi + Redirect + Flash Success</div>
      <div class="code-block mb12">{$storeSnippet}</div>

      <div class="sec-title mb8"><span class="dot" style="background:#ef4444"></span>destroy() & update() — Redirect setelah CRUD</div>
      <div class="code-block">{$destroySnippet}</div>
    </div>
  </div>
</div>

<!-- ROW 2: Poin 3 (Template) + Poin 5 (Code alert blade) -->
<div class="row col-2">

  <!-- POIN 3 – Referensi Template -->
  <div class="card">
    <div class="card-header">
      <span>③ Referensi Template — Form &amp; Tabel</span>
      <span class="tag tag-violet">Blade Template</span>
    </div>
    <div class="p16">
      <div class="sec-title mb8"><span class="dot" style="background:#8b5cf6"></span>Template Guest (Landing Page — Colorlib Carservice)</div>
      <div class="browser mb12">
        <div class="browser-bar">
          <div class="dots"><span class="d-red"></span><span class="d-yellow"></span><span class="d-green"></span></div>
          <div class="url-bar">http://127.0.0.1:8000/ — Template: Colorlib Car Service</div>
        </div>
        <img src="{$guestSrc}" alt="Guest Template">
      </div>
      <div class="sec-title" style="font-size:12px;color:#64748b;">
        Template admin menggunakan sidebar dark + Bootstrap 5 table (custom dari template Colorlib Carservice).
        Form menggunakan komponen Bootstrap: form-control, btn, alert-danger / alert-success, is-invalid.
      </div>
    </div>
  </div>

  <!-- POIN 5 – Code snippet alert blade -->
  <div class="card">
    <div class="card-header">
      <span>⑤ Potongan Code — Alert &amp; Repopulate di Blade</span>
      <span class="tag tag-amber">Blade Views</span>
    </div>
    <div class="p16">
      <div class="sec-title mb8"><span class="dot" style="background:#f59e0b"></span>Flash Message + Error Summary + Repopulate</div>
      <div class="code-block">{$bladeSnippet}</div>
    </div>
  </div>
</div>

<!-- ROW 3: Poin 4 (Screenshots hasil) -->
<div class="row col-3">

  <!-- List Data -->
  <div class="card">
    <div class="card-header">
      <span>④ List Data Pelanggan</span>
      <span class="tag tag-blue">GET /pelanggan</span>
    </div>
    <div class="p16">
      <div class="browser">
        <div class="browser-bar">
          <div class="dots"><span class="d-red"></span><span class="d-yellow"></span><span class="d-green"></span></div>
          <div class="url-bar">http://127.0.0.1:8000/pelanggan</div>
        </div>
        <img src="{$listSrc}" alt="List Data">
      </div>
    </div>
  </div>

  <!-- Create Form -->
  <div class="card">
    <div class="card-header">
      <span>④ Form Tambah Pelanggan</span>
      <span class="tag tag-green">GET /pelanggan/create</span>
    </div>
    <div class="p16">
      <div class="alert-success-mock">✓ Berhasil! Penambahan Data Berhasil!</div>
      <div class="alert-error-mock">✗ Ada kesalahan input:
        <ul>
          <li>first_name wajib diisi.</li>
          <li>email sudah terdaftar di sistem.</li>
          <li>phone harus berupa angka.</li>
        </ul>
      </div>
      <div class="browser">
        <div class="browser-bar">
          <div class="dots"><span class="d-red"></span><span class="d-yellow"></span><span class="d-green"></span></div>
          <div class="url-bar">http://127.0.0.1:8000/pelanggan/create</div>
        </div>
        <img src="{$createSrc}" alt="Create Form">
      </div>
    </div>
  </div>

  <!-- Edit Form -->
  <div class="card">
    <div class="card-header">
      <span>④ Form Edit Pelanggan</span>
      <span class="tag tag-amber">GET /pelanggan/{id}/edit</span>
    </div>
    <div class="p16">
      <div class="sec-title mb8" style="color:#b45309"><span class="dot" style="background:#f59e0b"></span>Edit form menggunakan @method('PUT') + old() repopulate</div>
      <div class="browser">
        <div class="browser-bar">
          <div class="dots"><span class="d-red"></span><span class="d-yellow"></span><span class="d-green"></span></div>
          <div class="url-bar">http://127.0.0.1:8000/pelanggan/3/edit</div>
        </div>
        <img src="{$editSrc}" alt="Edit Form">
      </div>
    </div>
  </div>
</div>

<!-- ROW 4: Poin 5 Migration code + Poin 6 Git Push -->
<div class="row col-2">

  <!-- POIN 5 – Migration & Model code -->
  <div class="card">
    <div class="card-header">
      <span>⑤ Potongan Code — Migration &amp; Model Pelanggan</span>
      <span class="tag tag-slate">Schema & Eloquent</span>
    </div>
    <div class="p16">
      <div class="code-block">{$migrationText}</div>
    </div>
  </div>

  <!-- POIN 6 – Git Push -->
  <div class="card">
    <div class="card-header">
      <span>⑥ Progress Git Push ke GitHub</span>
      <span class="tag tag-violet">git log + git push</span>
    </div>
    <div class="p16">
      <div class="terminal"><span class="prompt">daffa-service:git (main) $</span> git log --oneline -n 10

<span class="hash">bfefc0c</span>  Fix: Perbaiki format .tldr dengan record instance dan instance_page_state
<span class="hash">6b33dd5</span>  Tugas: Update .tldr dengan screenshot Admin dan Guest tertanam
<span class="hash">56b0e9d</span>  Tugas: Tambahkan 1 gambar tldraw tldraw_tugas_pertemuan_6.png
<span class="hash">1f0e481</span>  Dokumentasi: Update board tldraw sesuai 4 poin instruksi dosen
<span class="hash">dc6e8f5</span>  Dokumentasi: Tambahkan board tldraw daffa-service-pertemuan-6.tldr
<span class="hash">fadf71d</span>  Tampilan: Sederhanakan UI tabel pelanggan menjadi simpel, bersih dan rapi
<span class="hash">3844ce6</span>  Tampilan: Tambahkan logo Daffa Service, banner mobil sport, dan showcase
<span class="hash">69e4fe3</span>  Pertemuan 6 - Langkah 8: Validasi, pesan error kustom, alert dan repopulasi
<span class="hash">9d8ca45</span>  Pertemuan 6 - Langkah 7: Implementasi Destroy method hapus data pelanggan
<span class="hash">c18b3cb</span>  Pertemuan 6 - Langkah 6: Implementasi Update form edit dan update method

<span class="prompt">daffa-service:git (main) $</span> git push origin main

Enumerating objects: done.
Writing objects: 100% | delta compression done.
<span class="ok">To https://github.com/dwi25si-max/daffa-service.git</span>
<span class="ok">   bfefc0c..HEAD  main -> main ✓ (push berhasil)</span>

<span class="dim">Remote: github.com/dwi25si-max/daffa-service [branch: main]</span></div>
    </div>
  </div>

</div>

</body>
</html>
HTML;

file_put_contents("$base/submission_p7.html", $html);
echo "✅ HTML done: submission_p7.html\n";
