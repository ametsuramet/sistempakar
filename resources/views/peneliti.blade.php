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
    					   <?php print_r($d) ?>
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