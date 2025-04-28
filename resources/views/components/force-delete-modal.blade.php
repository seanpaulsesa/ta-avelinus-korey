@props(['id', 'nama', 'route'])

<!-- Modal Konfirmasi Hapus Permanen -->
<div class="modal fade" id="forceDeleteModal{{ $id }}" tabindex="-1" aria-labelledby="forceDeleteModalLabel{{ $id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-danger">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="forceDeleteModalLabel{{ $id }}">Konfirmasi Hapus Permanen</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body text-center">
                <p>Apakah Anda yakin ingin <strong>menghapus permanen</strong> data <strong>{{ $nama }}</strong>?<br>
                Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="modal-footer">
                <form action="{{ $route }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                    <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i> Ya, Hapus Permanen</button>
                </form>
            </div>
        </div>
    </div>
</div>
