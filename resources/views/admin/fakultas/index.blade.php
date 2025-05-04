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
            <div class="col-12">
                <div class="card">
                <div class="card-body">

                    <x-alert />

                    <!-- toolbar -->
                    <x-admin.toolbar 
                    :btnCreate="route('admin.fakultas.create')"
                    :formAction="Request::segment(3) == 'trash' 
                        ? route('admin.fakultas.trash') 
                        : route('admin.fakultas.index')"
                    />

                    <!-- table-responsieve start -->
                    <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Fakultas</th>
                            <th>Kampus</th>
                            <th>Keterangan</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($datas as $key => $item)
                        <tr>
                            <th scope="row">{{ $i + $key + 1 }}</th>
                            <td>{!! $item->nama_fakultas !!}</td>
                            <td>{!! $item->kampus->nama_kampus ?? '' !!}</td>
                            <td>{!! $item->keterangan !!}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y H:i') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->updated_at)->translatedFormat('d F Y H:i') }}</td>
                            <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ auth()->user()->hasRole('admin') ? route('admin.fakultas.show', $item->id) : route('pimpinan.fakultas.show', $item->id) }}" class="btn btn-sm btn-primary d-flex align-items-center gap-2" title="Detail">
                                    <i class="fa fa-eye"></i> Detail
                                </a>

                                @if(auth()->user()->hasRole('admin'))
                                <a href="{{ route('admin.fakultas.edit', $item->id) }}" class="btn btn-sm" title="Ubah">
                                    <i class="fa fa-edit"></i> 
                                </a>

                                <!-- Tombol Hapus -->
                                <a href="#" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#forceDeleteModal{{ $item->id }}" title="Hapus Permanen">
                                    <i class="fa fa-trash"></i>
                                </a>
                                @endif

                            </div>
                            </td>
                        </tr>

                        <x-force-delete-modal 
                            :id="$item->id" 
                            :nama="$item->nama_fakultas" 
                            :route="route('admin.fakultas.forceDelete', $item->id)" 
                        />

                        @empty 
                        <p>Tidak ada data</p>
                        @endforelse
                        </tbody>
                    </table>

                    <div>
                        {{ $datas->links('pagination::bootstrap-5') }}
                    </div>

                    </div>
                    <!-- table-responsieve end -->
                
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
