@extends('layouts.app')
@section('breadcumb','Vendor')
@section('pageTitle','vendor-create')

@section('content')
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="main-content-label mg-b-5">
                                    Vendor Creation
                                </div>
                              
                                <form action="{{ route('vendor.store') }}" data-parsley-validate="" name="vendorCreate" >
                                    <div class="row row-sm">
                                        <div class="col-6">
                                            <div class="form-group mg-b-0">
                                                <label class="form-label">Firstname: <span class="tx-danger">*</span></label>
                                                <input class="form-control" name="firstname" placeholder="Enter firstname" required="Firstname is Required" id="firstname" type="text" parsley-type-firstname-message="You must enter a 10 characters alphanumeric value">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">Company Name: <span class="tx-danger">*</span></label>
                                                <input class="form-control" name="lastname" placeholder="Enter lastname" required="Firstname is Required" type="text">
                                            </div>
                                        </div>
                                         <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">Email: <span class="tx-danger">*</span></label>
                                                <input class="form-control" name="email" placeholder="Enter Email" required="Firstname is Required" type="text">
                                            </div>
                                        </div>
                                         <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">Phone: <span class="tx-danger">*</span></label>
                                                <input class="form-control" name="phone" placeholder="Enter Phone" required="Firstname is Required" type="text">
                                            </div>
                                        </div>

                                         <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Address: <span class="tx-danger">*</span></label>
                                                <textarea class="form-control" name="address" placeholder="Enter Address" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12"><button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit">Validate Form</button></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
                

@endsection