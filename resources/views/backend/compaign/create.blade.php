@extends('backend.layouts.master')
@section('containt')
<div class="home-content">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.campaign.index') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.campaign.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- Text input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form6Example3">Campaign name</label>
                    <input type="text" id="form6Example3" class="form-control" name="name" required/>
                    @error('name')
                    <div class="alert alert-danger" role="alert">
                        <span class="font-medium">{{ $message }}!</span>
                    </div>
                    @enderror
                </div>
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example1">From</label>
                            <input type="date" id="form6Example1" class="form-control" name="from" required />
                            @error('from')
                            <div class="alert alert-danger" role="alert">
                                <span class="font-medium">{{ $message }}!</span>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example2">To</label>
                            <input type="date" id="form6Example2" class="form-control" name="to" required/>
                        </div>
                        @error('to')
                        <div class="alert alert-danger" role="alert">
                            <span class="font-medium">{{ $message }}!</span>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="images">Cover_image</label>
                    <input type="file" id="images" class="form-control" name="image_cover" required />
                    @error('image_cover')
                    <div class="alert alert-danger" role="alert">
                        <span class="font-medium">{{ $message }}!</span>
                    </div>
                    @enderror
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="images">Images</label>
                    <input type="file" id="images" class="form-control" name="images[]" multiple="multiple" required />
                    @error('images')
                    <div class="alert alert-danger" role="alert">
                        <span class="font-medium">{{ $message }}!</span>
                    </div>
                    @enderror
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="daily_budget">Daily Budget</label>
                            <input type="number" id="daily_budget" class="form-control" name="daily_budget" required/>
                        </div>
                        @error('daily_budget')
                        <div class="alert alert-danger" role="alert">
                            <span class="font-medium">{{ $message }}!</span>
                        </div>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="total">Total</label>
                            <input type="number" id="total" class="form-control" name="total" required/>
                        </div>
                        @error('total')
                        <div class="alert alert-danger" role="alert">
                            <span class="font-medium">{{ $message }}!</span>
                        </div>
                        @enderror
                    </div>

                </div>
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Create New Campaign</button>
            </form>


        </div>
    </div>
</div>
@endsection
