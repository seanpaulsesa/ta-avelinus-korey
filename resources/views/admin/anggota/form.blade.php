@extends('layouts.app')
@section('content')

        <!-- main content -->
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


                                    <!-- form start -->

                                    <form action="{{ isset($data) ? route('admin.anggota.update', $data->id) : route('admin.anggota.store') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @if(isset($data))
                                        @method('PUT') <!-- Method PUT untuk update -->
                                    @endif

                                    <!-- Tanggal Pendaftaran -->
                                    <div class="form-group">
                                        <label for="tanggal_pendaftaran">Tanggal Pendaftaran</label>
                                        <input type="date" class="form-control" id="tanggal_pendaftaran" name="tanggal_pendaftaran" value="{{ old('tanggal_pendaftaran', isset($data) ? $data->tanggal_pendaftaran : '') }}" required>
                                        <div class="invalid-feedback">
                                            Tanggal Pendaftaran harus diisi.
                                        </div>
                                    </div>

                                    <!-- Nama Lengkap -->
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Enter full name" value="{{ old('nama_lengkap', isset($data) ? $data->nama_lengkap : '') }}" required>
                                        <div class="invalid-feedback">Nama lengkap wajib diisi.</div>
                                    </div>

                                    <!-- Jenis Kelamin -->
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label><br>
                                        <div class="d-flex">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_l" value="L" 
                                                    {{ (isset($data) && $data->jenis_kelamin == 'L') ? 'checked' : '' }} required>
                                                <label class="form-check-label" for="jenis_kelamin_l">Laki-Laki</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_p" value="P"
                                                    {{ (isset($data) && $data->jenis_kelamin == 'P') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="jenis_kelamin_p">Perempuan</label>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">
                                            Jenis kelamin harus diisi.
                                        </div>
                                    </div>

                                    <!-- Tempat Lahir -->
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Enter place of birth" value="{{ old('tempat_lahir', isset($data) ? $data->tempat_lahir : '') }}" required>
                                        <div class="invalid-feedback">
                                            Tempat lahir harus diisi.
                                        </div>
                                    </div>

                                    <!-- Tanggal Lahir -->
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', isset($data) ? $data->tanggal_lahir : '') }}" required>
                                        <div class="invalid-feedback">
                                            Tanggal lahir harus diisi.
                                        </div>
                                    </div>

                                    <!-- Agama -->
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <select class="form-select" id="agama" name="agama" required>
                                            <option value="">Pilih Agama</option>
                                            <option value="Islam" {{ old('agama', isset($data) ? $data->agama : '') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                            <option value="Kristen Protestan" {{ old('agama', isset($data) ? $data->agama : '') == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                                            <option value="Kristen Katolik" {{ old('agama', isset($data) ? $data->agama : '') == 'Kristen Katolik' ? 'selected' : '' }}>Kristen Katolik</option>
                                            <option value="Hindu" {{ old('agama', isset($data) ? $data->agama : '') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                            <option value="Buddha" {{ old('agama', isset($data) ? $data->agama : '') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                            <option value="Khonghucu" {{ old('agama', isset($data) ? $data->agama : '') == 'Khonghucu' ? 'selected' : '' }}>Khonghucu</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Agama harus dipilih.
                                        </div>
                                    </div>


                                    <!-- Alamat Tinggal -->
                                    <div class="form-group">
                                        <label for="alamat_tinggal">Alamat Tinggal</label>
                                        <textarea class="form-control" id="alamat_tinggal" name="alamat_tinggal" placeholder="Enter address" required>{{ old('alamat_tinggal', isset($data) ? $data->alamat_tinggal : '') }}</textarea>
                                        <div class="invalid-feedback">
                                            Alamat tinggal harus diisi.
                                        </div>
                                    </div>

                                    <!-- No HP -->
                                    <div class="form-group">
                                        <label for="no_hp">No HP</label>
                                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Enter phone number"value="{{ old('no_hp', isset($data) ? $data->no_hp : '') }}" >
                                    </div>

                                    <!-- Email -->
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" value="{{ old('email', isset($data) ? $data->email : '') }}">
                                        <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>

                                    <!-- Kampus -->
                                    <div class="form-group">
                                        <label for="kampus">Kampus</label>
                                        <select class="form-select" id="kampus" name="kampus_id" required>
                                            <option value="">Pilih Kampus</option>
                                            @foreach ($kampus as $item)
                                                <option value="{{ $item->id }}" 
                                                    {{ (isset($data) && $data->programstudi->fakultas->kampus_id == $item->id) ? 'selected' : '' }}>
                                                    {{ $item->nama_kampus }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Kampus harus dipilih.
                                        </div>
                                    </div>

                                    <!-- Fakultas -->
                                    <div class="form-group" id="fakultas-group" style="display: {{ isset($data) && $data->programstudi->fakultas ? 'block' : 'none' }};">
                                        <label for="fakultas_id">Fakultas</label>
                                        <select class="form-select" id="fakultas" name="fakultas_id" required>
                                            <option value="">Pilih Fakultas</option>
                                            @foreach ($fakultas as $item)
                                                <option value="{{ $item->id }}" 
                                                    {{ (isset($data) && $data->programstudi->fakultas_id == $item->id) ? 'selected' : '' }}>
                                                    {{ $item->nama_fakultas }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Fakultas harus dipilih.
                                        </div>
                                    </div>

                                    <!-- Program Studi -->
                                    <div class="form-group" id="program-studi-group" style="display: {{ isset($data) && $data->programstudi ? 'block' : 'none' }};">
                                        <label for="program_studi_id">Program Studi</label>
                                        <select class="form-select" id="program_studi_id" name="program_studi_id" required>
                                            <option value="">Pilih Program Studi</option>
                                            @foreach ($programstudi as $item)
                                                <option value="{{ $item->id }}" 
                                                    {{ (isset($data) && $data->program_studi_id == $item->id) ? 'selected' : '' }}>
                                                    {{ $item->nama_program_studi }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Program Studi harus dipilih.
                                        </div>
                                    </div>



                                    <!-- KPM -->
                                    <div class="form-group">
                                        <label for="kpm">Kartu Pegawai Mahasiswa (KPM)</label>
                                        <div class="d-block">
                                            <a href="#">
                                                <img 
                                                    src="{{ isset($data->kpm) ? asset('storage/' . $data->kpm) : asset('assets/img/kartu-placeholder.png') }}" 
                                                    alt="kpm" 
                                                    class="w-50 mb-3">
                                            </a>
                                        </div>
                                        <input type="file" class="form-control" id="kpm" name="kpm">
                                    </div>

                                    <!-- NIM -->
                                    <div class="form-group">
                                        <label for="nim">NIM</label>
                                        <input type="text" class="form-control" id="nim" name="nim" placeholder="Enter NIM" value="{{ old('nim', isset($data) ? $data->nim : '') }}">
                                        @error('nim')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <!-- KTP -->
                                    <div class="form-group">
                                        <label for="ktp">KTP</label>
                                        <div class="d-block">
                                            <a href="#">
                                                <img 
                                                    src="{{ isset($data->ktp) ? asset('storage/' . $data->ktp) : asset('assets/img/kartu-placeholder.png') }}" 
                                                    alt="ktp" 
                                                    class="w-50 mb-3">
                                            </a>
                                        </div>
                                        <input type="file" class="form-control" id="ktp" name="ktp">
                                    </div>

                                    <!-- Foto -->
                                    <div class="form-group">
                                        <label for="foto">Foto Profil</label>
                                        <div class="avatar avatar-xl d-block mb-2">
                                            <a href="#">
                                                <img 
                                                    src="{{ isset($data->foto) ? asset('storage/' . $data->foto) : asset('assets/img/avatar-placeholder.png') }}" 
                                                    alt="foto" 
                                                    class="w-100 rounded-circle">
                                            </a>
                                        </div>
                                        <input type="file" class="form-control" id="foto" name="foto">
                                    </div>

                                    


                                    <!-- Status -->
                                    @php
                                        $statuses = ['Draft', 'Baru', 'Pindah Masuk', 'Pindah Keluar', 'Alumni'];
                                    @endphp

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-select" id="status" name="status" onchange="toggleAlumniField()">
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status }}" {{ old('status', $data->status ?? '') == $status ? 'selected' : '' }}>
                                                    {{ $status }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Alumni -->
                                    <div class="form-group" id="alumni-field" style="display: none;">
                                        <label for="alumni">Alumni</label>
                                        <input type="number" class="form-control" id="alumni" name="alumni" placeholder="Year" value="{{ old('alumni', isset($data) ? $data->alumni : '') }}">
                                    </div>


                                    <!-- Keterangan -->
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Enter additional notes">{{ old('keterangan', isset($data) ? $data->keterangan : '') }}</textarea>
                                    </div>

                                    <hr class="my-4 d-block">

                                    <!-- Submit Button -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-dark" id="submitButton">
                                            <i class="fa fa-save"></i> Simpan
                                        </button>
                                    
                                        <!-- Tombol Hapus -->
                                        <a href="{{ route('admin.anggota') }}" class="btn">
                                            <i class="fa fa-arrow-left"></i> Kembali 
                                        </a>

                                        @if(Request::segment(5) == 'edit')
                                        <!-- Tombol Hapus -->
                                        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#forceDeleteModal{{ $data->id }}" title="Hapus Permanen">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        @endif

                                    </div>
                                </form>

                                    
                                <!-- form end -->

                                @if(isset($data->id))

                                <x-force-delete-modal 
                                    :id="$data->id" 
                                    :nama="$data->nama_lengkap" 
                                    :route="route('admin.anggota.forceDelete', $data->id)" 
                                />

                                @endif
                                
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- end page-inner -->
        </div>
        <!-- end container -->

@stop

@push('scripts')



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Menangani perubahan pada dropdown Kampus
    $('#kampus').on('change', function () {
        const kampusId = $(this).val();

        if (kampusId) {
            $.ajax({
                url: `/admin/anggota/create/get-fakultas/${kampusId}`,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('#fakultas').empty().append('<option value="">Pilih Fakultas</option>');
                    $.each(data, function (key, value) {
                        $('#fakultas').append('<option value="' + value.id + '">' + value.nama_fakultas + '</option>');
                    });
                    $('#fakultas-group').show();
                    $('#program-studi-group').hide();
                }
            });
        } else {
            $('#fakultas-group').hide();
            $('#program-studi-group').hide();
        }
    });

    // Menangani perubahan pada dropdown Fakultas
    $('#fakultas').on('change', function () {
        const fakultasId = $(this).val();

        if (fakultasId) {
            $.ajax({
                url: `/admin/anggota/create/get-program-studi/${fakultasId}`,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('#program_studi_id').empty().append('<option value="">Pilih Program Studi</option>');
                    $.each(data, function (key, value) {
                        $('#program_studi_id').append('<option value="' + value.id + '">' + value.nama_program_studi + '</option>');
                    });
                    $('#program-studi-group').show();
                }
            });
        } else {
            $('#program-studi-group').hide();
        }
    });
</script>




<script>
document.getElementById('submitButton').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent form submission

    const form = this.closest('form');
    const requiredFields = form.querySelectorAll('[required]');
    let isFormValid = true;

    requiredFields.forEach(field => {
        // Handle radio button group
        if (field.type === 'radio') {
            const radioGroup = form.querySelectorAll(`input[name="${field.name}"]`);
            const isChecked = [...radioGroup].some(r => r.checked);
            if (!isChecked) {
                isFormValid = false;
                radioGroup.forEach(r => r.classList.add('is-invalid'));
            } else {
                radioGroup.forEach(r => r.classList.remove('is-invalid'));
            }
        }
        // Handle other input types
        else {
            if (!field.value || field.value.trim() === '') {
                field.classList.add('is-invalid');
                isFormValid = false;
            } else {
                field.classList.remove('is-invalid');
            }
        }
    });

    if (isFormValid) {
        form.submit();
    } else {
        // Optional: scroll to the first invalid field
        const firstInvalid = form.querySelector('.is-invalid');
        if (firstInvalid) {
            firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }
});
</script>


<script>
    // Fungsi untuk menampilkan atau menyembunyikan field alumni
    function toggleAlumniField() {
        var status = document.getElementById('status').value; // Ambil nilai status
        var alumniField = document.getElementById('alumni-field'); // Ambil elemen alumni field

        // Jika status adalah 'Alumni', tampilkan input alumni, jika tidak sembunyikan
        if (status === 'Alumni') {
            alumniField.style.display = 'block';
        } else {
            alumniField.style.display = 'none';
        }
    }

    // Jalankan fungsi saat halaman dimuat untuk memastikan kondisi awal sesuai
    window.onload = function() {
        toggleAlumniField();
    }
</script>

@endpush
