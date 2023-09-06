<x-guest-layout>
	<style>
		.wislistDetail {
    width: 100%;
    display: flex;
}

.wislistDetail select.form-control {
    max-width: 200px;
    width: 100%;
}

.wislistDetail  input#margin {
    max-width: 200px;
    margin-left: 10px;
    margin-right: 10px;
    width: 100%;
}

.margintype {
    display: flex;
    width: 100%;
    justify-content: space-between;
}
@media screen and (max-width: 767px){
.wishlistbtns {
   justify-content: end;
}

.wislistDetail select.form-control {
    max-width: 100%;
    width: 100%;
    margin-left: 0 !important;
}
.wislistDetail  input#margin {
    max-width: 100%;
    margin-left: 0rem;
    margin-right: 0;
    width: 100%;
    margin-top: 10px;
}
.margintype {
    display: block;
    width: 100%;
    justify-content: space-between;
    margin-top: 10px;
}

}

	</style>
	@php
$user_id=@auth()->user()->id;
@endphp
	<nav class="breadcrumb-nav">
				<div class="container">
					<ul class="breadcrumb bb-no">
						<li><a href="{{url('/')}}">Home</a></li>
						<li><a href="{{url('wishlist')}}">Catalogue</a></li>
						<li>{{$wishlist['name']}}</li>
					</ul>
				</div>
			</nav>
			<!-- End of Breadcrumb -->

			<!-- Start of Pgae Contetn -->
			   <div class="page-content mb-8">
                <div class="container">
                	<div class="row mb-5 align-items-center wislistDetail">
                		<div class="col-6 col-md-5 col-lg-3"><h4 class="product-name wishlist-title"><a href="javascript:void(0)">{{$wishlist['name']}}</a></h4></div>
                        {{auth()->user()->role_id}}
                		<div class="col-6 col-md-4 col-lg-4">
												<div class="wishlistbtns">
														<button class=" removewishlist">
															<img src="{{url('front/images/close-icon.png')}}" alt="remove"/>
														</button>
														<button class="edit editwishlist">
															<img src="{{url('front/images/edit.png')}}" alt="close"/>
														</button>
														<a href="{{url('shop/product')}}"><button class="edit">
															<img src="{{url('front/images/icons/add.png')}}" alt="add"/>
														</button></a>
														@if(@auth()->user()->role_id=='4')
														<a href="#" class="btn btn-rounded btn-visit UploadLogo" id="UploadLogo" >Upload Logo</a>
														@endif
														<a href="{{url('wishlist-download/'.$wishlist['id'])}}" class="btn btn-rounded btn-visit" >Download <i class="w-icon-download"></i></a>
													
												</div>
                                                </div>
												@if(@auth()->user()->role_id=='4')
                    	                        <div class="col-12 col-md-5 col-lg-5 margintype">
                    			                    <select class="form-control" name="margin_type" id="margin_type">
														<option value="">Margin Type</option>
														<option value="percent">%</option>
														<option value="rs">₹</option>
													</select>

													<input type="text" class="form-control" name="margin" id="margin" placeholder="Margin for all">
													<button class="btn btn-dark apply">Apply</button>
                    	                        </div>
												@endif

                                           </div>
                                           <div class="row mb-5 align-items-center wislistEditDetail">
                		                      <div class="col-8 col-md-5 col-lg-3">
												<input type="text" class="form-control" name="wishlist_name" id="wishlist_name" value="{{$wishlist['name']}}">
										     </div>
											<div class="col-4 col-md-5 col-lg-3">
												<div class="wishlistbtns">
														<button class="save"><img src="{{url('front/images/correct.png')}}" alt="save"/></button>
														<button class="close"><img src="{{url('front/images/close-icon.png')}}" alt="close"/></button>
														
											</div>
											</div>

                                            </div>



											<div class="row mb-5 align-items-center UploadDetail">
                		                      <div class="col-8 col-md-5 col-lg-3">
											  <div class="logo-preview">
													<img id="logo-preview-img" src="" alt="Logo Preview" />
												</div>
												<input type="hidden" id="existing-logo" value="{{$wishlist['logo']}}">

												<input type="file" class="form-control" name="logo" id="logo" value="{{$wishlist['logo']}}" accept="image/png, image/jpg, image/jpeg">
										     </div>
											<div class="col-4 col-md-5 col-lg-3">
												<div class="wishlistbtns">
														<button class="save uploadLOGO"><img src="{{url('front/images/correct.png')}}" alt="save"/></button>
														@if($wishlist['logo'])
															<span class="delete-logo" data-id="{{$wishlist['id']}}">
																<i class="fas fa-trash-alt"> Delete</i> 
															</span>
														@endif
														<button class="close"><img src="{{url('front/images/close-icon.png')}}" alt="close"/></button>
														
											</div>
											</div>

                                            </div>


                    <!-- Start of Vendor Map -->
                   
                    <!-- End of Vendor Map -->


                   <div class="product-wrapper row cols-lg-5 cols-md-4 cols-sm-3 cols-2 wishlistDiv">
											@foreach($wishlist['ProductWishList'] as $prod_val)
												<div class="product-wrap" id="product{{$prod_val['id']}}">
													<div class="product product-image-gap product-simple">
														<figure class="product-media">
															<a href="{{url('product-detail/'.$prod_val['getProduct']['slug'])}}">
																<img src='{{url("product/".$prod_val['getProduct']['image'])}}' alt="Product" width="195" height="135" />
															</a>
														   
															<div class="product-action">
																<a href="{{url('product-detail/'.$prod_val['getProduct']['slug'])}}" class="btn-product" title="Quick View">Quick View</a>
															</div>
														</figure>
														<div class="product-details">
															
															<h4 class="product-name">
																<a href="{{url('product-detail/'.$prod_val['slug'])}}">{{$prod_val['getProduct']['name']}}</a>
															</h4>
														   
															<div class="product-pa-wrapper">
																<div class="product-price">
																	<ins class="new-price">MRP : {{$prod_val['getProduct']['mrp']}}</ins>
																	<br/>
																	@if(@auth()->user()->role_id=='4')
																	<ins class="new-price" style="color:#c40000 !important;">Selling Price Rs. : {{ round($prod_val['margin_price']) }}</ins>

																	@if(@$prod_val['margin_type'])
																	<br/>
																	<ins class="new-price mt-2">Applied Margin : {{$prod_val['margin_value']}} {{($prod_val['margin_type'] == 'percent') ? '%' : 'Rs'}}</ins>
																	@endif
																	@endif
																</div>
																<div class="product-action">
																	<a href="javascript:void(0)" class="btn-cart btn-product btn btn-link btn-underline remove
																	" data-id="{{$prod_val['id']}}" >Remove</a>
																</div>


																
															</div>
															

														</div>
														
														@if(@auth()->user()->role_id=='4')
														
														<div class="row">
														    <div class="col-md-6 singlemargintype">
																<input type="hidden" name="wishlistid" id="wishlist_id" class="wishlist_id_{{$prod_val['id']}}" value="{{$prod_val['id']}}">
															<select class="form-control margintype_{{$prod_val['id']}}" name="margin_type" id="singlemargin_type">
																
																
																<option value="">Type</option>
																<option value="percent" {{$prod_val['margin_type']=='percent' ? 'selected' : ''}}>%</option>
																<option value="rs" {{$prod_val['margin_type']=='rs' ? 'selected' : ''}}>₹</option>
																
													        </select>
															</div>
															<div class="col-md-6 margintype">
													        <input type="text" class="form-control margin_{{$prod_val['id']}}" name="margin" id="singlemargin" placeholder="Value" value="{{$prod_val['margin_value']}}">
													
															</div>
															<button class="btn btn-dark singleapply" data-id="{{$prod_val['id']}}">Apply</button>
														</div>
														
														@endif
													</div>
												</div>
											@endforeach
						   		</div>
                    <!-- End of Vendor Store -->
                </div>
            </div>
