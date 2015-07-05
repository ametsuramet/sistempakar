@extends('master')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Bidang Kepakaran Spesifik 
            @if(Auth::user())
            <a class="btn btn-primary pull-right" href="/admin/tambahspesifik"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Bidang Kepakaran Spesifik</a>
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
                            <th>Bidang Kepakaran Spesifik</th>
                            <th>Bidang Kepakaran Digit2</th>
    						<th>Bidang Kepakaran Digit3</th>
    					</tr>
    				</thead>
    				<tbody>
    					@if(count($data))
    					@foreach($data as $i=>$d)
    					<tr>
    						<td width="7%">{{$i+1}}</td>
                            <td>{{$d->nama}}</td>
                            <td>{{$d->pakar_digit3->pakar_digit2->nama}}</td>
    						<td>{{$d->pakar_digit3->nama}}</td>
    					</tr>
    					@endforeach
    					@else
    					<tr>
    						<td colspan="4">No Data...</td>
    					</tr>
    					@endif
    				</tbody>
    			</table>
    		</div>
    	</div>
    </div>
@endsection