<?php

namespace App\Http\Controllers\Web\Backend;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($data) {
                    // Status Dropdown
                    $status = '<div class="dropdown">';
                    $status .= '<button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownStatus' . $data->id . '" data-bs-toggle="dropdown" aria-expanded="false">';
                    $status .= $data->status;
                    $status .= '</button>';
                    $status .= '<ul class="dropdown-menu" aria-labelledby="dropdownStatus' . $data->id . '">';
                    $status .= '<li><a class="dropdown-item" href="javascript:void(0);" onclick="showStatusChangeAlert(event, ' . $data->id . ', \'Active\')">Active</a></li>';
                    $status .= '<li><a class="dropdown-item" href="javascript:void(0);" onclick="showStatusChangeAlert(event, ' . $data->id . ', \'Inactive\')">Inactive</a></li>';
                    $status .= '</ul>';
                    $status .= '</div>';

                    return $status;
                })
                ->addColumn('image', function ($data) {
                    $url = asset($data->image);
                    return '<img src="' . $url . '" alt="image" width="40px" height="40px">';
                })

                ->addColumn('action', function ($data) {
                    return '
                    <div class="btn-group btn-group-sm btn-group-custom" role="group" aria-label="Basic example">
                        <a href="' . route('fishing.type.edit', $data->id) . '" class="btn btn-outline-primary" title="Edit">
                            <!-- SVG for Edit Icon -->
                             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M9.16602 1.66663H7.49935C3.33268 1.66663 1.66602 3.33329 1.66602 7.49996V12.5C1.66602 16.6666 3.33268 18.3333 7.49935 18.3333H12.4993C16.666 18.3333 18.3327 16.6666 18.3327 12.5V10.8333" stroke="#030C09" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M13.3675 2.51663L6.80088 9.0833C6.55088 9.3333 6.30088 9.82497 6.25088 10.1833L5.89254 12.6916C5.75921 13.6 6.40088 14.2333 7.30921 14.1083L9.81754 13.75C10.1675 13.7 10.6592 13.45 10.9175 13.2L17.4842 6.6333C18.6175 5.49997 19.1509 4.1833 17.4842 2.51663C15.8175 0.849966 14.5009 1.3833 13.3675 2.51663Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M12.4258 3.45837C12.9841 5.45004 14.5424 7.00837 16.5424 7.57504" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                             </svg>
                        </a>
                        <a href="#" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-outline-danger" title="Delete">
                            <!-- SVG for Delete Icon -->
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M17.5 4.98332C14.725 4.70832 11.9333 4.56665 9.15 4.56665C7.5 4.56665 5.85 4.64998 4.2 4.81665L2.5 4.98332" stroke="#030C09" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M7.08398 4.14163L7.26732 3.04996C7.40065 2.25829 7.50065 1.66663 8.90898 1.66663H11.0923C12.5007 1.66663 12.609 2.29163 12.734 3.05829L12.9173 4.14163" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M15.7077 7.6167L15.166 16.0084C15.0743 17.3167 14.9993 18.3334 12.6743 18.3334H7.32435C4.99935 18.3334 4.92435 17.3167 4.83268 16.0084L4.29102 7.6167" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M8.60742 13.75H11.3824" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M7.91602 10.4166H12.0827" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                               </svg>
                        </a>
                    </div>';
                })

                ->rawColumns(['action', 'status', 'image'])
                ->make(true);
        }

        return view('backend.layouts.fishing-type.index');
    }
    public function create()
    {
        return view('backend.layouts.fishing-type.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'nullable|string',
            'is_popular' => 'required|in:yes,no',

        ]);

        //file upload handle
        if ($request->hasFile('image')) {
            $randomString = Str::random(10);
            $imagePath = Helper::fileUpload($request->file('image'), 'fishing/type', $randomString);
        }

        Fishing::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $imagePath,
            'description' => $request->description,
            'is_popular' => $request->is_popular
        ]);

        return redirect()->route('fishing.type.index')->with('t-success', 'Data Added Successfully');
    }
    public function edit($id)
    {
        $data = Fishing::find($id);
        return view('backend.layouts.fishing-type.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'nullable|string',
            'is_popular' => 'required|in:yes,no',
        ]);
        $data = Fishing::find($id);

        if($request->hasFile('image')) {
            $randomString = Str::random(10);
            $imagePath = Helper::fileUpload($request->file('image'), 'fishing/type', $randomString);

            // Check if the data post already has an image
            if ($data->image) {
                $oldImagePath = public_path($data->image);
                if (file_exists($oldImagePath)) {
                    Helper::deleteFile($oldImagePath);
                }
            }
            $data->image = $imagePath;
        }

        $data->name = $request->name;
        $data->description = $request->description;
        $data->is_popular = $request->is_popular;
        $data->save();

        return redirect()->route('fishing.type.index')->with('t-success', 'Data Updated Successfully');

    }

    public function destroy($id)
    {
        $data = Fishing::findOrFail($id);

        if (!$data) {
            return response()->json(['t-success' => false, 'message' => 'Data not found.']);
        }
        $data->delete();
        return response()->json(['t-success' => true, 'message' => 'Deleted successfully.']);
    }

    public function status($id)
    {
        $data = Fishing::where('id', $id)->first();
        if ($data->status == 'Active') {
            // If the current status is active, change it to inactive
            $data->status = 'Inactive';
            $data->save();

            // Return JSON response indicating success with message and updated data
            return response()->json([
                'success' => false,
                'message' => 'Unpublished Successfully.',
                'data' => $data,
            ]);
        } else {
            // If the current status is inactive, change it to active
            $data->status = 'Active';
            $data->save();

            // Return JSON response indicating success with a message and updated data.
            return response()->json([
                'success' => true,
                'message' => 'Published Successfully.',
                'data' => $data,
            ]);
        }
    }
}