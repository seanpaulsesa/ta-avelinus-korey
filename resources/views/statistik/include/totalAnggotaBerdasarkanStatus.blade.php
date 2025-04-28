                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th class="text-center">Jumlah Anggota</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Total Anggota </td>
                                                <td class="text-center"><a href="{{ route('admin.anggota') }}">{{ $anggotaTotal ?? '' }}</a></td>
                                            </tr>
                                            <tr>
                                                <td>Anggota Baru</td>
                                                <td class="text-center"><a href="{{ route('admin.anggota.baru') }}">{{ $anggotaBaru ?? '' }}</a></td>
                                            </tr>
                                            <tr>
                                                <td>Anggota Pindah Masuk</td>
                                                <td class="text-center"><a href="{{ route('admin.anggota.pindahMasuk') }}">{{ $anggotaPindahMasuk ?? '' }}</a></td>
                                            </tr>
                                            <tr>
                                                <td>Anggota Pindah Keluar</td>
                                                <td class="text-center"><a href="{{ route('admin.anggota.pindahKeluar') }}">{{ $anggotaPindahKeluar ?? '' }}</a></td>
                                            </tr>
                                            <tr>
                                                <td>Anggota Draft</td>
                                                <td class="text-center"><a href="{{ route('admin.anggota.draft') }}">{{ $anggotaDraft ?? '' }}</a></td>
                                            </tr>
                                            <tr>
                                                <td>Anggota Alumni</td>
                                                <td class="text-center"><a href="{{ route('admin.anggota.alumni') }}">{{ $anggotaAlumni ?? '' }}</a></td>
                                            </tr>
                                        </tbody>
                                    </table>