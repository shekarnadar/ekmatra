@section('breadcumb','Inquiry')
@section('pageTitle','Inquiry')
@include('layouts.datatable-css')
@php
$url = getAuthGaurd();
@endphp
<x-app-layout>
	<div class="row row-sm">
		<div class="col-xl-12">
						<div class="card mg-b-20">
							
							<div class="card-body">
								<div class="table-responsive">
									<table id="inquiry-list" class="table key-buttons text-md-nowrap"></table>
								</div>
							</div>
						</div>
					</div>
	</div>
</x-app-layout>
	@include('layouts.datatable-script');
	

<script type="text/javascript">
	var table;
	$(function() {
		getTable();
	});

	function getTable() {
		table = $('#inquiry-list').DataTable({
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
				url: '{{ url("$url/rfq") }}', // need to change here url
				type: "GET",
				async:false,
		},
		 columns: [
            {
            	data: 'id', 
            	name: 'id',
            	title:'id'
            },
            {
            	data:'quantity',
            	name:'quantity',
            	title:'quantity'
            },
            {
            	data: 'min', 
            	name: 'min',
            	'title' : 'min'
            },
            {
            	data:'max' ,
            	name:'max',
            	title : 'max'
            },
            {
            	data:'prefered_category' ,
            	name:'prefered_category',
            	title :'Prefered Category'
            },
            {
            	data:'prefered_brand' ,
            	name:'prefered_brand',
            	title : 'Prefered Brand'
            },
            {
            	data:'delivery_date' ,
            	name:'delivery_date',
            	title :'Delivery Date'
            },
            {
            	data:'customer_detail',
            	name: 'customer_detail',
            	title: 'Customer Detail'
            }
           
           
     ]
	});
	}

</script>
