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

                            <!-- Nama Kampus -->
                            <div class="form-group">
                                <label for="nama_kampus">Kampus</label>
                                <p>{{ $data->kampus->nama_kampus ?? '' }}</p>
                            </div>

                            <!-- Nama Fakultas -->
                            <div class="form-group">
                                <label for="nama_fakultas">Nama Fakultas</label>
                                <p>{{ $data->nama_fakultas ?? '' }}</p>
                            </div>

                            <!-- Keterangan -->
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <p>{{ $data->keterangan ?? '' }}</p>
                            </div>

                            <hr class="my-4 d-block">

                            <!-- Buttons -->
                            <div class="form-group">

                                @if(auth()->user()->hasRole('admin'))
                            
                                <!-- Tombol Ubah -->
                                <a href="{{ route('admin.fakultas.edit', $data->id) }}" class="btn btn-dark">
                                    <i class="fa fa-edit"></i> Ubah 
                                </a>

                                <!-- Tombol Hapus -->
                                <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#forceDeleteModal{{ $data->id }}" title="Hapus Permanen">
                                    <i class="fa fa-trash"></i> Hapus
                                </a>

                                @endif
                            
                                <!-- Tombol Kembali -->
                                <a href="{{ auth()->user()->hasRole('admin') ? route('admin.fakultas.index') : route('pimpinan.fakultas.index') }}" class="btn">
                                    <i class="fa fa-arrow-left"></i> Kembali 
                                </a>

                            </div>

                            <!-- Modal Hapus Permanen -->
                            <x-force-delete-modal 
                                :id="$data->id" 
                                :nama="$data->nama_fakultas" 
                                :route="route('admin.fakultas.forceDelete', $data->id)" 
                            />

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
