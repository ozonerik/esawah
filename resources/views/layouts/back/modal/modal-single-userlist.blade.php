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
        <p>Apakah anda ingin menghapus user berikut :
        <span class="font-weight-bold">{{$row->name}}</span>
        </p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
        <form action="{{route('delsingleuser')}}" id="delform" method="POST">
          @csrf
          @method('delete')                    
          <input type="hidden" id="idsingle" name="idsingle" value="{{$row->id}}"/>
          <button type="submit" class="btn btn-danger" id="btn-hapus-single"><i class="fas fa-trash-alt"></i> Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- modal-singledit -->
<div class="modal fade" id="modal-singledit-{{$row->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <p class="h5"><i class="fa fa-question-circle"></i> Update Profile User</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>     
      <form action="{{route('updsingleuser')}}" id="updform" method="POST">
      @csrf 
      <div class="modal-body">
        <label for="name" >Name</label>                
        <div class="row">
          <div class="input-group mb-3">                 
            <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$row->name}}" required autocomplete="name">
          </div>
        </div>
        
        <label for="username" >User Name</label>                
        <div class="row">
          <div class="input-group mb-3">                
            <input id="username" type="text" placeholder="User Name" class="form-control @error('username') is-invalid @enderror" name="username" value="{{$row->username}}" required autocomplete="username">
          </div>
        </div>
        
        <label for="email" >E-Mail Address</label>
        <div class="row">
          <div class="input-group mb-3">
            <input id="email" type="email" placeholder="E-Mail Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$row->email}}" required autocomplete="email">
          </div>
        </div>
        
        <label for="userrole" >User Role</label>
        <div class="row">
        <div class="input-group mb-3">        
          <select id="userrole" name="userrole" class="custom-select @error('userrole') is-invalid @enderror" required>
            <option value="admin" @if($row->role == "admin") selected @endif >Admin</option>
            <option value="pro" @if($row->role == "pro") selected @endif >Pro</option>
            <option value="free" @if($row->role == "free") selected @endif >Free</option>
          </select>
        </div>
        </div>
      
        <div class="row">                              
          <div class="col-md-6 text-left">
            <label for="membership" >Membership&emsp;: </label>                    
            @if($row->role == 'admin')
                <span class="badge badge-primary">Admin</span>
            @elseif($row->role == 'pro')
                <span class="badge badge-info">Pro</span>
            @elseif($row->role == 'free')
                <span class="badge badge-warning">Free</span>
            @endif
          </div>
          <div class="col-md-6 text-right">
            @if(empty($row->request_code))
              <label for="status" >Status : </label> <span class="badge badge-primary">Active </span>         
            @else
              <label for="status" >Status : </label> <span class="badge badge-success">Waiting Request Cofirmed</span>
            @endif
          </div>
        </div>
        <div class="row">                              
          <div class="col-md-6 mb-3 text-left">
              <label for="expired" >User Expired&emsp;: </label>
              @if(!empty($row->user_expired))
              <span class="badge badge-info">
                {{convert_date($row->user_expired)}}              
              </span>
              @endif
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  
          <input type="hidden" id="idsingle" name="idsingle" value="{{$row->id}}"/>
          <button type="submit" class="btn btn-success" id="btn-update-single"><i class="fas fa-save"></i> Update Profile</button>
      </form>
      </div>
    </div>
  </div>
</div>