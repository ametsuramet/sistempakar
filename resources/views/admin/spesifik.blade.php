@extends('master')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Bidang Kepakaran Spesifik</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">


        <form action="/admin/tambahspesifik" method="POST" role="form">
                        <input name="_token" type="hidden" value="{{csrf_token()}}" />
                        <input name="id" type="hidden"  value="{{($edit?$edit->id:0)}}" />
        
            <div class="form-group">
                <label for="nama">Bidang Kepakaran Spesifik</label>
                <input type="text" class="form-control" id="" name="nama" placeholder="Bidang Kepakaran Spesifik" value="{{($edit?$edit->nama:'')}}">
            </div>
            
            
        
        	<div class="form-group">
        		<label for="nama">Bidang Kepakaran Digit 3 </label>
                <div class="input-group">
                    <select class="form-control" name='digit3'>
                        @foreach($digit2 as $dg2)    
                        <optgroup label="{{$dg2->nama}}">
                        	@foreach($dg2->pakar_digit3 as $d)    
                        	<option value="{{$d->id}}" {{($edit?($edit->pakar_digit3->id==$d->id?'selected':null):null)}}>{{$d->nama}}</option>
                        	@endforeach
                        </optgroup>
                        @endforeach
                    </select>
                    <div class="input-group-btn">
                        <a class="btn btn-default" href="/admin/tambahdigit3">+</a>
                    </div>
                </div>
        	</div>
            

        
        	<button type="submit" class="btn btn-primary">Submit</button>
        </form>
    	</div>
    </div>
</div>
@endsection