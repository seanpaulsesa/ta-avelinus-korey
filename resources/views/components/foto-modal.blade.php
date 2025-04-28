@props(['id', 'nama', 'foto'])

<!-- Modal untuk Tampilkan Foto -->
<div class="modal fade" id="fotoModal{{ $id }}" tabindex="-1" aria-labelledby="fotoModalLabel{{ $id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fotoModalLabel{{ $id }}">Foto - {{ $nama }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ $foto ? asset('storage/' . $foto) : asset('assets/img/avatar-placeholder.png') }}" alt="Foto" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</div>
