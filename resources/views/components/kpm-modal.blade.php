@props(['id', 'nama', 'kpm'])

<!-- Modal untuk Tampilkan KPM -->
<div class="modal fade" id="kpmModal{{ $id }}" tabindex="-1" aria-labelledby="kpmModalLabel{{ $id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kpmModalLabel{{ $id }}">Foto KPM - {{ $nama }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ $kpm ? asset('storage/' . $kpm) : asset('assets/img/kartu-placeholder.png') }}" alt="KPM" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</div>
