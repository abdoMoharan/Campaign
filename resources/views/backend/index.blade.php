@extends('backend.layouts.master')
@section('containt')
<div class="home-content">
    <div class="row">
        <div>
            @if (session()->has('danger'))
            <div class="alert alert-danger" role="alert">
                <span class="font-medium">{{ session()->get('danger') }}!</span>
            </div>
            @endif
            @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                <span class="font-medium">{{ session()->get('success') }}!</span>
            </div>
            @endif
            @if (session()->has('warning'))
            <div class="alert alert-warning" role="alert">
                <span class="font-medium">{{ session()->get('warning') }}!</span>
            </div>
            @endif
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h3>Show All Campaigns</h3>
            </div>
            <div class="card-body">
                <div class="row mt-4">
                    @foreach ($campaigns as $campaign)
                    <div class="col-md-3">
                        <div class="card text-white bg-outline-secondary mb-3" style="max-width: 20rem;">
                            <div class="card-body text-dark text-center">
                                    <img src="{{asset('attachments/'.$campaign->image_cover) }}" class="card-img-top">
                                <h5 class="card-title">Name : {{ $campaign->name }}</h5>
                                <p class="card-text">Date Form : <span class="text-success">{{ $campaign->from }}</span> </p>
                                <p class="card-text">To : <span class="text-success">{{ $campaign->to }}</span></p>
                                <p class="card-text">Daily Budget :<span class="text-success">{{ $campaign->daily_budget }}</span></p>
                                <p class="card-text">Total :<span class="text-success">{{ $campaign->total }}</span></p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#image{{ $campaign->id }}">
                                    Show All Image Campaigns
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Start Modale Image --}}
                    <!-- Button trigger modal -->


                    <!-- Modal -->
                    <div class="modal fade" id="image{{ $campaign->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">All Image Campaign</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="card-body">
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
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- End Modale Image --}}






























                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection
