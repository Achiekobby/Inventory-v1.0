@extends('layouts.app')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row d-flex justify-content-center">
                <div class="col-8">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('suppliers.index') }}" class='btn bg-gradient-primary'>
                            All Suppliers
                        </a>
                    </div>
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Edit Supplier Information</h6>
                            </div>
                        </div>
                        @if (Session::has('success'))
                            <div class="alert alert-success text-white m-3" role="alert">
                                <strong>Success!</strong> {{ Session::get('success') }}
                            </div>
                        @elseif(Session::has('error'))
                            <div class="alert alert-danger text-white m-3" role="alert">
                                <strong>Error!</strong> {{ Session::get('error') }}
                            </div>
                        @endif
                        <div class="card-body px-0 p-4">
                            <form method="POST" action="{{ route('suppliers.update',['sp_uuid'=>$supplier_details->id]) }}" class="p-4">
                                @csrf
                                <h6 class=" text-uppercase text-info text-xs font-weight-bolder opacity-8">Supplier
                                    Details</h6>
                                <div class="input-group input-group-static mb-4">
                                    <label>Firstname</label>
                                    <input type="text" class="form-control" name="first_name" value="{{$supplier_details->first_name}}">
                                </div>
                                @error('first_name')
                                    <p class="text-danger text-bold text-xs">{{ $message }}</p>
                                @enderror
                                <div class="input-group input-group-static mb-4">
                                    <label>Lastname</label>
                                    <input type="text" class="form-control" name="last_name"  value="{{$supplier_details->last_name}}">
                                </div>
                                @error('last_name')
                                    <p class="text-danger text-bold text-xs">{{ $message }}</p>
                                @enderror
                                <div class="input-group input-group-static my-3">
                                    <label>Email address</label>
                                    <input type="email" class="form-control" name="email"  value="{{$supplier_details->email}}">
                                </div>
                                @error('email')
                                    <p class="text-danger text-bold text-xs">{{ $message }}</p>
                                @enderror
                                <div class="input-group input-group-static my-3">
                                    <label>Phone</label>
                                    <input type="tel" class="form-control" name="phone"  value="{{$supplier_details->phone_number}}">
                                </div>
                                @error('phone')
                                    <p class="text-danger text-bold text-xs">{{ $message }}</p>
                                @enderror

                                <h6 class=" text-uppercase text-info text-xs font-weight-bolder opacity-8">Company</h6>
                                <div class="input-group input-group-static my-3">
                                    <label>Organization</label>
                                    <input type="text" class="form-control" name="organization"  value="{{$supplier_details->organization}}">
                                </div>
                                @error('organization')
                                    <p class="text-danger text-bold text-xs">{{ $message }}</p>
                                @enderror
                                <div class="input-group input-group-static my-3">
                                    <label>Organization Role</label>
                                    <input type="text" class="form-control" name="role"  value="{{$supplier_details->role}}">
                                </div>
                                @error('role')
                                    <p class="text-danger text-bold text-xs">{{ $message }}</p>
                                @enderror
                                <h6 class=" text-uppercase text-info text-xs font-weight-bolder opacity-8">Supplier
                                    Location</h6>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-static my-3">
                                            <label>Country</label>
                                            <input type="text" class="form-control" name="country"  value="{{$supplier_details->address->country}}">
                                        </div>
                                        @error('country')
                                            <p class="text-danger text-bold text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group input-group-static my-3">
                                            <label>Region</label>
                                            <input type="text" class="form-control" name="region"  value="{{$supplier_details->address->region}}">
                                        </div>
                                        @error('region')
                                            <p class="text-danger text-bold text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-static my-3">
                                            <label>City</label>
                                            <input type="text" class="form-control" name="city"  value="{{$supplier_details->address->city}}">
                                        </div>
                                        @error('city')
                                            <p class="text-danger text-bold text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group input-group-static  my-3">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address"  value="{{$supplier_details->address->street}}">
                                        </div>
                                        @error('address')
                                            <p class="text-danger text-bold text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start mb-3">
                                    <button type="submit" class='btn bg-gradient-info'>
                                        Edit Supplier Details
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer py-4  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart"></i> by
                                <a href="/" class="font-weight-bold" target="_blank">Minimax</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
@endsection
