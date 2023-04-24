@section('breadcumb','Categories')
@section('pageTitle','Categories')
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
									<h4 class="card-title mg-b-0 mt-2 mb-2">Categories</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
									<a href='{{url("$url/category/add")}}' class="btn btn-primary">Add Category</a>
								</div>
								
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="category-list" class="table key-buttons text-md-nowrap"></table>
								</div>
							</div>
						</div>
					</div>
	</div>
</x-app-layout>
	@include('layouts.datatable-script');
	<script type="text/javascript" src="{{url('backend/js/delete-data.js')}}"></script>

<script type="text/javascript">
	var table;
	table = $('#category-list').DataTable({
		lengthChange: false,
		processing: true,
		serverSide: true,
		paging:true,
		ordering: false,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			infoFiltered:'',
		},
	
		ajax: {
				url: '{{ url("$url/categories") }}', // need to change here url
				type: "GET",
				async:false,
		},
		 columns: [
            {data: 'name', name: 'name','title' : 'Name'},
            {data: 'slug', name: 'slug','title' : 'Slug'},
            {data: 'image', name: 'image' ,'title' : 'image'},
            {data: 'action', name: 'action', orderable: false, searchable: false,title:'action'},
     ]
	});
	$('.delete').click(function(){
		let id = $(this).data("id") ;
		url = '{{url("admin/category")}}'+"/"+id;
		let token = '{{ csrf_token() }}';
		deleteData(id,url,token,table);
	})

</script>
