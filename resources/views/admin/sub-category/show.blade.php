@section('breadcumb','Sub-Category')
@section('pageTitle','sub-category-create')

<x-app-layout>
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header pb-0">
								<h3 class="card-title mb-0">Sub Category : {{$subCat[0]['subCategory']['name']}}</h3>
							</div>
							<div class="card-body">
								<div class="product-details table-responsive text-nowrap">
									<table class="table table-bordered table-hover mb-0 text-nowrap">
										<thead>
											<tr>
												<th>Feature Name</th>
												<th class="w-150">Feature Attribute</th>
											</tr>
										</thead>
										<tbody>
											@foreach($subCat as $val)
												 <tr>
													<td>{{$val['featureName']['name']}}</td>
													<td>{{$val['names']}}</td>
												 </tr>
											@endforeach
										
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
</x-app-layout>
