<!-- Team Start (Dikelola & Ditampilkan menggunakan QUERY BUILDER Laravel) -->
<div class="container-xxl py-5 bg-light" id="technicians">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-primary text-uppercase">// Tim Mekanik Berpengalaman //</h6>
            <h1 class="mb-3">Teknisi & Mekanik Profesional Kami</h1>
            <div class="mb-5">
                <span class="badge bg-primary px-3 py-2 fs-6 shadow-sm">
                    <i class="fa fa-database me-1"></i> Data Dimuat Dinamis via Query Builder (DB::table('teknisi')->join('layanan', ...))
                </span>
            </div>
        </div>

        @if($teknisi->isEmpty())
            <div class="alert alert-warning text-center py-4">
                <i class="fa fa-info-circle me-2"></i> Belum ada data teknisi yang tersedia. Silakan tambahkan melalui Dashboard Admin.
            </div>
        @else
            <div class="row g-4">
                @foreach($teknisi as $t)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.1 * ($loop->iteration % 4 + 1) }}s">
                        <div class="team-item card h-100 border-0 shadow-sm rounded-3 overflow-hidden text-center">
                            <div class="position-relative overflow-hidden" style="height: 250px;">
                                <img class="img-fluid w-100 h-100" src="{{ asset('img/' . ($t->foto ?: 'team-1.jpg')) }}" 
                                     alt="{{ $t->nama_teknisi }}" style="object-fit: cover;">
                                <div class="team-overlay position-absolute start-0 top-0 w-100 h-100 d-flex align-items-center justify-content-center">
                                    <a class="btn btn-square mx-1" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $t->no_hp) }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                    <a class="btn btn-square mx-1" href="tel:{{ $t->no_hp }}"><i class="fa fa-phone"></i></a>
                                </div>
                            </div>
                            <div class="bg-white p-4 d-flex flex-column justify-content-between flex-grow-1">
                                <div>
                                    <h5 class="fw-bold mb-1 text-dark">{{ $t->nama_teknisi }}</h5>
                                    <small class="text-muted d-block mb-2">{{ $t->jabatan }}</small>
                                    
                                    <!-- Field Spesialisasi Layanan dari Hasil Query Builder SQL JOIN -->
                                    <div class="mb-2">
                                        <span class="badge bg-danger text-wrap" style="font-size: 0.75rem;">
                                            <i class="fa fa-tools me-1"></i> {{ $t->spesialisasi_layanan }}
                                        </span>
                                    </div>
                                </div>

                                <div class="border-top pt-2 mt-2 text-muted small d-flex justify-content-between align-items-center">
                                    <span><i class="fa fa-award text-warning me-1"></i> {{ $t->pengalaman_tahun }} Thn Kerja</span>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle">Aktif</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
<!-- Team End -->
