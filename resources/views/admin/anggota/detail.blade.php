@extends('layouts.app')
@section('content')

<!-- Main Content -->
<div class="container">
    <div class="page-inner">

        <x-page-header 
            :pageTitle="$pageTitle" 
            :pageDescription="$pageDescription" 
        />

        <div class="page-category">

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <x-alert />

                            <!-- Tanggal Pendaftaran -->
                            <div class="form-group">
                                <label for="tanggal_pendaftaran">Tanggal Pendaftaran</label>
                                <p>{{ $data->tanggal_pendaftaran ?? '-' }}</p>
                            </div>

                            <!-- Nama Lengkap -->
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <p>{{ $data->nama_lengkap ?? '-' }}</p>
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <p>{{ $data->jenis_kelamin == 'L' ? 'Laki-Laki' : ($data->jenis_kelamin == 'P' ? 'Perempuan' : '-') }}</p>
                            </div>

                            <!-- Tempat Lahir -->
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <p>{{ $data->tempat_lahir ?? '-' }}</p>
                            </div>

                            <!-- Tanggal Lahir -->
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <p>{{ $data->tanggal_lahir ?? '-' }}</p>
                            </div>

                            <!-- Agama -->
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <p>{{ $data->agama ?? '-' }}</p>
                            </div>

                            <!-- Alamat Tinggal -->
                            <div class="form-group">
                                <label for="alamat_tinggal">Alamat Tinggal</label>
                                <p>{{ $data->alamat_tinggal ?? '-' }}</p>
                            </div>

                            <!-- No HP -->
                            <div class="form-group">
                                <label for="no_hp">No HP</label>
                                <p>{{ $data->no_hp ?? '-' }}</p>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <p>{{ $data->email ?? '-' }}</p>
                            </div>

                            <!-- Kampus -->
                            <div class="form-group">
                                <label for="kampus">Kampus</label>
                                <p>{{ $data->kampus->nama_kampus ?? '-' }}</p>
                            </div>

                            <!-- Fakultas -->
                            <div class="form-group">
                                <label for="fakultas_id">Fakultas</label>
                                <p>{{ $data->programstudi->fakultas->nama_fakultas ?? '-' }}</p>
                            </div>

                            <!-- Program Studi -->
                            <div class="form-group">
                                <label for="program_studi_id">Program Studi</label>
                                <p>{{ $data->programstudi->nama_program_studi ?? '-' }}</p>
                            </div>

                            <!-- KPM -->
                            <div class="form-group">
                                <label for="kpm">Kartu Pegawai Mahasiswa (KPM)</label>
                                <div class="d-block">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#kpmModal{{ $data->id }}">
                                        <img 
                                            src="{{ $data->kpm ? asset('storage/' . $data->kpm) : asset('assets/img/kartu-placeholder.png') }}" 
                                            alt="kpm" 
                                            class="w-50 mb-3">
                                    </a>
                                </div>
                            </div>

                            <!-- NIM -->
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <p>{{ $data->nim ?? '-' }}</p>
                            </div>

                            <!-- KTP -->
                            <div class="form-group">
                                <label for="ktp">KTP</label>
                                <div class="d-block">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#ktpModal{{ $data->id }}">
                                        <img 
                                            src="{{ $data->ktp ? asset('storage/' . $data->ktp) : asset('assets/img/kartu-placeholder.png') }}" 
                                            alt="ktp" 
                                            class="w-50 mb-3">
                                    </a>
                                </div>
                            </div>

                            <!-- Foto -->
                            <div class="form-group">
                                <label for="foto">Foto Profil</label>
                                <div class="avatar avatar-xl d-block mb-2">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#fotoModal{{ $data->id }}">
                                        <img 
                                            src="{{ $data->foto ? asset('storage/' . $data->foto) : asset('assets/img/avatar-placeholder.png') }}" 
                                            alt="foto" 
                                            class="w-100 rounded-circle">
                                    </a>
                                </div>
                            </div>

                            <!-- Status Anggota -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <p id="statusValue">{{ $data->status ?? '-' }}</p>
                            </div>

                            <!-- Alumni -->
                            <div class="form-group" id="alumniGroup" style="display: none;">
                                <label for="alumni">Menjadi alumni pada tahun</label>
                                <p>{{ $data->alumni ?? '-' }}</p>
                            </div>

                            <!-- Keterangan -->
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <p>{{ $data->keterangan ?? '-' }}</p>
                            </div>

                            <hr class="my-4 d-block">

                            <!-- Buttons -->
                            <div class="form-group">

                                @if(auth()->user()->hasRole('admin'))
                            
                                <!-- Tombol Ubah -->
                                <a href="{{ route('admin.anggota.edit', $data->id) }}" class="btn btn-dark">
                                    <i class="fa fa-edit"></i> Ubah 
                                </a>

                                <!-- Tombol Hapus -->
                                <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#forceDeleteModal{{ $data->id }}" title="Hapus Permanen">
                                    <i class="fa fa-trash"></i> Hapus
                                </a>

                                @endif
                            
                                <!-- Tombol Kembali -->
                                <a href="{{ auth()->user()->hasRole('admin') ? route('admin.anggota') : route('pimpinan.anggota') }}" class="btn">
                                    <i class="fa fa-arrow-left"></i> Kembali 
                                </a>

                            </div>

                            <x-kpm-modal 
                                :id="$data->id" 
                                :nama="$data->nama_lengkap" 
                                :kpm="$data->kpm" 
                            />

                            <x-ktp-modal 
                                :id="$data->id" 
                                :nama="$data->nama_lengkap" 
                                :ktp="$data->ktp" 
                            />

                            <x-foto-modal 
                                :id="$data->id" 
                                :nama="$data->nama_lengkap" 
                                :foto="$data->foto" 
                            />

                            <x-force-delete-modal 
                                :id="$data->id" 
                                :nama="$data->nama_lengkap" 
                                :route="route('admin.anggota.forceDelete', $data->id)" 
                            />

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Ambil nilai status
    var status = document.getElementById('statusValue').innerText;

    // Cek apakah status adalah "alumni"
    if (status.toLowerCase() === 'alumni') {
        // Tampilkan elemen "alumni"
        document.getElementById('alumniGroup').style.display = 'block';
    } else {
        // Sembunyikan elemen "alumni"
        document.getElementById('alumniGroup').style.display = 'none';
    }
</script>
@endpush 
