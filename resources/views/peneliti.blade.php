@extends('master')
@section('style')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

@endsection
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
            @include('alert')
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
                            @if(Auth::user())
    						<th></th>
                            @endif

    					</tr>
    				</thead>
    				<tbody>
    					@if(count($data))
    					@foreach($data as $i=>$d)
    					<tr>
    						<td>{{$i+1}}</td>
    						<td>
                                <a href='/peneliti?digit2={{$d->pakar_spesifik->pakar_digit3->pakar_digit2->id}}'>
                                    {{$d->pakar_spesifik->pakar_digit3->pakar_digit2->nama}}
                                </a>
                            </td>
    						<td>
                                <a href='/peneliti?digit3={{$d->pakar_spesifik->pakar_digit3->id}}'>
                                    {{$d->pakar_spesifik->pakar_digit3->nama}}
                                </a>
                            </td>
    						<td>{{$d->nama}}</td>
    						<td>{{$d->nip}}</td>
    						<td>
                                <a href='/peneliti?jabatan={{$d->detail_jabatan->id}}'>
                                {{$d->detail_jabatan->nama}}
                                </a>
                            </td>
    						<td>{{$d->pendidikan}}</td>
    						<td>
                                <a href='/peneliti?pangkat={{$d->detail_pangkat->id}}'>
                                {{$d->detail_pangkat->nama}}
                                </a>
                            </td>
    						<td>
                                <a href='/peneliti?spesifik={{$d->pakar_spesifik->id}}'>
                                {{$d->pakar_spesifik->nama}}
                                </a>
                            </td>
    						<td>
                            @if($d->pensiun != "0000-00-00 00:00:00")
                                {{Lib::bulan(explode('-',$d->pensiun)[1])}} {{explode('-',$d->pensiun)[0]}}
                            @endif
                            </td>
                                @if(Auth::user())
                            <td>
                            <a type="button" class="btn btn-success btn-xs" href="/admin/tambahpeneliti?edit=1&id={{$d->id}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></a> 
                             <a type="button" class="btn btn-danger btn-xs delete" href="/admin/delete?mode=peneliti&id={{$d->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></a>
                            </td>
                                @endif
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

@section('script')
<script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $.fn.dataTableExt.sErrMode = 'mute';
        $('.table').DataTable();
    });
</script>
@endsection