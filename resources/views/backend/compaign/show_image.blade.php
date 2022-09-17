@extends('backend.layouts.master')
@section('containt')
<div class="home-content">
<div class="card">
        <div class="card-header">
            <div class="row">
                <h3>Images For campaign :<span class="badge bg-dark">{{ $campaign->name }}</span></h3>
            </div>
            <div class="card-body">
                <div class="row mt-4">
                    @foreach ($images as $image)
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
        </div>
</div>
@endsection

