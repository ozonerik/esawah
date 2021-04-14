<!-- modal-delsuser -->
<div class="modal fade" id="modal-delsuser">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <p class="h5"><i class="fa fa-question-circle"></i> Delete Confirmation</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-justify">
        <p>Apakah anda ingin menghapus user berikut ini : 
        <span class="font-weight-bold" id="select-del"></span>
        </p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
        <button type="button" class="btn btn-danger" id="btn-konfirm-del"><i class="fas fa-trash-alt"></i> Hapus</button>
      </div>
    </div>
  </div>
</div>
<!-- modal-upgsuser -->
<div class="modal fade" id="modal-upgsuser">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <p class="h5"><i class="fa fa-question-circle"></i> Upgrade Confirmation</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-justify">
        <p>Apakah anda ingin mengupgrade menjadi <span class="badge badge-info">Pro</span> membership, user berikut ini : 
        <span class="font-weight-bold" id="select-upg"></span>
        </p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
        <button type="button" class="btn btn-success" id="btn-konfirm-upg"><i class="fas fa-arrow-circle-up"></i> Upgrade</button>
      </div>
    </div>
  </div>
</div>