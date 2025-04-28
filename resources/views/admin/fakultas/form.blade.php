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
                            <form action="{{ isset($data) ? route('admin.fakultas.update', $data->id) : route('admin.fakultas.store') }}" enctype="multipart/form-data" method="POST">
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
                                            <option value="{{ $k->id }}" {{ old('kampus_id', isset($data) ? $data->kampus_id : '') == $k->id ? 'selected' : '' }}>
                                                {{ $k->nama_kampus }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Kampus harus dipilih.
                                    </div>
                                </div>


                                <!-- Nama Fakultas -->
                                <div class="form-group">
                                    <label for="nama_fakultas">Nama Fakultas</label>
                                    <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas" placeholder="Masukkan nama fakultas" value="{{ old('nama_fakultas', isset($data) ? $data->nama_fakultas : '') }}" required>
                                    <div class="invalid-feedback">Nama fakultas wajib diisi.</div>
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
                                    <a href="{{ route('admin.fakultas.index') }}" class="btn">
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
                                :nama="$data->nama_fakultas" 
                                :route="route('admin.fakultas.forceDelete', $data->id)" 
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
