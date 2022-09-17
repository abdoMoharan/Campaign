@extends('backend.layouts.master')
@section('containt')
<div class="home-content">
<div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <a href="{{ route('admin.campaign.create') }}" class="btn btn-outline-success mb-2">Create Campaign</a>
            <div class="table-responsive">
                <table class="table table-secondary table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">All Image</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Daily_budget</th>
                            <th scope="col">Total</th>
                            <th scope="col">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i= 1;
                        @endphp
                        @forelse ($campaigns as $campaign )
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $campaign->name }}</td>


                            <td>
                                <a href="{{ route('admin.campaign.show',$campaign->id) }}"
                                    class="btn btn-outline-success">Image: {{ $campaign->images()->count() }}</a>
                            </td>
                            <td>{{ $campaign->from }}</td>
                            <td>{{ $campaign->to }}</td>
                            <td>{{ $campaign->daily_budget }}</td>
                            <td>{{ $campaign->total }}</td>
                            <td>
                                <div class="row mb-2 m-auto">
                                    <div class="col-md-3">
                                        <a href="{{ route('admin.campaign.edit',$campaign->id) }}"
                                            class="btn btn-warning">Edit</a>
                                    </div>
                                    <div class="col-md-3">
                                        {{-- Start Delete campaign --}}

                                        <form method="POST" action="{{ route('admin.campaign.destroy', $campaign->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>

                                        {{-- End Delete campaign --}}
                                    </div>
                                </div>


                            </td>
                        </tr>
                        @empty
                        <td colspan="8">
                            <div class="alert alert-danger" role="alert">
                                <span class="font-medium">NO Date ....</span>
                            </div>
                        </td>
                        @endforelse

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection

