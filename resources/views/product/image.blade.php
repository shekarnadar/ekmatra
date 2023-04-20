<link href="{{url('backend/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
<!--- Internal Fancy uploader css -->
<link href="{{url('backend/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
@include('layouts.datatable-css')

@php
	
	$url = getAuthGaurd();


@endphp
<x-app-layout>
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="main-content-label mg-b-20">
									Upload Image
					</div>
					<form id="formData">
							<div class="mb-10">
									
									<input id="thefiles" type="file" name="files" accept=".jpg, .png, image/jpeg, image/png" multiple>
									@csrf

							</div>
							<div class="row mt-10 mb-10">
								<div class="col-12 mt-10">
										<button type="button" onclick="$('#thefiles').next().find('.ff_fileupload_actions button.ff_fileupload_start_upload').click(); return false;" class="btn-primary mt-10">Upload all files</button>
								</div>
							</div>
					</form>
					<div class="table-responsive">
									<table id="image-list" class="table key-buttons text-md-nowrap"></table>
								</div>

			</div>
		</div>
	</div>

</x-app-layout>
	@include('layouts.datatable-script');

<script src="{{url('backend/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{url('backend/plugins/fileuploads/js/file-upload.js')}}"></script>
<!--- Fancy uploader js -->
<script src="{{url('backend/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{url('backend/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{url('backend/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{url('backend/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>

<script type="text/javascript">



	$(function() {
	var token;
	var table;
	getTable();
	function getTable() {
		table = $('#image-list').DataTable({
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
				url: '{{ url("$url/product/image") }}', // need to change here url
				type: "GET",
				async:false,
		},
		 columns: [
            
            {
            	data: 'name', 
            	name: 'name',
            	'title' : 'Name'},
            {
            	data:'image_url' ,
            	name:'image_url',
            	'title' : 'Image Url'
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
	$('#thefiles').FancyFileUpload({
		url: '{{ url("$url/product/image") }}',
		params : {
 			_token : "{{ csrf_token() }}",
 		},
		maxfilesize : 1000000,

		startupload : function(SubmitUpload, e, data) {
			
					token = "{{ csrf_token() }}";

					SubmitUpload();
			
		},
		continueupload : function(e, data) {
			var ts = Math.round(new Date().getTime() / 1000);

			// Alternatively, just call data.abort() or return false here to terminate the upload but leave the UI elements alone.
			if (token.expires < ts)  data.ff_info.RemoveFile();
		},
		uploadcompleted : function(e, data) {
			data.ff_info.RemoveFile();
			table.ajax.reload(null, false);

		}
	});
});
$('#image-list').on('click', '.copyText', function(){
	var copyText = $(this).attr('data-url');
	var temp=document.createElement('input');
  var texttoCopy=copyText;
  temp.type='input';
  temp.setAttribute('value',texttoCopy);
  document.body.appendChild(temp);
  temp.select();
  document.execCommand("copy");
  temp.remove();
 });

</script>