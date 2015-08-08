@if(Session::has('success'))
    <div class="alert alert-success alert-dismissable">
          <i class="fa fa-check"></i>
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <b>Attention!</b>  {{Session::get('success')}}
      </div>                         
@endif

@if(Session::has('danger'))
    <div class="alert alert-danger alert-dismissable">
          <i class="fa fa-check"></i>
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <b>Alert!</b>  {{Session::get('danger')}}
      </div>                         
@endif   