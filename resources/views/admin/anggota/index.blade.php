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
                                        :btnCreate="route('admin.anggota.create')"
                                        :formAction="Request::segment(3) == 'trash' 
                                            ? route('admin.anggota.trash') 
                                            : route('admin.anggota')"
                                    />

                                    <!-- table-responsieve start -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tanggal Pendaftaran</th>
                                                    <th>Foto</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>KPM</th>
                                                    <th>NIM</th>
                                                    <th>KTP</th>
                                                    <th>Kampus</th>
                                                    <th>Fakultas</th>
                                                    <th>Program Studi</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Tempat, Tanggal Lahir</th>
                                                    <th>Agama</th>
                                                    <th>Alamat Tinggal</th>
                                                    <th>Nomor HP</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    @if(Request::segment(3) == '' || Request::segment(3) == 'alumni')
                                                    <th>Alumni</th>
                                                    @endif
                                                    <th>Keterangan</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($datas as $key => $item)
                                                <tr>
                                                    <th scope="row">{{ $i + $key + 1 }}</th>
                                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_pendaftaran)->translatedFormat('l, d F Y') }}</td>
                                                    <td>
                                                        <div class="avatar avatar-xl">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#fotoModal{{ $item->id }}">
                                                                <img 
                                                                    src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('assets/img/avatar-placeholder.png') }}" 
                                                                    alt="foto" 
                                                                    class="w-100 rounded-circle">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>{!! $item->nama_lengkap !!}</td>
                                                    <td>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#kpmModal{{ $item->id }}" class="fs-4" @if(!$item->kpm) style="color:#a6a6a6" @endif><i class="fa fa-id-card"></i></a>
                                                    </td>
                                                    <td>{!! $item->nim !!}</td>
                                                    <td>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#ktpModal{{ $item->id }}" class="fs-4" @if(!$item->ktp) style="color:#a6a6a6" @endif><i class="fa fa-id-card"></i></a>
                                                    </td>
                                                    <td>{!! $item->programstudi->fakultas->kampus->nama_kampus !!}</td>
                                                    <td>{!! $item->programstudi->fakultas->nama_fakultas !!}</td>
                                                    <td>{!! $item->programstudi->nama_program_studi !!}</td>
                                                    <td>
                                                        {!! $item->jenis_kelamin == 'P' ? 'Perempuan' : ($item->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Unknown') !!}
                                                    </td>
                                                    <td>{{ $item->tempat_lahir }}, {{ \Carbon\Carbon::parse($item->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                                                    <td>{!! $item->agama !!}</td>
                                                    <td>{!! $item->alamat_tinggal !!}</td>
                                                    <td>{!! $item->no_hp !!}</td>
                                                    <td>{!! $item->email !!}</td>
                                                    <td>{!! $item->status !!}</td>
                                                    
                                                    @if(Request::segment(3) == '' || Request::segment(3) == 'alumni' )
                                                    <td>{!! $item->alumni !!}</td>
                                                    @endif
                                                    <td>{!! $item->keterangan !!}</td>
                                                    
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <a href="{{ auth()->user()->hasRole('admin') ? route('admin.anggota.show', $item->id) : route('pimpinan.anggota.show', $item->id) }}" class="btn btn-sm btn-primary d-flex align-items-center gap-2" title="Detail">
                                                                <i class="fa fa-eye"></i> Detail
                                                            </a>
                                                            @if(auth()->user()->hasRole('admin'))
                                                            <a href="{{ route('admin.anggota.edit', $item->id) }}" class="btn btn-sm" title="Ubah">
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

                                                <x-kpm-modal 
                                                    :id="$item->id" 
                                                    :nama="$item->nama_lengkap" 
                                                    :kpm="$item->kpm" 
                                                />

                                                <x-ktp-modal 
                                                    :id="$item->id" 
                                                    :nama="$item->nama_lengkap" 
                                                    :ktp="$item->ktp" 
                                                />

                                                <x-force-delete-modal 
                                                    :id="$item->id" 
                                                    :nama="$item->nama_lengkap" 
                                                    :route="route('admin.anggota.forceDelete', $item->id)" 
                                                />

                                                <x-foto-modal 
                                                    :id="$item->id" 
                                                    :nama="$item->nama_lengkap" 
                                                    :foto="$item->foto" 
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
