@extends('user.layouts.master')
@section('title', 'View Ebook')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Ebook</h1>
            <a href="{{ route('user.ebooks.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-eye fa-sm text-white-50"></i> View All</a>
        </div>

    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="post">
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label text-right font-weight-bold">Title *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="title" value="{{ $ebook->title }}" name="title" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="writer" class="col-sm-3 col-form-label text-right font-weight-bold">Writer *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="writer" value="{{ $ebook->writer }}" name="writer" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="publisher" class="col-sm-3 col-form-label text-right font-weight-bold">Publisher</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="publisher" value="{{ $ebook->publisher }}" name="publisher" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="edition" class="col-sm-3 col-form-label text-right font-weight-bold">Edition</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="edition" value="{{ $ebook->edition }}" name="edition" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pages" class="col-sm-3 col-form-label text-right font-weight-bold">Pages</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="pages" value="{{ $ebook->pages }}" name="pages" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="language" class="col-sm-3 col-form-label text-right font-weight-bold">Language</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="language" value="{{ $ebook->language }}" name="language" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-sm-3 col-form-label text-right font-weight-bold">Price *</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="price" value="{{ $ebook->price }}" name="price" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="summary" class="col-sm-3 col-form-label text-right font-weight-bold">Summary</label>
                        <div class="col-sm-6">
                            <textarea name="summary" id="summary" rows="5" class="form-control" disabled>{{ $ebook->summary }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                        <div class="col-sm-6">
                            <select name="status" id="status" class="form-control" disabled>
                                <option value="1" {{ ($ebook->status? 'selected': '')  }}>Active</option>
                                <option value="0" {{ (!$ebook->status? 'selected': '')  }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
