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
                            @if(Auth::user())
                            <th width="10%"></th>
                            @endif
    					</tr>
    				</thead>
    				<tbody>
    					@if(count($data))
    					@foreach($data as $i=>$d)
    					<tr>
    						<td width="7%">{{$i+1}}</td>
                            <td>
                                <a href='/peneliti?spesifik={{$d->id}}'>
                                {{$d->nama}}
                                </a>
                            </td>
                            <td>
                                <a href='/peneliti?digit2={{$d->pakar_digit3->pakar_digit2->id}}'>
                                {{$d->pakar_digit3->pakar_digit2->nama}}
                                </a>
                            </td>
    						<td>
                                <a href='/peneliti?digit3={{$d->pakar_digit3->id}}'>
                                {{$d->pakar_digit3->nama}}
                                </a>
                            </td>
                            @if(Auth::user())
                            <td>
                            <a type="button" class="btn btn-success btn-xs" href="/admin/tambahspesifik?edit=1&id={{$d->id}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></a> 
                            <a type="button" class="btn btn-danger btn-xs delete" href="/admin/delete?mode=spesifik&id={{$d->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></a>
                            </td>
                            @endif
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