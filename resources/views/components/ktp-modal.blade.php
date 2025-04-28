@props(['id', 'nama', 'ktp'])

<!-- Modal untuk Tampilkan KTP -->
<div class="modal fade" id="ktpModal{{ $id }}" tabindex="-1" aria-labelledby="ktpModalLabel{{ $id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ktpModalLabel{{ $id }}">Foto KTP - {{ $nama }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ $ktp ? asset('storage/' . $ktp) : asset('assets/img/kartu-placeholder.png') }}" alt="KTP" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</div>
