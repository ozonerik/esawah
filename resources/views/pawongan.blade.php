@extends('layouts.back')
@push('styles')
<!-- https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css -->
<link rel="stylesheet" href="{{ asset('back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<!-- https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css -->
<link rel="stylesheet" href="{{ asset('back/plugins/datatables-responsive/css/responsive.dataTables.min.css') }}">
<!-- https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.10/css/dataTables.checkboxes.css -->
<link rel="stylesheet" href="{{ asset('back/plugins/datatables-gyrocode/css/dataTables.checkboxes.css') }}" />
<!-- https://nightly.datatables.net/select/css/select.dataTables.css -->
<link rel="stylesheet" href="{{ asset('back/plugins/datatables-select/css/select.dataTables.css') }}" />
@endpush
@section('content')	
    <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Pawongan</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <button type="button" id="btn-aksi" class="btn btn-danger mb-3">
                  <i class="fas fa-trash-alt"></i> Delete Selection
                </button>
                @include('layouts.back.modal.modal-select-pawongan')  
                <table id="table_pawongan" class="display table dt-responsive nowrap" style="width:100%">
                  <thead>
                      <tr>
                          <th></th>
                          <th>Id</th>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>Telp</th>
                          <th>Photo</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $row)
                      <tr>
                          <td></td>
                          <th>{{$row->id}}</th>
                          <td>{{$row->nama}}</td>
                          <td>{{$row->alamat}}</td>
                          <td>{{$row->telp}}</td>
                          <td>{{$row->photo}}</td>                      
                          <td>
                            <button type="button" id="delrow" class="btn btn-danger btn-sm" 
                            data-toggle="modal" data-target="#modal-singledel-{{$row->id}}">
                              <i class="fas fa-trash-alt"></i>
                            </button>
                            <button type="button" id="delrow" class="btn btn-success btn-sm" 
                            data-toggle="modal" data-target="">
                              <i class="fas fa-edit"></i>
                            </button>
                          </td>
                          @include('layouts.back.modal.modal-single-pawongan')
                      </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                      <tr>
                          <th></th>
                          <th>Id</th>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>Telp</th>
                          <th>Photo</th>
                          <th>Action</th>
                      </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
@endsection
@push('scripts')
<!--https://cdn.datatables.net/v/dt/dt-1.10.16/sl-1.2.5/datatables.min.js-->
<script src="{{ asset('back/plugins/datatables/datatables.min.js') }}"></script>
<!--https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js-->
<script src="{{ asset('back/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!--https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js-->
<script src="{{ asset('back/plugins/datatables-responsive/js/2.2.5.dataTables.responsive.min.js') }}"></script>
<!--https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.10/js/dataTables.checkboxes.min.js-->
<script src="{{ asset('back/plugins/datatables-gyrocode/js/dataTables.checkboxes.min.js') }}"></script>
<!--https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js-->
<script src="{{ asset('back/plugins/datatables-select/js/dataTables.select.min.js') }}"></script>
<script>
$(document).ready( function () {
  var events = $('#events');
  var selectrow=[];
  var selectname="";
  //config datatables
  var table = $('#table_pawongan').DataTable({
    paging: true,
    searching: true,
    responsive: true,
    ordering:true,
    pagingType: 'full_numbers',
    lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All']],
    lengthChange: true,
    pageLength: 10,
    scrollY: 500,
    scrollCollapse: true,
    language: {
      paginate: {
        previous:   "Prev"
      }
    },
    select: {
         style: 'multi',
         selector: 'td:first-child'
    },
    columnDefs: [
          {
            targets: 0,
            searchable: false,
            orderable: false,
            checkboxes: {
               selectRow: true,
               selectCallback: function(){
                  getrow();
               },
               selectAllCallback: function(){
                  getrow();
               },
               selectAllPages:false
            }
          },
          {
            targets: -2,
            searchable: false,
            orderable: false,
          },
          {
            targets: 1,
            visible: false,
            searchable: false,
            orderable: false,
          },
          {
            targets: -1,
            searchable: false,
            orderable: false,
          },
          { responsivePriority: 1, targets: 0 },
          { responsivePriority: 2, targets: -1 }
    ],
    order: [],
  });
  
  function getrow(){
   //get id
   var data = table.rows( { selected: true } ).data().pluck(1).toArray();
   selectrow = data;
   document.getElementById('ids-del').value = data.join(',');
   //get name
   var dataname = table.rows( { selected: true } ).data().pluck(2).toArray();
   selectname = dataname.join(', ')
  };
  
  //event select action
  $("#btn-aksi").click(function(){
    
    //cek jumlah seleksi
    if (selectrow.length > 0){
      //open modal konfirm
      document.getElementById('select-del').innerHTML = selectname;
      $('#modal-delsuser').modal();       
      return false;
    }else{
      toastr.error('Tidak ada data yang dihapus') ;
      return false;
    };
    
    //close all modal except this
    $('.modal').on('show.bs.modal', function () {
      $('.modal').not($(this)).each(function () {
          $(this).modal('hide');
      });
    });
    
  });
  
});
</script>
@endpush