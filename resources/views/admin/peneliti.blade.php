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
                        <input name="id" type="hidden" value="{{($edit)?$edit->id:0}}" />
        
        	<div class="form-group">
        		<label for="nama">Nama</label>
        		<input type="text" class="form-control" id="" name="nama" placeholder="Nama Lengkap" value="{{($edit?$edit->nama:null)}}" required>
        	</div>
        
        	<div class="form-group">
        		<label for="nip">NIP</label>
        		<input type="number" class="form-control" id="" name="nip" placeholder="NIP" value="{{($edit?$edit->nip:null)}}" required>
        	</div>
        
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <div class="input-group">
                <select  class="form-control" id="" name="jabatan" value="{{($edit?$edit->jabatan:null)}}">
                    @foreach($jabatan as $d)    
                    <option value="{{$d->id}}">{{$d->nama}}</option>
                    @endforeach
                </select>
                <div class="input-group-btn">
                    <a class="btn btn-default" href="/admin/tambahjabatan">+</a>
                </div>
                </div>

            </div>
        
        	<div class="form-group">
        		<label for="pangkat">Pangkat / Golongan</label>
                <div class="input-group">
                <select  class="form-control" id="" name="pangkat" value="{{($edit?$edit->pangka:null)}}">
                    @foreach($pangkat as $d)    
                    <option value="{{$d->id}}">{{$d->nama}}</option>
                    @endforeach
                </select>
                <div class="input-group-btn">
                    <a class="btn btn-default" href="/admin/tambahpangkat">+</a>
                </div>
                </div>
        	</div>
        
        	<div class="form-group">
        		<label for="pendidikan">Pendidikan</label>
        		<input type="text" class="form-control" id="" name="pendidikan" placeholder="Pendidikan" required value="{{($edit?$edit->pendidikan:null)}}">
        	</div>
        
        	<div class="form-group">
                <label for="spesifik">Bidang Kepakaran</label>
                <div class="input-group">

                {!! Form::select('digit3', $digit2, ($edit?$edit->pakar_spesifik->pakar_digit3->id:null) , ['class' => 'form-control']) !!}
                <div class="input-group-btn">
                    <a class="btn btn-default" href="/admin/tambahdigit3">+</a>
                </div>
                </div>
                
            </div>
            <div class="form-group">
                <label for="spesifik">Kepakaran Spesifik</label>
                <div class="input-group">

                {!! Form::select('spesifik', $list_spesifik, ($edit?$edit->spesifik:null) , ['class' => 'form-control']) !!}
                <div class="input-group-btn">
                    <a class="btn btn-default" href="/admin/tambahspesifik">+</a>
                </div>
                </div>
            </div>
        
            <div class="form-group">
        		<label for="spesifik">Bulan/Tahun Pensiun</label>
        	   <input class="form-control datetimepicker" name="pensiun" value="{{($edit?explode('-',$edit->pensiun)[0]:null)}}-{{($edit?explode('-',$edit->pensiun)[1]:null)}}">
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
         viewMode: "months",
         minViewMode: "months",
        pick12HourFormat: false    
      })

})
</script>

@endsection