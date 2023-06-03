@extends('layouts.app')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{route('suppliers.create')}}" class='btn bg-gradient-info'>
                            Add Supplier
                        </a>
                    </div>
                    @if ($suppliers->count()!==0)
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Suppliers table</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Supplier</th>

                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Organization</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Phone Number(+233)</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Address</th>
                                                <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Date Added</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($suppliers as $supplier)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="../assets/img/person.png"
                                                            class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $supplier->first_name." ".$supplier->last_name }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ $supplier->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{$supplier->role}}</p>
                                                <p class="text-xs text-secondary mb-0">{{$supplier->organization}}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-secondary text-xs">{{$supplier->phone_number}}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="badge badge-sm bg-gradient-success">{{$supplier->status}}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $supplier->address }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{ \Carbon\Carbon::parse($supplier->created_at)->format('d/M/Y') }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <a href="javascript:;" class=" btn btn-warning text-white font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a href="javascript:;" class=" btn btn-danger text-white font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                <i class="material-icons">delete</i>
                                            </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="alert alert-danger text-white" role="alert">
                        <strong>Sorry!</strong> There is no supplier in the system!
                    </div>
                    @endif
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
