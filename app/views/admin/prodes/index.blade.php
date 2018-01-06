@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
	<div class="page-header">
		<h3>
			{{{ $title }}}
		</h3>
	</div>

	<table id="prodes" class="table table-striped table-hover">
		<thead>
			<tr>
				<th class="col-md-3">{{{ Lang::get('admin/prode/table.logoempresa') }}}</th>
				<th class="col-md-3">{{{ Lang::get('admin/prode/table.puntajeaciertoexacto') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/prode/table.puntajeaciertoparcial') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/prode/table.bannerfixture') }}}</th>
                <th class="col-md-2">{{{ Lang::get('admin/prode/table.bannerlogin') }}}</th>
				<th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>
			</tr>
		</thead>
	</table>
@stop

{{-- Scripts --}}
@section('scripts')
	<script type="text/javascript">
		var oTable;
		$(document).ready(function() {
			oTable = $('#prodes').dataTable( {
				"sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				"sPaginationType": "bootstrap",
				"oLanguage": {
					"sLengthMenu": "_MENU_ records per page"
				},
				"bProcessing": true,
		        "bServerSide": true,
		        "sAjaxSource": "{{ URL::to('admin/prodes/data') }}",
		        "fnDrawCallback": function ( oSettings ) {
	           		$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
	     		}
			});
		});
	</script>
@stop