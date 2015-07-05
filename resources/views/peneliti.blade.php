@extends('master')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Peneliti 
            @if(Auth::user())
            <a class="btn btn-primary pull-right" href="/admin/tambahpeneliti"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Peneliti</a>
            @endif
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
    	<div class="col-md-12">
    		<div class="table-responsive">
    			<table class="table table-bordered table-hover">
    				<thead>
    					<tr>
    						<th>No</th>
    						<th>Digit 2</th>
    						<th>Digit 3</th>
    						<th>Nama Peneliti</th>
    						<th>NIP</th>
    						<th>Jabatan</th>
    						<th>Pendidikan</th>
    						<th>Pangkat/Golongan</th>
    						<th>Kepakaran / Spesifik</th>
    						<th>Bulan/Thn Pensiun</th>
    					</tr>
    				</thead>
    				<tbody>
    					@if(count($data))
    					@foreach($data as $i=>$d)
    					<tr>
    						<td>{{$i+1}}</td>
    						<td><a href='/peneliti?digit2={{$d->pakar_spesifik->pakar_digit3->pakar_digit2->id}}'>{{$d->pakar_spesifik->pakar_digit3->pakar_digit2->nama}}</a></td>
    						<td>{{$d->pakar_spesifik->pakar_digit3->nama}}</td>
    						<td>{{$d->nama}}</td>
    						<td>{{$d->nip}}</td>
    						<td>{{$d->detail_jabatan->nama}}</td>
    						<td>{{$d->pendidikan}}</td>
    						<td>{{$d->detail_pangkat->nama}}</td>
    						<td>{{$d->pakar_spesifik->nama}}</td>
    						<td>{{date('M Y',strtotime($d->pensiun))}}</td>
    					</tr>
    					@endforeach
    					@else
    					<tr>
    						<td colspan="10">No Data...</td>
    					</tr>
    					@endif
    				</tbody>
    			</table>
    		</div>

    		
    	</div>
    </div>
</div>
@endsection