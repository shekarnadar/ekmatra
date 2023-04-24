@section('breadcumb','Products')
@section('pageTitle','Products')
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
									<h4 class="card-title mg-b-0 mt-2 mb-2">Product</h4>
									<div style="float: right;">
									
									<a href='{{url("$url/product-import")}}' class="btn btn-primary">Product Import</a>
									<a href='{{url("$url/product/add")}}' class="btn btn-primary">Add Product</a>
									<a href='{{url("$url/product/image")}}' class="btn btn-primary">Upload Image</a>
								</div>
								</div>
								
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="product-list" class="table key-buttons text-md-nowrap"></table>
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
	$(function() {
		getTable();
	});
$('#product-list').on('click','.removeProduct',function(){
		let id = $(this).data("id") ;
		if (confirm("Are you sure you want to remove?")){
				$.ajax({
					url: "{{url('admin/product/remove')}}",
        	type: "Post",
        	data: {
            "id": id,
            "_token": "{{ csrf_token() }}",
        	},
        	success: function(response) {
		        if (response.success) {
		        	notifyMsg(response.message,'success');
		           table.ajax.reload(null, false);
		        } else {
		        	notifyMsg(response.message,'error');
		        }
		      }
      });
		}
	
});
$('#product-list').on('click', '.changestaus', function(){
		let id = $(this).data("id") ;
		let status = $(this).data('status');
		let message = $(this).data('msg');
		if (confirm("Are you sure you want to " + message +' ?')){
				$.ajax({
				
        url: "{{url('admin/product/status-change')}}",
        type: "Post",
        data: {
            "id": id,
            "status" : status,
            "_token": "{{ csrf_token() }}",
        },

        success: function(response) {
	        if (response.success) {
	        	notifyMsg(response.message,'success');
	           table.ajax.reload(null, false);
	        } else {
	        	notifyMsg(response.message,'error');
	        }
        }
      });
		}
	
	});
	function getTable() {
		table = $('#product-list').DataTable({
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
				url: '{{ url("$url/products") }}', // need to change here url
				type: "GET",
				async:false,
		},
		 columns: [
            {
            	data: 'name', 
            	name: 'name',
            	'title' : 'Name'},
            {
            	data:'category_name' ,
            	name:'category_name',
            	'title' : 'Category Name'
            },
            {
            	data:'subcategory_name',
            	name:'subcategory_name',
            	title:'Subcategory Name'
            },
            {
            		data:'createdBy',
            		name: 'createdBy',
            		title: 'Created By'
            },
            {
            	data: 'image', 
            	name: 'image' ,
            	'title' : 'image'
            },
            {
            	data: 'action', 
            	name: 'action', 
            	orderable: false, 
            	searchable: false,
            	title:'action'
            },
     ]
	});
	}

</script>
