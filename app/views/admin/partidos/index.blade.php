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

	<table id="partidos" class="table table-striped table-hover">
		<thead>
			<tr>
				<th class="col-md-1">{{{ Lang::get('admin/partidos/table.ronda') }}}</th>
                <th class="col-md-2">{{{ Lang::get('admin/partidos/table.inicio') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/partidos/table.estadio') }}}</th>
                <th class="col-md-1">{{{ Lang::get('admin/partidos/table.marcadorlocal') }}}</th>
                <th class="col-md-2">{{{ Lang::get('admin/partidos/table.local') }}}</th>
                <th class="col-md-2">{{{ Lang::get('admin/partidos/table.visita') }}}</th>
                <th class="col-md-1">{{{ Lang::get('admin/partidos/table.marcadorvisita') }}}</th>
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
			oTable = $('#partidos').dataTable( {
				"sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				"sPaginationType": "bootstrap",
				"oLanguage": {
					"sLengthMenu": "_MENU_ records per page"
				},
				"bProcessing": true,
		        "bServerSide": true,
		        "sAjaxSource": "{{ URL::to('admin/partidos/data') }}",
		        "fnDrawCallback": function ( oSettings ) {
	           		$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
	     		}
			});
		});
	</script>
@stop