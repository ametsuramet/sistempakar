@extends('master')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Pangkat/Golongan</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">


        <form action="/admin/tambahpangkat" method="POST" role="form">
                        <input name="_token" type="hidden" value="{{csrf_token()}}" />
        
        	<div class="form-group">
        		<label for="nama">Pangkat/Golongan</label>
        		<input type="text" class="form-control" id="" name="nama" placeholder="Pangkat/Golongan">
        	</div>
        
        
        	<button type="submit" class="btn btn-primary">Submit</button>
        </form>
    	</div>
    </div>
</div>
@endsection