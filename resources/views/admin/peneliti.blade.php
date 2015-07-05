@extends('master')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Peneliti</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">


        <form action="tambahpeneliti" method="POST" role="form">
                        <input name="_token" type="hidden" value="{{csrf_token()}}" />
        
        	<div class="form-group">
        		<label for="nama">Nama</label>
        		<input type="text" class="form-control" id="" name="nama" placeholder="Nama Lengkap">
        	</div>
        
        	<div class="form-group">
        		<label for="nip">NIP</label>
        		<input type="number" class="form-control" id="" name="nip" placeholder="NIP">
        	</div>
        
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <select  class="form-control" id="" name="jabatan">
                    @foreach($jabatan as $d)    
                    <option value="{{$d->id}}">{{$d->nama}}</option>
                    @endforeach
                </select>
            </div>
        
        	<div class="form-group">
        		<label for="pangkat">Pangkat / Golongan</label>
                <select  class="form-control" id="" name="pangkat">
                    @foreach($pangkat as $d)    
                    <option value="{{$d->id}}">{{$d->nama}}</option>
                    @endforeach
                </select>
        	</div>
        
        	<div class="form-group">
        		<label for="pendidikan">Pendidikan</label>
        		<input type="text" class="form-control" id="" name="pendidikan" placeholder="Pendidikan">
        	</div>
        
        	<div class="form-group">
                <label for="spesifik">Bidang Kepakaran</label>
                <select  class="form-control" id="" name="digit3">
                <option>------Pilih Bidang Kepakaran------</option>
                    @foreach($digit2 as $dg2)    
                    <optgroup label="{{$dg2->nama}}">
                        @foreach($dg2->pakar_digit3 as $d)    
                        <option value="{{$d->id}}">{{$d->nama}}</option>
                        @endforeach
                    </optgroup>
                    @endforeach
                </select>
            </div>
        
            <div class="form-group">
                <label for="spesifik">Kepakaran Spesifik</label>
                <select  class="form-control" id="" name="spesifik">
                    
                </select>
            </div>
        
            <div class="form-group">
        		<label for="spesifik">Bulan/Tahun Pensiun</label>
        	   <input class="form-control datetimepicker" name="pensiun"></div>
        	</div>
        
        	
        
        	<button type="submit" class="btn btn-primary">Submit</button>
        </form>
    	</div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function(){
    
    $('[name=digit3]').change(function(){
        $.get('/admin/ajaxSpesifik?digit3='+$(this).val(),function(data){
            var html = ""
            $.each(data,function(i,item){
                html+='<option value="'+item.id+'">'+item.nama+'</option>'
            });
            $('[name=spesifik]').html(html)
        })
    })
      $('.datetimepicker').datetimepicker({
        format: 'YYYY-MM',
        pick12HourFormat: false    
      })

})
</script>

@endsection