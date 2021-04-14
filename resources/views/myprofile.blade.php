@extends('layouts.back')
@push('styles')

@endpush
@section('content')	
    <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">My Profile</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <form class="form-signin" method="POST" action="{{ route('updateprofile',Crypt::encryptString($result->id)) }}">
                @csrf
                
                <label for="name" >Name</label>                
                <div class="row">
                  <div class="input-group col-md-6 mb-3">                 
                    <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$result->name}}" required autocomplete="name">
                  </div>
                </div>
                
                <label for="username" >User Name</label>                
                <div class="row">
                  <div class="input-group col-md-6 mb-3">                
                    <input id="username" type="text" placeholder="User Name" class="form-control @error('username') is-invalid @enderror" name="username" value="{{$result->username}}" required autocomplete="username">
                  </div>
                </div>
                
                <label for="email" >E-Mail Address</label>
                <div class="row">
                  <div class="input-group col-md-6 mb-3">
                    <input id="email" type="email" placeholder="E-Mail Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$result->email}}" required autocomplete="email">
                  </div>
                </div>

                <label for="current-password" >Current Password</label>
                <div class="row">
                  <div class="input-group col-md-6 mb-3">
                    <input data-toggle="password" id="current-password" type="password" placeholder="Current Password" class="form-control @error('current-password') is-invalid @enderror" name="current-password" required autocomplete="password">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fa fa-eye"></i></span>
                    </div>
                  </div>
                </div>
                
                <label for="password" >New Password</label>
                <div class="row">
                  <div class="input-group col-md-6 mb-3">
                    <input data-toggle="password" id="password" type="password" placeholder="New Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fa fa-eye"></i></span>
                    </div>
                  </div>
                </div>
                
                <label for="password-confirm" >Confirm New Password</label>
                <div class="row">
                  <div class="input-group col-md-6 mb-3">
                    <input data-toggle="password" id="password-confirm" type="password" placeholder="Confirm New Password" class="form-control" name="password_confirmation" required>
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fa fa-eye"></i></span>
                    </div>
                  </div>
                </div>
              
                <div class="row">                              
                    <div class="col-6 col-md-3 text-left">
                      <label for="membership" >Membership&emsp;: </label>                    
                      @if($result->role == 'admin')
                          <span class="badge badge-primary">Admin</span>
                      @elseif($result->role == 'pro')
                          <span class="badge badge-info">Pro</span>
                      @elseif($result->role == 'free')
                          <span class="badge badge-warning">Free</span>
                      @endif
                    </div>
                    <div class="col-6 col-md-3 text-right">
                      @if(empty($result->request_code))
                        <label for="status" >Status : </label> <span class="badge badge-primary">Active </span>         
                      @else
                        <label for="status" >Status : </label> <span class="badge badge-success">Waiting Request Cofirmed</span>
                      @endif
                    </div>
                  </div>
                  <div class="row">                              
                    <div class="col-md-6 text-left">
                        <label for="expired" >User Expired&emsp;: </label>
                        @if(!empty($result->user_expired))
                        <span class="badge badge-info">
                          {{convert_date($result->user_expired)}}              
                        </span>
                        @endif
                    </div>
                  </div>
                
                @if($result->role == 'free')
                  @if($result->request_code !== null)
                    <div class="row">                              
                      <div class="col-md-6 mb-3">
                        <div class="alert alert-info text-justify" role="alert">
                          Silahkan mengaktivasi Upgrade Request anda, dengan cara:
                          <ul>
                            <li>Lakukan pembayaran upgrade
                            <span class="bg-light text-dark font-center font-weight-bold rounded px-2 mx-2">
                            Rp.25.000
                            </span>
                             ke salahsatu Nomor Rekening berikut ini:</li>
                            <div class="bg-light text-dark font-weight-bold rounded px-2">
                            04-7898-3070 an. ADE ERIK (BCA)<br>
                            13900-1120-6087 an. ADE ERIK (MANDIRI)<br>
                            00-7351-7578 an. ADE ERIK (BNI)
                            </div>
                            <li>Beri keterangan 
                            <div class="bg-light text-dark font-weight-bold rounded px-2" >REQ {{$result->request_code}}</div> pada kolom berita transfer</li>
                            <li>Kirim konfirmasi via WhatsApp degan format:
                            <div class="bg-light text-dark font-weight-bold rounded px-2" >REQ {{$result->request_code}}</div>
                            dengan melampirkan bukti pembayaran ke No. <div class="bg-light text-dark font-weight-bold rounded px-2">0813-2427-5362</div>
                            </li>
                            <li>Tunggu akun teraktivasi maks. 3x24 jam setelah pembayaran diterima</li>
                            <li>Silahkan Hub. 
                            <div class="bg-light text-dark font-weight-bold rounded px-2">0813-2427-5362</div>
                            jika anda mengalami kendala
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  @endif
                @endif
                
                <div class="row">
                  <div class="col-6 col-md-3 text-left">
                    @if($result->role == 'free')
                      @if(empty($result->request_code))                      
                        <a href="{{route('upgradeprofile',Crypt::encryptString($result->id))}}" class="btn btn-success">
                        Upgrade Request
                        </a>
                      @else
                        <a href="{{route('cancelupgradeprofile',Crypt::encryptString($result->id))}}" class="btn btn-warning">
                        Cancel Upgrade Request
                        </a>
                      @endif
                    @endif

                  </div>
                  <div class="col-6 col-md-3 text-right">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Profile
                    </button>
                  </div>
                </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
@endsection
@push('scripts')

@endpush