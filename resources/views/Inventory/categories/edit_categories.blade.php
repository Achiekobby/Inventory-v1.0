@extends('layouts.app')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Edit Category</h6>
                            </div>
                        </div>
                        @if (Session::has('error'))
                            <div id="notice" class="alert alert-danger alert-dismissible text-white m-3 fade show"
                                role="alert">
                                <strong>Error!</strong> {{ Session::get('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-body px-0 p-4">
                            <form method="POST" action="{{ route('categories.update', ['slug' => $category->slug]) }}"
                                class="p-4" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group input-group-static mb-4">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                                </div>
                                @error('name')
                                    <p class="text-danger text-bold text-xs">{{ $message }}</p>
                                @enderror
                                <h6 class=" text-uppercase text-primary text-xs font-weight-bolder opacity-8">Image</h6>
                                <div class="input-group input-group-outline mb-4">
                                    <input type="file" class="form-control" name="image" value={{ $category->image }}>
                                </div>
                                <img width="100" height="100" src="{{ asset('uploads/' . $category->image) }}"
                                    alt="{{ $category->name }}">
                                @error('image')
                                    <p class="text-danger text-bold text-xs">{{ $message }}</p>
                                @enderror
                                <div class="d-flex justify-content-start mb-3">
                                    <button type="submit" class='btn bg-gradient-info'>
                                        Edit Category
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
