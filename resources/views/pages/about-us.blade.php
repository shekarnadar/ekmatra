<x-guest-layout>
    <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb bb-no">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="javascript:void(0)">About Us</a></li>
                    </ul>
                </div>
            </nav>
             <div class="page-content">
                <div class="container">
                    <section class="introduce mb-2 pb-2">
                        <h2 class="title title-center">
                            Welcome to Ek Matra Technologies Pvt Ltd!,
                        </h2>
                        <p class=" mx-auto text-center">Ek Matra Technologies Pvt Ltd is a leading technology company in India that specializes<br> in creating innovative gift and rewards platforms for businesses. </p>
                        <figure class="br-lg">
                            <img src="{{url('aboutus/1.jpg')}}" alt="Banner" 
                                width="1240" height="540" style="background-color: #D0C1AE;" />
                        </figure>
                    </section>

                      <section class="introduce mb-2 pb-2">
                        
                        <p>Our mission is to provide businesses with the tools they need to engage and incentivize their employees, customers, and partners.</p>

                        <p>Our gift and rewards platform is designed to be user-friendly and customizable, allowing businesses to create unique, personalized programs that reflect their brand and culture.Our platform also provides businesses with the flexibility to choose from a wide variety of gift options, ensuring that they can offer rewards that are meaningful and relevant to their recipients.</p>

                        <p>At Ek Matra Technologies Pvt Ltd, we believe that rewards and recognition are key drivers of employee engagement and customer loyalty. That's why we are committed to creating solutions that help businesses build strong, long-lasting relationships with their stakeholders.</p>

                        <p>Our team of experienced professionals is dedicated to providing exceptional service and support to our clients. We work closely with our clients to understand their unique needs and challenges, and we tailor our solutions to meet those needs. We also provide ongoing support and maintenance to ensure that our clients' programs continue to meet their evolving needs.</p>
                       
                    </section>

                    

                   
                </div>

               

               
            </div>
</x-guest-layout>
<script type="text/javascript">
    $('.contact-us-form').on('submit', function(e) {
        e.preventDefault()
        let formValue = new FormData(this);
         $(".sendNow").prop('disabled',true);
        $.ajax({
            type: "Post",
          url: '{{ url("contact-us/inquiry") }}',
          data: formValue,
          cache: false,
          contentType: false,
          processData: false,
          success: function(response) {
            if(response.success){
                
                notifyMsg(response.message,'success');
                 setTimeout(function(){
                    window.location.reload();
                 },1000);
                

            }else{
                notifyMsg(response.message,'error');
                 $(".sendNow").prop('disabled',false);
            }
          },
          error: function(response) {
            let error = response.responseJSON;
            if(!error){
                    error = JSON.parse(response.responseText);
            }
             $(".sendNow").prop('disabled',false);
            $.each( error.errors, function( key, value ) {
                        $("#"+key+"_error").show();
                                $("#"+key+"_error").text(value);
                        });
                }
    });
    });
</script>