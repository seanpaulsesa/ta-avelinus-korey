                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Universitas</th>
                                                <th>Fakultas</th>
                                                <th>Program Studi</th>
                                                <th class="text-center">Jumlah Anggota</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($anggotaKampus as $anggota)
                                            @php
                                                // Mengambil data terkait program studi, fakultas, dan kampus
                                                $programStudi = $anggota->programstudi;
                                                $fakultas = $programStudi ? $programStudi->fakultas : null;
                                                $kampus = $fakultas ? $fakultas->kampus : null;
                                            @endphp
                                            <tr>
                                                <td>{{ $kampus->nama_kampus ?? '' }}</td>
                                                <td>{{ $fakultas->nama_fakultas ?? '' }}</td>
                                                <td>{{ $programStudi->nama_program_studi ?? '' }}</td>
                                                <td class="text-center">{{ $anggota->total }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="3" class="text-center">Tidak ada data</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>