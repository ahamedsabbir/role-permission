<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use App\Models\CMS;
use App\Models\DynamicPage;
use App\Enums\PageEnum;
use App\Enums\SectionEnum;
use App\Models\Setting;

class Helper {
    //! File or Image Upload
    public static function fileUpload($file, string $folder, string $name): ?string {
        if (!$file->isValid()) {
            return null;
        }

        $imageName = Str::slug($name) . '.' . $file->extension();
        $path      = public_path('uploads/' . $folder);
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        $file->move($path, $imageName);
        return 'uploads/' . $folder . '/' . $imageName;
    }

    //! File or Image Delete
    public static function fileDelete(string $path): void {
        if (file_exists($path)) {
            unlink($path);
        }
    }

    //! Generate Slug
    public static function makeSlug($model, string $title): string {
        $slug = Str::slug($title);
        while ($model::where('slug', $slug)->exists()) {
            $randomString = Str::random(5);
            $slug         = Str::slug($title) . '-' . $randomString;
        }
        return $slug;
    }

    //! JSON Response
    public static function jsonResponse(bool $status, string $message, int $code, $data = null): JsonResponse {
        $response = [
            'status'  => $status,
            'message' => $message,
            'code'    => $code,
        ];

        if ($data !== null) {
            $response['data'] = $data;
        }
        return response()->json($response, $code);
    }

    //! File View
    public static function fileView($file_path, $default = null){
        if(isset($file_path) && file_exists(public_path($file_path))){
            return asset($file_path);
        }
        if($default !== null && file_exists(public_path($default))){
            return asset($default);
        }
        return asset('default/logo.png');
    }

    //! Dynamic Pages
    public static function dynamicPages(){
        $dynamicPage = DynamicPage::where('status', 'active')->get();
        return $dynamicPage;
    }

    function getCommonCms()
    {
        $common = CMS::where('page', Page::COMMON)->where('status', 'active');
        foreach (Section::getCommon() as $key => $section) {
            $cms[$key] = (clone $common)->where('section', $key)->latest()->take($section['item'])->{$section['type']}();
        } 
        return $cms;
    }

    public static function getSetting()
    {
        return Setting::first();
    }
}