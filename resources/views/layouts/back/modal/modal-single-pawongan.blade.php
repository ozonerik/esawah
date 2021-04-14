<!-- modal-singledel -->
<div class="modal fade" id="modal-singledel-{{$row->id}}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <p class="h5"><i class="fa fa-question-circle"></i> Delete Single Confirmation</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-justify">
        <p>Apakah anda ingin menghapus pawongan berikut :
        <span class="font-weight-bold">{{$row->nama}}</span>
        </p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
        <form action="{{route('delsinglepawongan')}}" id="delform" method="POST">
          @csrf
          @method('delete')                    
          <input type="hidden" id="idsingle" name="idsingle" value="{{$row->id}}"/>
          <button type="submit" class="btn btn-danger" id="btn-hapus-single"><i class="fas fa-trash-alt"></i> Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>