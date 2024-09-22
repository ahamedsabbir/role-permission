@extends('backend.master')
@section('content')
<div class="container-fluid">

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Role Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="permission" class="form-label">Permissions</label>
                            @foreach ($permissions as $permission)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $permission->name }}" id="{{ $permission->name }}" name="permissions[]">
                                    <label class="form-check-label" for="{{ $permission->name }}">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->

</div>
@endsection