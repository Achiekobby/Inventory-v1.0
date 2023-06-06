@extends('layouts.app')
<style>
    .fade-out {
        opacity: 0;
        transition: 0.5s ease-out;
    }
</style>
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row d-flex justify-content-center">
                <div class="col-4">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Add Category</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 p-4">
                            <form method="POST" action="{{ route('categories.store') }}" class="p-4"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="input-group input-group-outline mb-4">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                @error('name')
                                    <p class="text-danger text-bold text-xs">{{ $message }}</p>
                                @enderror
                                <h6 class=" text-uppercase text-primary text-xs font-weight-bolder opacity-8">Image</h6>
                                <div class="input-group input-group-outline mb-4">
                                    <input type="file" class="form-control" name="image">
                                </div>
                                @error('image')
                                    <p class="text-danger text-bold text-xs">{{ $message }}</p>
                                @enderror
                                <div class="d-flex justify-content-start mb-3">
                                    <button type="submit" class='btn bg-gradient-primary'>
                                        Add Category
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    {{-- @if ($suppliers->count() !== 0) --}}
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">All Categories</h6>
                            </div>
                        </div>
                        @if (Session::has('success'))
                            <div id="notice" class="alert alert-success alert-dismissible text-white m-3 fade show"
                                role="alert">
                                <strong>Success!</strong> {{ Session::get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @elseif(Session::has('error'))
                            <div id="notice" class="alert alert-danger alert-dismissible text-white m-3 fade show"
                                role="alert">
                                <strong>Error!</strong> {{ Session::get('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                @if ($categories->count() !== 0)
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    category</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Status</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Date Added</th>
                                                <th class="text-secondary opacity-7"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div>
                                                                <img src="{{ asset('uploads/' . $category->image) }}"
                                                                    class="avatar avatar-sm me-3 border-radius-lg"
                                                                    alt="user1">
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">
                                                                    {{ $category->name }}
                                                                </h6>
                                                                <p class="text-xs text-secondary mb-0">
                                                                    {{ $category->slug }}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span
                                                            class="badge badge-sm bg-gradient-success">{{ $category->status }}</span>
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ \Carbon\Carbon::parse($category->created_at)->format('d/M/Y') }}</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="{{ route('categories.edit', ['slug' => $category->slug]) }}"
                                                            class=" btn btn-warning btn-tooltip text-white font-weight-bold text-xs"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit category" data-original-title="Edit user">
                                                            <i class="material-icons">edit</i>
                                                        </a>
                                                        <a href="{{ route('categories.destroy', ['slug' => $category->slug]) }}"
                                                            class=" btn btn-danger btn-tooltip text-white font-weight-bold text-xs"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Remove category" data-toggle="tooltip"
                                                            data-original-title="Edit user">
                                                            <i class="material-icons">delete</i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="alert alert-warning text-white m-3" role="alert">
                                        <strong>Empty!</strong>
                                        <p class="text-white">Sorry, No category was found!!</p>
                                    </div>
                                @endif
                            </div>
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
    <script>
        const notice = document.getElementById('notice');
        setTimeout(() => {
            notice.classList.add('fade-out')
            setTimeout(() => {
                notice.style.display = 'none';
            }, 500);
        }, 3000);
    </script>
@endsection
