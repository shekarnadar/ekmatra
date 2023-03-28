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
												<input class="form-control" name="name" placeholder="Enter Name" required="required" id="name" type="text" data-parsley-required-message="Please enter your name" value="{{$subCat[0]['subCategory']['name']}}">
												<span class="text-danger" id="name_error"></span>
											</div>
										</div>
									</div>

									<div class="row">
										@foreach($subCat as $val)
											<div class="col-12 mt-2">
												<div class="form-group mg-b-0">
												<label class="form-label">{{$val['featureName']['name']}}: <span class="tx-danger">*</span></label>
												<input type="text" id="{{$val['featureName']['name']}}" placeholder="Enter tags" value="{{$val['names']}}" name="faetures[{{$val['featureName']['id']}}]">

												<span class="text-danger" id="name_error"></span>
											</div>
											</div>
										@endforeach

									</div>
										
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
    // get the input element
var input = document.getElementById('Brand');
var input2 = document.getElementById('MOQ');
var input3 = document.getElementById('Warranty');

// initialize Tagify
var tagify = new Tagify(input, {
    maxTags: 5, // maximum number of tags
   // whitelist: ['apple', 'banana', 'orange'], // auto-suggest whitelist
    dropdown: {
        maxItems: 5, // maximum number of items in the dropdown
        classname: 'tags-look', // CSS class for the dropdown
        enabled: 0, // disable the dropdown
    },
    callbacks: {
        add: console.log, // callback when a tag is added
        remove: console.log, // callback when a tag is removed
    },
});

var tagify2 = new Tagify(input2, {
    maxTags: 5, // maximum number of tags
   // whitelist: ['apple', 'banana', 'orange'], // auto-suggest whitelist
    dropdown: {
        maxItems: 5, // maximum number of items in the dropdown
        classname: 'tags-look', // CSS class for the dropdown
        enabled: 0, // disable the dropdown
    },
    callbacks: {
        add: console.log, // callback when a tag is added
        remove: console.log, // callback when a tag is removed
    },
});

var tagify3= new Tagify(input3, {
    maxTags: 5, // maximum number of tags
   // whitelist: ['apple', 'banana', 'orange'], // auto-suggest whitelist
    dropdown: {
        maxItems: 5, // maximum number of items in the dropdown
        classname: 'tags-look', // CSS class for the dropdown
        enabled: 0, // disable the dropdown
    },
    callbacks: {
        add: console.log, // callback when a tag is added
        remove: console.log, // callback when a tag is removed
    },
});

$(document).ready(function() {
    

		$('#subCategoryCreate').on('submit', function(e) {
			e.preventDefault()
			let formValue = new FormData(this);
			if ( $(this).parsley().isValid() ) {
				 $(".loading").show();
				 $(".addsubcategory").prop('disabled',true);
				 $.ajax({
            type: "post",
            url: '{{ url("admin/category/sub-cat/store") }}',
            data: formValue,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                		notifyMsg(response.message,'success');
                    
                    setTimeout(function(){
                    		$(".addsubcategory").prop('disabled',false);
                        window.location.href ='{{ url("admin/category/1/sub-cat") }}';
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