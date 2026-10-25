<?php
/**
 * Generate valid tldraw v2 .tldr file with compressed embedded screenshots
 */

$baseDir = __DIR__;
$adminImg  = $baseDir . '/screenshot_admin.png';
$guestImg  = $baseDir . '/screenshot_guest.png';
$outputFile = $baseDir . '/daffa-service-pertemuan-6.tldr';

// ── Helper: Resize image using GD and return base64 data URI ──────────────
function resizeAndEncode(string $path, int $maxW, int $maxH): array {
    [$origW, $origH] = getimagesize($path);
    $ratio = min($maxW / $origW, $maxH / $origH, 1.0);
    $newW = (int)($origW * $ratio);
    $newH = (int)($origH * $ratio);

    $src = imagecreatefrompng($path);
    $dst = imagecreatetruecolor($newW, $newH);
    // Preserve transparency
    imagealphablending($dst, false);
    imagesavealpha($dst, true);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newW, $newH, $origW, $origH);

    ob_start();
    imagepng($dst, null, 6);
    $raw = ob_get_clean();

    imagedestroy($src);
    imagedestroy($dst);

    $b64 = 'data:image/png;base64,' . base64_encode($raw);
    return [$b64, $newW, $newH];
}

echo "Encoding Admin screenshot...\n";
[$adminSrc, $adminW, $adminH] = resizeAndEncode($adminImg, 960, 620);

echo "Encoding Guest screenshot...\n";
[$guestSrc, $guestW, $guestH] = resizeAndEncode($guestImg, 960, 620);

// ── Git log ───────────────────────────────────────────────────────────────
$gitRaw = shell_exec('git log --pretty=format:"%h  %s" -n 8 2>&1');
$gitText = "daffa-service:git (main) \$ git log --oneline -n 8\n\n"
         . $gitRaw
         . "\n\n> Remote: github.com/dwi25si-max/daffa-service [branch: main]\n> Semua commit berhasil di-push";

// ── Rationale text ────────────────────────────────────────────────────────
$rationaleText = "4. Alasan Setiap Desain yang Diambil\n\n"
    . "A. Tampilan Guest (Beranda Publik)\n"
    . "• Logo di Navbar: Membangun brand identity & kepercayaan pelanggan sejak halaman pertama dibuka.\n"
    . "• Warna Merah & Hitam: Melambangkan energi, performa mesin, dan kesan profesional otomotif.\n"
    . "• Hero Carousel + CTA: Foto mobil dinamis + tombol 'Learn More' mendorong calon pelanggan memesan servis.\n\n"
    . "B. Tampilan Admin (Dashboard)\n"
    . "• Logo di Sidebar: Memperkuat branding internal bahwa staf ada di panel resmi Daffa Service.\n"
    . "• Layout Simpel & Bersih: Sidebar gelap + area data putih agar fokus admin pada data pelanggan.\n"
    . "• Tombol Edit (biru) & Hapus (merah): Dibedakan warna untuk menghindari salah klik operator.\n\n"
    . "C. UX & Validasi Form\n"
    . "• Validasi + old(): Pesan error merah + data tidak hilang saat salah input.\n"
    . "• Flash Message: Notifikasi sukses otomatis muncul setelah operasi CRUD berhasil.";

// ── Unique IDs ────────────────────────────────────────────────────────────
$adminAssetId = 'asset:pfw6-admin-001';
$guestAssetId = 'asset:pfw6-guest-001';
$pageId       = 'page:pfw6-main';
$instanceId   = 'instance:pfw6-instance';

// ── Build records array ───────────────────────────────────────────────────
$records = [];

// 1. Document
$records[] = [
    'gridSize' => 10,
    'name'     => '',
    'meta'     => new stdClass(),
    'id'       => 'document:document',
    'typeName' => 'document',
];

// 2. Page
$records[] = [
    'meta'     => new stdClass(),
    'id'       => $pageId,
    'name'     => 'Tugas PFW Pertemuan 6',
    'index'    => 'a1',
    'typeName' => 'page',
];

