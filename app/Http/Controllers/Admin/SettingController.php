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
        $validated = $request->validate([
            'settings' => 'required|array',
            'settings.*.key' => 'required|string',
            'settings.*.value' => 'nullable|string',
            'settings.*.type' => 'required|string',
            'settings.*.group' => 'required|string',
        ]);

        foreach ($request->settings as $setting) {
            Setting::set(
                $setting['key'],
                $setting['value'] ?? '',
                $setting['type'],
                $setting['group']
            );
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Cài đặt đã được cập nhật thành công.');
    }
}
