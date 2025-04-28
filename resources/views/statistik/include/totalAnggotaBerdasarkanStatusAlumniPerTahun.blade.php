                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Tahun Menjadi Alumni</th>
                                                <th class="text-center">Jumlah Alumni</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($alumniPerTahun as $alumni)
                                        <tr>
                                            <td>{{ $alumni->alumni ?? '' }}</td>
                                            <td class="text-center">{{ $alumni->total }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                        </tbody>
                                    </table>