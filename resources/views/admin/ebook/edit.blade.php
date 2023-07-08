@extends('admin.layouts.master')
@section('title', 'Edit Ebook')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Ebook</h1>
            <a href="{{ route('admin.ebooks.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-eye fa-sm text-white-50"></i> View All</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('admin.ebooks.update', $ebook->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label text-right font-weight-bold">Title *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="title" value="{{ $ebook->title }}" name="title" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="writer" class="col-sm-3 col-form-label text-right font-weight-bold">Writer *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="writer" value="{{ $ebook->writer }}" name="writer">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="publisher" class="col-sm-3 col-form-label text-right font-weight-bold">Publisher</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="publisher" value="{{ $ebook->publisher }}" name="publisher">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="edition" class="col-sm-3 col-form-label text-right font-weight-bold">Edition</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="edition" value="{{ $ebook->edition }}" name="edition">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pages" class="col-sm-3 col-form-label text-right font-weight-bold">Pages</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="pages" value="{{ $ebook->pages }}" name="pages">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="language" class="col-sm-3 col-form-label text-right font-weight-bold">Language</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="language" value="{{ $ebook->language }}" name="language">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-sm-3 col-form-label text-right font-weight-bold">Price *</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="price" value="{{ $ebook->price }}" name="price">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="book_url" class="col-sm-3 col-form-label text-right font-weight-bold">Ebook URL *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="book_url" value="{{ $ebook->book_url }}" name="book_url">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="summary" class="col-sm-3 col-form-label text-right font-weight-bold">Summary</label>
                        <div class="col-sm-6">
                            <textarea name="summary" id="summary" rows="5" class="form-control">{{ $ebook->summary }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                        <div class="col-sm-6">
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ ($ebook->status? 'selected': '')  }}>Active</option>
                                <option value="0" {{ (!$ebook->status? 'selected': '')  }}>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-3 col-sm-6">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
