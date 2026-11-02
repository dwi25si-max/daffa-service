<!-- Service Start (Dikelola & Ditampilkan menggunakan ELOQUENT ORM) -->
<div class="container-xxl service py-5" id="services">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-primary text-uppercase">// Katalog Layanan Bengkel //</h6>
            <h1 class="mb-3">Jelajahi Layanan Daffa Service</h1>
            <div class="mb-5">
                <span class="badge bg-danger px-3 py-2 fs-6 shadow-sm">
                    <i class="fa fa-cube me-1"></i> Data Dimuat Dinamis via Eloquent ORM (Model: App\Models\Layanan)
                </span>
            </div>
        </div>

        @if($layanan->isEmpty())
            <div class="alert alert-warning text-center py-4">
                <i class="fa fa-info-circle me-2"></i> Belum ada data layanan yang tersedia. Silakan tambahkan melalui Dashboard Admin.
            </div>
        @else
            <div class="row g-4">
                @foreach($layanan as $item)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.1 * ($loop->iteration % 4 + 1) }}s">
                        <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden position-relative">
                            <div class="card-header bg-light border-0 pt-4 px-4 pb-0 d-flex justify-content-between align-items-center">
                                <span class="badge bg-secondary">{{ $item->kategori }}</span>
                                <span class="text-muted small"><i class="far fa-clock me-1"></i> {{ $item->estimasi_waktu }}</span>
                            </div>
                            <div class="card-body p-4 d-flex flex-column">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="rounded-circle bg-danger text-white d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 50px; height: 50px;">
                                        <i class="fa {{ $item->ikon ?: 'fa-tools' }} fs-4"></i>
                                    </div>
                                    <h5 class="card-title fw-bold text-dark mb-0">{{ $item->nama_layanan }}</h5>
                                </div>

                                <p class="card-text text-muted mb-3 flex-grow-1">
                                    {{ $item->deskripsi }}
                                </p>

                                <div class="border-top pt-3 mt-2">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <small class="text-muted">Biaya Layanan:</small>
                                        <h5 class="text-danger fw-bold mb-0">Rp {{ number_format($item->harga, 0, ',', '.') }}</h5>
                                    </div>

                                    <!-- Relasi Eloquent: Menampilkan Teknisi yang Berspesialisasi pada Layanan Ini -->
                                    <div class="bg-light p-2 rounded small mt-2">
                                        <div class="d-flex align-items-center text-muted mb-1">
                                            <i class="fa fa-users-cog text-primary me-2"></i>
                                            <strong>Mekanik Spesialis (Eloquent hasMany):</strong>
                                        </div>
                                        @if($item->teknisi && $item->teknisi->count() > 0)
                                            <ul class="mb-0 ps-3 text-secondary">
                                                @foreach($item->teknisi as $tek)
                                                    <li><strong>{{ $tek->nama_teknisi }}</strong> ({{ $tek->jabatan }})</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <span class="text-muted fst-italic ps-3">- Teknisi umum bengkel</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
<!-- Service End -->
