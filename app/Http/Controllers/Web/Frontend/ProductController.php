<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function search()
    {
        if ($request->has('search')) {
            $valudation = $request->validate([
                'name' => 'required|string|max:255',
                'time_date' => 'required',
                'participants' => 'required|gt:0',
            ]);

            $advertiseCharters = FishingCharter::with(['user', 'reviews', 'images'])
                ->whereHas('adventure', function ($query) {
                    $query->where('status', 'Active');
                })
                ->where('status', 'Active')
                ->withAvg('reviews', 'rating')
                ->withCount([
                    'reviews' => function ($query) {
                        $query->where('status', 'Active');
                    }
                ]);

            if ($request->has('name') && $request->name != null) {
                $advertiseCharters->where('name', 'like', '%' . $request->name . '%');
            }

            if ($request->has('time_date') && $request->time_date != null) {
                $date = new \DateTime($request->time_date);
                $formattedDate = $date->format('Y-m-d');
                $advertiseCharters->whereDate('created_at', $formattedDate);
            }

            if ($request->has('participants') && $request->participants != null) {
                $advertiseCharters->where('participants', $request->participants);
            }

            if ($advertiseCharters->count() <= 0) {
                Session()->put('error', 'No result found');
            }

            $advertiseCharters = $advertiseCharters->paginate(6);
        } else {
            $advertiseCharters = null;
        }
        return view('frontend.layouts.products');
    }
}
