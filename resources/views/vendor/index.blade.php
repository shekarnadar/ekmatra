@section('breadcumb','Vendors')
@section('pageTitle','vendors')
@include('layouts.datatable-css')
@php
$url = getAuthGaurd();
@endphp
<x-app-layout>
	<div class="row row-sm">
		<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0 mt-2 mb-2">Vendors</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
									<a href='{{url("$url/vendor/add")}}' class="btn btn-primary">Add Vendor</a>
								</div>
								
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="vendor-list" class="table key-buttons text-md-nowrap"></table>
								</div>
							</div>
						</div>
					</div>
	</div>
</x-app-layout>
	@include('layouts.datatable-script');

<script type="text/javascript">
	$('#vendor-list').DataTable({
		lengthChange: false,
		processing: true,
		serverSide: true,
		paging:true,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			infoFiltered:'',
		},

	
		ajax: {
				url: '{{ url("$url/vendors") }}', // need to change here url
				type: "GET",
				async:false,
		},
		 columns: [
            {data: 'name', name: 'name','title' : 'Name'},
            {data: 'email', name: 'email' ,'title' : 'Email'},
            {data: 'phone', name: 'phone' ,'title' : 'Phone'},
            {data: 'image', name: 'image' ,'title' : 'Image'},
            {data: 'company_name', name: 'company_name',title:'company Name'},
            {data: 'action', name: 'action', orderable: false, searchable: false,title:'action'},
     ]
	});

</script>
