@section('breadcumb','Dashboard')
@section('pageTitle','Dashboard')

<x-app-layout>
	<div class="container-fluid">
				
				
				<div class="main-content-body">
					<div class="row row-sm">
						<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
							<div class="card overflow-hidden project-card">
								<div class="card-body">
									<div class="d-flex">
										
										<div class="project-content">
											<h6>Products</h6>
											<ul>
												<li>
													<strong>Active</strong>
													<span>{{$product_active}}</span>
												</li>
												<li>
													<strong>DeActive</strong>
													<span>{{$product_deactive}}</span>
												</li>


											
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						
					</div>
				</div>
	</div>
</x-app-layout>
