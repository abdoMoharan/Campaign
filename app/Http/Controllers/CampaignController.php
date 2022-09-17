<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CampaignStoreRequest;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = Campaign::all();

        return view('backend.compaign.index',compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.compaign.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create Campaigns And Image Cover
        $path = $request->file('image_cover')->store('image_cover', 'attachment');
        $campaign = Campaign::create([
            'name' => $request->name,
            'image_cover' => $path,
            'from' => $request->from,
            'to' => $request->to,
            'total' => $request->total,
            'daily_budget' => $request->daily_budget,
        ]);

        // Create All Image Campaigns
        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $campaign['name'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('product_images'), $imageName);
                Image::create([
                    'campaign_id' => $campaign->id,
                    'images' => $imageName
                ]);
            }
        }
        return redirect()->route('admin.campaign.index')->with('success', 'campaign Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // show All Image with Id
        $campaign = Campaign::findOrFail($id);
        if (!$campaign) {
            abort(404);
        }
        $images = $campaign->images;
        return view('backend.compaign.show_image', compact('campaign', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
        return view('backend.compaign.edit', compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campaign $campaign)
    {
        $campaign->update([
            'name' => $request->name,
            'from' => $request->from,
            'to' => $request->to,
            'total' => $request->total,
            'daily_budget' => $request->daily_budget,
        ]);

        if($request->hasFile('image_cover')){
            Storage::disk('attachment')->delete($campaign->image_cover);
            $path = $request->file('image_cover')->store('image_cover', 'attachment');
            $campaign->update(['name' => $request->name,
                'image_cover' => $path,
                'from' => $request->from,
                'to' => $request->to,
                'total' => $request->total,
                'daily_budget' => $request->daily_budget,
        ]);
        }

        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $campaign['name'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('product_images'), $imageName);
                Image::create([
                    'campaign_id' => $campaign->id,
                    'images' => $imageName
                ]);
            }
        }

        return redirect()->route('admin.campaign.index')->with('success', 'campaign Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        // Storage::disk('attachment')->delete($campaign->image);
        $campaign->delete();

        return redirect()->route('admin.campaign.index')->with('success', 'campaign Deleted Successfully');
    }
}