</x-guest-layout>
<script type="text/javascript">
	

	$(document).ready(function() {
    
    // Handle logo deletion
    $(document).on('click', ".delete-logo", function() {
        var id = $(this).data('id');
        $.ajax({
            type: "post",
            url: '{{ url("deletelogo") }}',
            data: {
                "id": id,
                "_token": "{{ csrf_token() }}",
            },
            success: function(response) {
                if (response.success) {
                    $('#logo-preview-img').attr('src', ''); // Clear the logo preview
                }
                alert(response.message);
				location.reload();
            },
            error: function(xhr, status, error) {
                alert("An error occurred. Please try again later.");
            }
        });
    });
});



	$(document).on('click', ".UploadLogo", function() {
		$('.UploadDetail').show();
		$('.wislistDetail').hide();
	});

	$(document).on('click', ".close", function() {
		close();
	});

	function close(){
		$('.UploadDetail').hide();
		
	}

	$('.wislistEditDetail').hide();

	$('.UploadDetail').hide();

	$('.apply').click(function(){
		var margin_type = $("#margin_type").val();
		var margin = $("#margin").val();

		if(margin_type == ''){
			 notifyMsg('Select Margin Type','error');
			 return false;
		}
		if(margin == ''){
			notifyMsg('Select Margin','error');
			return false;
		}
			$.ajax({
       		type: "post",
          url: '{{ url("wishlist/margin") }}',
          data: {
            "wishlist_id": "{{$wishlist['id']}}",
            "margin_type": margin_type,
            "margin" : margin,
            "_token": "{{ csrf_token() }}",
        	},
          success: function(response) {
          	 notifyMsg('Margin Applied Successfully','success');
          	$(".wishlistDiv").html(response.html);
          },
          
       });
	});

	$('.singleapply').click(function(){
		var wishlist_id=$(this).data('id');
		var margin_type = $(".margintype_"+wishlist_id).val();
		var margin = $(".margin_"+wishlist_id).val();
		if(margin_type == ''){
			 notifyMsg('Select Margin Type','error');
			 return false;
		}
		if(margin == ''){
			notifyMsg('Select Margin','error');
			return false;
		}
			$.ajax({
       		type: "post",
          url: '{{ url("wishlist/singlemargin") }}',
          data: {
			"wishlistid": "{{$wishlist['id']}}",
            "wishlist_id":wishlist_id,
            "margin_type": margin_type,
            "margin" : margin,
            "_token": "{{ csrf_token() }}",
        	},
          success: function(response) {
          	 notifyMsg('Margin Applied Successfully','success');
          	$(".wishlistDiv").html(response.html);
			 // location.reload();
          	
          },
          
       });
	});

	$(document).on('click', ".editwishlist", function() {
		$('.wislistEditDetail').show();
		$('.wislistDetail').hide();
	});

	$(document).on('click', ".close", function() {
		close();
	});

	function close(){
		$('.wislistEditDetail').hide();
		$('.UploadDetail').hide();
		$('.wislistDetail').show();
	}
	$(document).on('click', ".save", function() {
		var id = "{{$wishlist['id']}}";
		var name = $('#wishlist_name').val();
		$.ajax({
       		type: "post",
          url: '{{ url("savewishlist") }}',
          data: {
            "id": id,
            "name": name,
            "_token": "{{ csrf_token() }}",
        	},
          success: function(response) {
          	$('.wishlist-title').text(name);
          	close();
          },
          
       });
	});

	$(document).ready(function() {
    // Display existing logo if it exists
    var existingLogo = $('#existing-logo').val();
    if (existingLogo) {
        var img = new Image();
        img.onload = function() {
            $('#logo-preview-img').attr('src', '{{ asset("logo") }}/' + existingLogo);
        };
        img.onerror = function() {
            $('#logo-preview-img').attr('src', ''); // Set to an empty source if the logo is not found
        };
        img.src = '{{ asset("logo") }}/' + existingLogo;
    } else {
        $('#logo-preview-img').attr('src', ''); // Set to an empty source if no logo is present
    }




    // Handle logo preview and validation when selecting a file
    $('#logo').on('change', function() {
        var file = this.files[0];
        if (file) {
            if (validateImageFile(file)) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#logo-preview-img').attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            } else {
                alert('Only image files (JPEG, PNG, GIF) are allowed.');
                $('#logo-preview-img').attr('src', '');
                $(this).val(''); // Clear the file input
            }
        } else {
            $('#logo-preview-img').attr('src', '');
        }
    });

    function validateImageFile(file) {
        var allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        return allowedTypes.includes(file.type);
    }

	$(document).on('click', ".uploadLOGO", function() {
    var id = "{{$wishlist['id']}}";
    var logo = $('#logo')[0].files[0]; // Get the file input element value

    var formData = new FormData(); // Create a FormData object to send the file

    formData.append('id', id);
    formData.append('logo', logo);
    formData.append('_token', "{{ csrf_token() }}");

    $.ajax({
        type: "post",
        url: '{{ url("uploadlogo") }}',
        data: formData,
        contentType: false, // Don't set content type
        processData: false, // Don't process data
        success: function(response) {
            if (response.success) {
                $('.wishlist-title').text(logo.name);
                close();
                alert(response.message); // Show success alert
				location.reload();
				$('.UploadDetail').show();
			
            } else {
                alert(response.message); // Show error alert
            }
        },
        error: function(xhr, status, error) {
            alert("An error occurred. Please try again later."); // Show generic error alert
        }
    });
});
});
	$(document).on('click', ".remove", function() {
		var id = $(this).attr('data-id');
		if (confirm('Are you sure want to remove?')) {
			$.ajax({
	       		type: "post",
	          url: '{{ url("removeProductWishlist") }}',
	          data: {
	            "id": id,
	            "_token": "{{ csrf_token() }}",
	        	},
	          success: function(response) {
	          	$('.cart-count ').text(response.count);
	          	$("#product"+id).remove();
	          },
	          
	       });
		}else{
			return false;
		}
	});
	$(document).on('click', ".removewishlist", function() {
		var id = "{{$wishlist['id']}}";
		if (confirm('Are you sure want to remove?')) {
			$.ajax({
	       		type: "post",
	          url: '{{ url("removewishlist") }}',
	          data: {
	            "id": id,
	            "_token": "{{ csrf_token() }}",
	        	},
	          success: function(response) {
	          	window.location.href ='{{ url("/wishlist") }}';
	          },
	          
	       });
		}else{
			return false;
		}
	});
	
</script>