// 3. Camera
$records[] = [
    'x'        => 0,
    'y'        => 0,
    'z'        => 0.4,
    'meta'     => new stdClass(),
    'id'       => 'camera:' . $pageId . ':' . $instanceId,
    'typeName' => 'camera',
];

// 4. Instance
$records[] = [
    'id'                    => $instanceId,
    'typeName'              => 'instance',
    'currentPageId'         => $pageId,
    'meta'                  => new stdClass(),
    'followingUserId'       => null,
    'brush'                 => null,
    'opacityForNextShape'   => 1,
    'stylesForNextShape'    => new stdClass(),
    'cursor'                => ['type' => 'default', 'rotation' => 0],
    'scribbles'             => [],
    'isFocusMode'           => false,
    'isDebugMode'           => false,
    'isToolLocked'          => false,
    'exportBackground'      => true,
    'screenBounds'          => ['x' => 0, 'y' => 0, 'w' => 1920, 'h' => 1080],
    'zoomBrush'             => null,
    'isGridMode'            => false,
    'isPenMode'             => false,
    'chatMessage'           => '',
    'isChatting'            => false,
    'highlightedUserIds'    => [],
    'canMoveCamera'         => true,
    'isFocused'             => false,
    'devicePixelRatio'      => 1,
    'isCoarsePointer'       => false,
    'isHoveringCanvas'      => false,
    'openMenus'             => [],
    'isChangingStyle'       => false,
    'isReadonly'            => false,
    'meta_'                 => new stdClass(),
    'duplicateProps'        => null,
];

// 5. Instance Page State
$records[] = [
    'id'              => 'instance_page_state:' . $pageId . ':' . $instanceId,
    'typeName'        => 'instance_page_state',
    'pageId'          => $pageId,
    'instanceId'      => $instanceId,
    'selectedShapeIds'=> [],
    'hintingShapeIds' => [],
    'erasingShapeIds' => [],
    'hoveredShapeId'  => null,
    'editingShapeId'  => null,
    'croppingShapeId' => null,
    'focusedGroupId'  => null,
    'meta'            => new stdClass(),
];

// 6. Asset: Admin
$records[] = [
    'id'       => $adminAssetId,
    'typeName' => 'asset',
    'type'     => 'image',
    'meta'     => new stdClass(),
    'props'    => [
        'name'       => 'screenshot_admin.png',
        'src'        => $adminSrc,
        'w'          => $adminW,
        'h'          => $adminH,
        'mimeType'   => 'image/png',
        'isAnimated' => false,
    ],
];

// 7. Asset: Guest
$records[] = [
    'id'       => $guestAssetId,
    'typeName' => 'asset',
    'type'     => 'image',
    'meta'     => new stdClass(),
    'props'    => [
        'name'       => 'screenshot_guest.png',
        'src'        => $guestSrc,
        'w'          => $guestW,
        'h'          => $guestH,
        'mimeType'   => 'image/png',
        'isAnimated' => false,
    ],
];

// ── Helper to build a geo shape ───────────────────────────────────────────
function geoShape(string $id, string $pageId, string $index, float $x, float $y, int $w, int $h,
                  string $color, string $fill, string $size, string $text,
                  string $font = 'sans', string $align = 'middle', string $vAlign = 'middle'): array
{
    return [
        'id'        => $id,
        'typeName'  => 'shape',
        'type'      => 'geo',
        'parentId'  => $pageId,
        'index'     => $index,
        'x'         => $x,
        'y'         => $y,
        'rotation'  => 0,
        'isLocked'  => false,
        'opacity'   => 1,
        'meta'      => new stdClass(),
        'props'     => [
            'geo'           => 'rectangle',
            'w'             => $w,
            'h'             => $h,
            'fill'          => $fill,
            'color'         => $color,
            'labelColor'    => $color,
            'dash'          => 'draw',
            'size'          => $size,
            'font'          => $font,
            'text'          => $text,
            'align'         => $align,
            'verticalAlign' => $vAlign,
            'growY'         => 0,
            'url'           => '',
        ],
    ];
}

