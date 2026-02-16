<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $rules = [
            'settings' => 'required|array',
            'settings.*.key' => 'required|string',
            'settings.*.value' => 'nullable|string',
            'settings.*.type' => 'required|string',
            'settings.*.group' => 'required|string',
        ];

        // Thêm validation cho images nếu có upload
        // Laravel xử lý nested array như: images[certificates][] => images.certificates.*
        if ($request->has('images')) {
            $rules['images.certificates'] = 'nullable|array';
            $rules['images.certificates.*'] = 'nullable|file|max:4096';
            $rules['images.factory'] = 'nullable|array';
            $rules['images.factory.*'] = 'nullable|file|max:4096';
            $rules['images.farm_guava'] = 'nullable|array';
            $rules['images.farm_guava.*'] = 'nullable|file|max:4096';
            $rules['images.farm_sori'] = 'nullable|array';
            $rules['images.farm_sori.*'] = 'nullable|file|max:4096';
            $rules['images.application_solution'] = 'nullable|array';
            $rules['images.application_solution.*'] = 'nullable|file|max:4096';
        }

        $validated = $request->validate($rules);

        foreach ($request->settings as $setting) {
            $value = $setting['value'] ?? '';
            if (($setting['key'] ?? '') === 'application_solution_description') {
                $value = mb_substr(trim($value), 0, 200);
            }
            Setting::set(
                $setting['key'],
                $value,
                $setting['type'],
                $setting['group']
            );
        }

        $uploadedCount = 0;
        $uploadErrors = [];

        $directoryMap = [
            'certificates' => 'img/certificates',
            'factory' => 'img/factory',
            'farm_guava' => 'img/farm',
            'farm_sori' => 'img/farm',
            'application_solution' => 'img/application_solution',
        ];

        $settingKeyMap = [
            'certificates' => 'certificates_gallery',
            'factory' => 'factory_gallery',
            'farm_guava' => 'farm_guava_gallery',
            'farm_sori' => 'farm_sori_gallery',
            'application_solution' => 'application_solution_gallery',
        ];

        // Xử lý upload cho từng nhóm
        // Laravel xử lý nested array như: images[certificates][] => $request->file('images')['certificates']
        $imagesData = $request->file('images', []);
        
        foreach (['certificates', 'factory', 'farm_guava', 'farm_sori', 'application_solution'] as $groupKey) {
            // Kiểm tra theo 2 cách: nested và direct
            $files = null;
            if (isset($imagesData[$groupKey]) && !empty($imagesData[$groupKey])) {
                $files = $imagesData[$groupKey];
            } elseif ($request->hasFile("images.{$groupKey}")) {
                $files = $request->file("images.{$groupKey}");
            }
            
            if (!$files || (is_array($files) && empty(array_filter($files, function($f) { return $f && $f->isValid(); })))) {
                continue;
            }

            // Chuẩn hoá: luôn là mảng file
            if (!is_array($files)) {
                $files = [$files];
            }

            $storedPaths = [];
            foreach ($files as $file) {
                if (!$file || !$file->isValid()) {
                    continue;
                }

                try {
                    $directory = $directoryMap[$groupKey] ?? 'img/other';
                    $path = $file->store($directory, 'public');
                    if ($path) {
                        $storedPaths[] = $path;
                        $uploadedCount++;
                    }
                } catch (\Exception $e) {
                    $uploadErrors[] = "Lỗi upload {$file->getClientOriginalName()}: " . $e->getMessage();
                }
            }

            if (empty($storedPaths)) {
                continue;
            }

            $settingKey = $settingKeyMap[$groupKey] ?? ('images_gallery_' . $groupKey);
            $existing = json_decode(Setting::get($settingKey, '[]'), true) ?: [];
            $merged = array_merge($existing, $storedPaths);

            Setting::set($settingKey, json_encode($merged), 'json', $groupKey);
        }

        $message = 'Cài đặt đã được cập nhật thành công.';
        if ($uploadedCount > 0) {
            $message .= " Đã upload {$uploadedCount} file thành công.";
        }
        if (!empty($uploadErrors)) {
            $message .= " Lỗi: " . implode(', ', $uploadErrors);
        }

        return redirect()->route('admin.settings.index')
            ->with('success', $message);
    }
}
