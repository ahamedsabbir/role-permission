@extends('backend.app')
@section('title', 'Fishing Type Create')
@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/common/tm-dashboard.css') }}">
    <style>
        .tm-dashboard-btn {
            align-self:flex-start;
        }
    </style>
@endpush
@section('content')
    <div class="main-content">
        <div class="main-search-bar">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path
                    d="M22 22L20 20M2 11.5C2 6.25329 6.25329 2 11.5 2C16.7467 2 21 6.25329 21 11.5C21 16.7467 16.7467 21 11.5 21C6.25329 21 2 16.7467 2 11.5Z"
                    stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <input placeholder="Search" type="text">
        </div>
        <form class="tm-form" method="post" action="{{route('fishing.type.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="my-input">Name*</label>
                <input class="form-control  @error('name') is-invalid @enderror" type="text" name="name" placeholder="Enter Type Name" value="{{old('name' ?? '')}}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group">
                <label for="my-input">Popular</label>
                <select name="is_popular" class="form-control @error('is_popular') is-invalid @enderror">
                    <option>Select</option>
                    <option value="no" {{ old('is_popular') == 'no' ? 'selected' : '' }}>No</option>
                    <option value="yes" {{ old('is_popular') == 'yes' ? 'selected' : '' }}>Yes</option>
                </select>
                @error('is_popular')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description*</label>
                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description', '') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="my-input">image*</label>
                <input class="form-control dropify  @error('image') is-invalid @enderror" type="file" name="image">
                @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>

            <button class="tm-dashboard-btn" type="submit">Save</button>
        </form>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'), {
                height: '500px'
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $('.dropify').dropify();
    </script>
@endpush