// ── Helper to build an image shape ───────────────────────────────────────
function imageShape(string $id, string $pageId, string $index, float $x, float $y,
                    int $w, int $h, string $assetId): array
{
    return [
        'id'        => $id,
        'typeName'  => 'shape',
        'type'      => 'image',
        'parentId'  => $pageId,
        'index'     => $index,
        'x'         => $x,
        'y'         => $y,
        'rotation'  => 0,
        'isLocked'  => false,
        'opacity'   => 1,
        'meta'      => new stdClass(),
        'props'     => [
            'w'       => $w,
            'h'       => $h,
            'assetId' => $assetId,
            'playing' => true,
            'url'     => '',
            'crop'    => null,
            'flipX'   => false,
            'flipY'   => false,
        ],
    ];
}

// ── LAYOUT (x, y positions) ───────────────────────────────────────────────
//  Col A: x=60   width=960
//  Col B: x=1060 width=980
//  Row 1 labels: y=40    h=48
//  Row 1 images: y=98    h=640
//  Row 2 labels: y=760   h=48
//  Row 2 boxes:  y=818   h=500

// Title
$records[] = geoShape('shape:title', $pageId, 'a01', 60, 40, 1980, 65,
    'red', 'semi', 'l',
    'TUGAS PERTEMUAN 6 — Pemrograman Framework Web (PFW) — Daffa Service 🚗');

// ─ Admin ─
$records[] = geoShape('shape:lbl_admin', $pageId, 'a02', 60, 118, 960, 44,
    'blue', 'semi', 'm',
    '1. Tampilan Awal Admin (Dengan Logo)   ·   http://127.0.0.1:8000/pelanggan');
$records[] = imageShape('shape:img_admin', $pageId, 'a03', 60, 172, 960, $adminH, $adminAssetId);

// ─ Guest ─
$records[] = geoShape('shape:lbl_guest', $pageId, 'a04', 1060, 118, 980, 44,
    'green', 'semi', 'm',
    '2. Tampilan Awal Guest (Dengan Logo)   ·   http://127.0.0.1:8000/');
$records[] = imageShape('shape:img_guest', $pageId, 'a05', 1060, 172, 980, $guestH, $guestAssetId);

// ─ Row 2 base Y ─
$row2Y = 172 + max($adminH, $guestH) + 28;

// ─ Git ─
$records[] = geoShape('shape:lbl_git', $pageId, 'a06', 60, $row2Y, 960, 44,
    'black', 'semi', 'm', '3. Commit Git — Version Control');
$records[] = geoShape('shape:git_box', $pageId, 'a07', 60, $row2Y + 54, 960, 480,
    'black', 'solid', 's', $gitText, 'mono', 'start', 'start');

// ─ Rationale ─
$records[] = geoShape('shape:lbl_rat', $pageId, 'a08', 1060, $row2Y, 980, 44,
    'violet', 'semi', 'm', '4. Alasan Setiap Desain yang Diambil');
$records[] = geoShape('shape:rat_box', $pageId, 'a09', 1060, $row2Y + 54, 980, 480,
    'violet', 'semi', 's', $rationaleText, 'sans', 'start', 'start');

// ── Assemble & write ──────────────────────────────────────────────────────
$tldr = [
    'tldrawFileFormatVersion' => 1,
    'schema' => [
        'schemaVersion' => 2,
        'sequences' => [
            'com.tldraw.store'               => 5,
            'com.tldraw.asset'               => 1,
            'com.tldraw.camera'              => 1,
            'com.tldraw.document'            => 2,
            'com.tldraw.instance'            => 26,
            'com.tldraw.instance_page_state' => 5,
            'com.tldraw.page'                => 1,
            'com.tldraw.shape'               => 4,
            'com.tldraw.shape.geo'           => 11,
            'com.tldraw.shape.text'          => 4,
            'com.tldraw.shape.arrow'         => 8,
            'com.tldraw.shape.line'          => 5,
            'com.tldraw.shape.frame'         => 1,
            'com.tldraw.shape.image'         => 4,
        ],
    ],
    'records' => $records,
];

echo "Writing .tldr file...\n";
file_put_contents($outputFile, json_encode($tldr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));

$kb = round(filesize($outputFile) / 1024, 1);
echo "✅ File created: $outputFile\n";
echo "📁 Size: {$kb} KB\n";
