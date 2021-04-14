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
        <p>Apakah anda ingin menghapus pawongan berikut ini : 
        <span class="font-weight-bold" id="select-del"></span>
        </p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
        <form action="{{route('delpawongan')}}" id="delsform" method="post">
          @csrf
          @method('DELETE')
          <input type="hidden" id="ids-del" name="ids" />
          <button type="submit" class="btn btn-danger" id="btn-konfirm-del"><i class="fas fa-trash-alt"></i> Hapus</button>
        </form>  
      </div>
    </div>
  </div>
</div>