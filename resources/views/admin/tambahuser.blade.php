@extends('master')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah User</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">


        <form action="/admin/tambahuser" method="POST" role="form">
                        <input name="_token" type="hidden" value="{{csrf_token()}}" />
                        <input name="id" type="hidden" value="{{($edit?$edit->id:0)}}" />
        
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="" name="name" placeholder="Nama"  value="{{($edit?$edit->name:null)}}">
            </div>
        
        
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="" name="email" placeholder="email"  value="{{($edit?$edit->email:null)}}">
            </div>
        
        	<div class="form-group">
        		<label for="password">Password</label>
        		<input type="password" class="form-control" id="" name="password" placeholder="password"  value="">
        	</div>
        
        
        	<button type="submit" class="btn btn-primary">Submit</button>
        </form>
    	</div>
    </div>
</div>
@endsection