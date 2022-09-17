@extends('backend.layouts.master')
@section('containt')
<div class="home-content">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.campaign.index') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('admin.campaign.update',$campaign->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <!-- Text input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form6Example3">Campaign name</label>
                    <input type="text" id="form6Example3" class="form-control" name="name"
                        value="{{ $campaign->name }}" />
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
                            <input type="date" id="form6Example1" class="form-control" name="from"
                                value="{{ $campaign->from }}" />
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
                            <input type="date" id="form6Example2" class="form-control" name="to"
                                value="{{ $campaign->to }}" />
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
                    <div class="col-md-3">
                            <div class="card text-white bg-outline-secondary mb-3" style="max-width: 20rem;">
                                <div class="card-body">
                                    <img src="{{ asset('attachments/'.$campaign->image_cover) }}" class="card-img-top">
                                </div>
                            </div>
                        </div>
                    @error('image_cover')
                    <div class="alert alert-danger" role="alert">
                        <span class="font-medium">{{ $message }}!</span>
                    </div>
                    @enderror
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="images">Images</label>
                    <input type="file" id="images" class="form-control" name="images[]" multiple="multiple"
                        accept="image/*" />
                    @error('images')
                    <div class="alert alert-danger" role="alert">
                        <span class="font-medium">{{ $message }}!</span>
                    </div>
                    @enderror
                    <div class="row mt-4">
                        @foreach ($campaign->images as $image)
                        <div class="col-md-3">
                            <div class="card text-white bg-outline-secondary mb-3" style="max-width: 20rem;">
                                <div class="card-body">
                                    <img src="/product_images/{{$image->images}}" class="card-img-top">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="daily_budget">Daily Budget</label>
                            <input type="number" id="daily_budget" class="form-control" name="daily_budget"
                                value="{{ $campaign->daily_budget }}" />
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
                            <input type="number" id="total" class="form-control" name="total"
                                value="{{ $campaign->total }}" />
                        </div>
                        @error('total')
                        <div class="alert alert-danger" role="alert">
                            <span class="font-medium">{{ $message }}!</span>
                        </div>
                        @enderror
                    </div>

                </div>
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Update New Campaign</button>
            </form>


        </div>
    </div>
</div>
@endsection
