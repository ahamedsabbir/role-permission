@extends('backend.master')
@section('content')
<div class="container-fluid">

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('permissions.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Permission Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->

</div>
@endsection