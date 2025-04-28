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
                            <form action="{{ isset($data) ? route('admin.programstudi.update', $data->id) : route('admin.programstudi.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @if(isset($data))
                                    @method('PUT')
                                @endif
                                

                                <!-- Kampus -->
                                <div class="form-group">
                                    <label for="kampus_id">Kampus</label>
                                    <select class="form-select" id="kampus_id" name="kampus_id" required>
                                        <option value="">Pilih Kampus</option>
                                        @foreach ($kampus as $k)
                                            <option value="{{ $k->id }}" 
                                                {{ (isset($data) && (optional($data->fakultas->kampus)->id ?? old('kampus_id')) == $k->id) ? 'selected' : '' }}>
                                                {{ $k->nama_kampus }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Kampus harus dipilih.
                                    </div>
                                </div>
                                

                                <!-- Fakultas -->
                                <div class="form-group">
                                    <label for="fakultas_id">Fakultas</label>
                                    <select class="form-select" id="fakultas_id" name="fakultas_id" required data-selected="{{ old('fakultas_id', isset($data) ? $data->fakultas_id : '') }}">


                                        <option value="">Pilih Fakultas</option>
                                        @foreach ($fakultas as $k)
                                            <option value="{{ $k->id }}" {{ old('fakultas_id', isset($data) ? $data->fakultas_id : '') == $k->id ? 'selected' : '' }}>
                                                {{ $k->nama_fakultas }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Kampus harus dipilih.
                                    </div>
                                </div>

                                <!-- Nama Program Studi -->
                                <div class="form-group">
                                    <label for="nama_program_studi">Nama Program Studi</label>
                                    <input type="text" class="form-control" id="nama_program_studi" name="nama_program_studi" placeholder="Masukkan nama program studi" value="{{ old('nama_program_studi', isset($data) ? $data->nama_program_studi : '') }}" required>
                                    <div class="invalid-feedback">Nama program studi wajib diisi.</div>
                                </div>

                                <!-- Keterangan -->
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Tulis keterangan tambahan">{{ old('keterangan', isset($data) ? $data->keterangan : '') }}</textarea>
                                </div>

                                <hr class="my-4 d-block">

                                <!-- Tombol Submit -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark" id="submitButton">
                                        <i class="fa fa-save"></i> Simpan
                                    </button>

                                    <!-- Tombol Kembali -->
                                    <a href="{{ route('admin.programstudi.index') }}" class="btn">
                                        <i class="fa fa-arrow-left"></i> Kembali 
                                    </a>

                                    @if(Request::segment(5) == 'edit')
                                    <!-- Tombol Hapus Permanen -->
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
                                :nama="$data->nama_programstudi" 
                                :route="route('admin.programstudi.forceDelete', $data->id)" 
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



<script>
    document.addEventListener("DOMContentLoaded", function () {
        const kampusSelect = document.getElementById('kampus_id');
        const fakultasSelect = document.getElementById('fakultas_id');

        function loadFakultas(kampusId, selectedFakultasId = null) {
            // Tampilkan loading saat fetch fakultas
            fakultasSelect.innerHTML = '<option value="">Memuat daftar fakultas...</option>';

            if (kampusId) {
                fetch(`{{ route('get.fakultas.by.kampus', '') }}/${kampusId}`)
                    .then(response => response.json())
                    .then(data => {
                        fakultasSelect.innerHTML = '<option value="">Pilih Fakultas</option>'; // reset
                        data.forEach(item => {
                            const option = document.createElement('option');
                            option.value = item.id;
                            option.text = item.nama_fakultas;

                            if (selectedFakultasId && item.id == selectedFakultasId) {
                                option.selected = true;
                            }

                            fakultasSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Gagal mengambil data fakultas:', error);
                        fakultasSelect.innerHTML = '<option value="">Gagal memuat fakultas</option>';
                    });
            } else {
                fakultasSelect.innerHTML = '<option value="">Pilih Fakultas</option>';
            }
        }


        // Saat memilih kampus, ambil fakultas yang sesuai
        kampusSelect.addEventListener('change', function () {
            loadFakultas(this.value);
        });

        // Load fakultas secara otomatis jika di halaman edit
        const selectedKampusId = kampusSelect.value;
        const selectedFakultasId = fakultasSelect.dataset.selected;

        if (selectedKampusId && selectedFakultasId) {
            loadFakultas(selectedKampusId, selectedFakultasId);
        } else {
            fakultasSelect.innerHTML = '<option value="">Pilih Fakultas</option>';
        }
    });
</script>







<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
document.getElementById('submitButton').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent form submission

    const form = this.closest('form');
    const requiredFields = form.querySelectorAll('[required]');
    let isFormValid = true;

    requiredFields.forEach(field => {
        if (!field.value || field.value.trim() === '') {
            field.classList.add('is-invalid');
            isFormValid = false;
        } else {
            field.classList.remove('is-invalid');
        }
    });

    if (isFormValid) {
        form.submit();
    } else {
        const firstInvalid = form.querySelector('.is-invalid');
        if (firstInvalid) {
            firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }
});
</script>

@endpush
