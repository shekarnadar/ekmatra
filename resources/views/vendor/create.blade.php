@section('breadcumb','Vendor')
@section('pageTitle','vendor-create')

<x-app-layout>
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-20">
									Vendor Creation
								</div>
							  
								<form  data-parsley-validate="" name="vendorCreate" method="POST" id="vendorCreate">
									@csrf
									<div class="row row-sm">
										<div class="col-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Name: <span class="tx-danger">*</span></label>
												<input class="form-control" name="name" placeholder="Enter Name" required="required" id="name" type="text" data-parsley-required-message="Please enter your name">
												<span class="text-danger" id="name_error"></span>
											</div>
										</div>

										<div class="col-6">
											<div class="form-group">
												<label class="form-label">Company Name: <span class="tx-danger">*</span></label>
												<input class="form-control" name="company_name" placeholder="Enter company name" required="" type="text" data-parsley-required-message="Please enter company name">
												<span class="text-danger" id="company_name_error"></span>
											</div>
										</div>

										 <div class="col-6">
											<div class="form-group">
												<label class="form-label">Email: <span class="tx-danger">*</span></label>
												<input class="form-control" name="email" placeholder="Enter Email" required="" type="email" data-parsley-required-message="Please enter your email" >
												<span class="text-danger" id="email_error"></span>
											</div>
										</div>

										 <div class="col-6">
											<div class="form-group">
												<label class="form-label">Phone: <span class="tx-danger">*</span></label>
												<input class="form-control" name="phone" placeholder="Enter phone number" required="Firstname is Required" type="text" data-parsley-required-message="Please enter your phone number" >
												<span class="text-danger" id="phone_error"></span>
											</div>
										</div>

										 <div class="col-12">
											<div class="form-group">
												<label class="form-label">Address</label>
												<textarea class="form-control" name="address" placeholder="Enter Address" rows="4"></textarea>
											</div>
										</div>
										<div class="col-12"><button type="submit" class="btn btn-main-primary pd-x-20 mg-t-10">Submit</button></div>
									</div>
								</form>
							</div>
						</div>
					</div>
					
				</div>
				


</x-app-layout>
<script type="text/javascript">
	$('#vendorCreate').on('submit', function(e) {
			e.preventDefault()
			let formValue = new FormData(this);
			if ( $(this).parsley().isValid() ) {
				 $.ajax({
            type: "post",
            url: '{{ url("admin/vendor/store") }}',
            data: formValue,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                		notifyMsg(response.message,'success');
                    
                    setTimeout(function(){
                        window.location.href ='{{ url("admin/dashboard") }}';
                    },2000);
                } else {
                    notifyMsg(response.message,'error');
                }
            },
            error: function(response) {
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
</script>
