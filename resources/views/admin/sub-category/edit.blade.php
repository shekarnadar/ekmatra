@section('breadcumb','Sub-Category')
@section('pageTitle','sub-category-create')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
	<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<style>
	.tagify {
	background-color: #f5f5f5;
	border: none;
	border-radius: 4px;
	padding: 4px 8px;
	font-size: 16px;
	width: 100%;
}

.tagify__input {
	height: 2em;
	line-height: 2em;
}

.tagify__tag {
	background-color: #d9edf7;
	border-radius: 4px;
	padding: 4px 8px;
	margin-right: 4px;
	margin-bottom: 4px;
	display: inline-block;
}

.tagify__tag__removeBtn {
	color: #31708f;
	font-size: 16px;
	margin-left: 4px;
	cursor: pointer;
}

</style>

<x-app-layout>
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-20">
									Sub Category Edit
								</div>
							  
								<form  data-parsley-validate="" name="subCategoryCreate" method="POST" id="subCategoryCreate" enctype="multipart/form-data">
									@csrf
									<input type="hidden" name="id" value="{{@$subCat[0]['subCategory']['id']}}">
									<input type="hidden" name="category_id" value="{{@$subCat[0]['subCategory']['category_id']}}">
									<div class="row row-sm">
										<div class="col-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Name: <span class="tx-danger">*</span></label>
												<input class="form-control" name="name" placeholder="Enter Name" required="required" id="name" type="text" data-parsley-required-message="Please enter your name" value="{{@$subCat[0]['subCategory']['name']}}">
												<span class="text-danger" id="name_error"></span>
											</div>
										</div>
									</div>

									<div class="row">
										@foreach($subCat as $val)
											<div class="col-12 mt-2">
												<div class="form-group mg-b-0 featurediv">
													<label class="form-label">{{$val['featureName']['name']}}: <span class="tx-danger">*</span></label>
													<?php
															$feature = explode(',',$val['names']);
																foreach($feature as $feature_val){
																		$feature_explode = explode('|',$feature_val);
																		$fetureValue[]=[
																			'value' => $feature_explode[0],
																			'id'=> $feature_explode[1],

																];}
															
													?>

													<input type="text" id="{{$val['featureName']['name']}}" placeholder="Enter tags"  name="faetures[{{$val['featureName']['id']}}]" data-id ="{{$val['names']}}" value='{{json_encode($fetureValue)}}'>
													<span class="text-danger" id="name_error"></span>
											</div>
											</div>
										@endforeach

									</div>
										<input type="hidden" name="removeIds" value="" id="removeIds">
									<div class="col-12">
											<button type="submit" class="btn btn-main-primary pd-x-20 mg-t-10 addsubcategory"><span class="submit">Submit </span><span class="spinner-border spinner-border-sm loading" role="status" aria-hidden="true" style="display:none"></span></button>
									</div>
									
								</form>
							</div>
						</div>
					</div>
					
				</div>
				


</x-app-layout>
<script>
	var input = document.getElementById('Brand');
	var removeIds = [];


var tagify = new Tagify(input, {
    maxTags: 5, // maximum number of tags
    mapValueToProp: "id",
    dropdown: {
        maxItems: 5, // maximum number of items in the dropdown
        classname: 'tags-look', // CSS class for the dropdown
        enabled: 0, // disable the dropdown
    },
    callbacks: {
        add: console.log, // callback when a tag is added
        remove: onRemove, // callback when a tag is removed
    },
});
function onRemove(elm){
			removeIds.push(elm.detail.data.id);
			implodedArray = removeIds.join(',');
			$("#removeIds").val(implodedArray);
}

	
$(document).ready(function() {
	

		$('#subCategoryCreate').on('submit', function(e) {
			e.preventDefault()
			let formValue = new FormData(this);
			var cat_id ="{{$subCat[0]['subCategory']['category_id']}}";
			if ( $(this).parsley().isValid() ) {
				 $(".loading").show();
				 $(".addsubcategory").prop('disabled',true);
				 $.ajax({
			type: "post",
			url: '{{ url("admin/category/sub-cat/update") }}'+'/' + {{$subCat[0]['subCategory']['category_id']}},
			data: formValue,
			cache: false,
			contentType: false,
			processData: false,
			success: function(response) {
				if (response.success) {
						notifyMsg(response.message,'success');
					
					setTimeout(function(){
							$(".addsubcategory").prop('disabled',false);
						window.location.href ='{{ url("admin/category") }}/'+cat_id+'/sub-cat';
					},2000);
				} else {
					notifyMsg(response.message,'error');
				}
			},
			error: function(response) {
				  $('.loading').hide();
				  $('.submit').show();
				  $(".addsubcategory").prop('disabled',false);
				let error = response.responseJSON;
				if(!error){
					error = JSON.parse(response.responseText);
				}
				$.each( error.errors, function( key, value ) {
						$("#"+key+"_error").text(value);
						});
				},
		});
		}
	});
	});
</script>