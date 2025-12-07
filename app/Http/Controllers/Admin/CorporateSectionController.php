<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CorporateSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CorporateSectionController extends Controller
{
    public function index()
    {
        $sections = CorporateSection::whereNotIn('type', ['vision', 'mission', 'healthy_life', 'why_izobims'])->orderBy('order')->get();
        return view('admin.corporate-sections.index', compact('sections'));
    }

    public function visionMission()
    {
        $vision = CorporateSection::where('type', 'vision')->first();
        $mission = CorporateSection::where('type', 'mission')->first();
        return view('admin.corporate-sections.vision-mission', compact('vision', 'mission'));
    }

    public function updateVisionMission(Request $request)
    {
        $validated = $request->validate([
            'vision_title' => 'nullable|string|max:255',
            'vision_content' => 'nullable|string',
            'vision_highlighted' => 'nullable|string|max:255',
            'mission_title' => 'nullable|string|max:255',
            'mission_content' => 'nullable|string',
            'mission_highlighted' => 'nullable|string|max:255',
        ]);

        $vision = CorporateSection::where('type', 'vision')->first();
        if (!$vision) {
            CorporateSection::create([
                'type' => 'vision',
                'title' => $validated['vision_title'],
                'content' => $validated['vision_content'],
                'highlighted_text' => $validated['vision_highlighted'],
                'is_active' => true,
                'order' => 0,
            ]);
        } else {
            $vision->update([
                'title' => $validated['vision_title'],
                'content' => $validated['vision_content'],
                'highlighted_text' => $validated['vision_highlighted'],
            ]);
        }

        $mission = CorporateSection::where('type', 'mission')->first();
        if (!$mission) {
            CorporateSection::create([
                'type' => 'mission',
                'title' => $validated['mission_title'],
                'content' => $validated['mission_content'],
                'highlighted_text' => $validated['mission_highlighted'],
                'is_active' => true,
                'order' => 1,
            ]);
        } else {
            $mission->update([
                'title' => $validated['mission_title'],
                'content' => $validated['mission_content'],
                'highlighted_text' => $validated['mission_highlighted'],
            ]);
        }

        return redirect()->route('admin.corporate-sections.vision-mission')->with('success', 'Vizyon ve Misyon başarıyla güncellendi.');
    }

    public function photos()
    {
        $healthyLife = CorporateSection::where('type', 'healthy_life')->first();
        $whyIzobims = CorporateSection::where('type', 'why_izobims')->first();
        return view('admin.corporate-sections.photos', compact('healthyLife', 'whyIzobims'));
    }

    public function updatePhotos(Request $request)
    {
        $validated = $request->validate([
            'healthy_life_image' => 'nullable|image|max:2048',
            'why_izobims_image' => 'nullable|image|max:2048',
            'why_izobims_title' => 'nullable|string|max:255',
            'why_izobims_content' => 'nullable|string',
        ]);

        $healthyLife = CorporateSection::where('type', 'healthy_life')->first();
        if ($request->hasFile('healthy_life_image')) {
            if (!$healthyLife) {
                $healthyLife = CorporateSection::create([
                    'type' => 'healthy_life',
                    'is_active' => true,
                    'order' => 0,
                ]);
            }
            if ($healthyLife->image) {
                Storage::disk('public')->delete($healthyLife->image);
            }
            $healthyLife->update([
                'image' => $request->file('healthy_life_image')->store('corporate', 'public'),
            ]);
        }

        $whyIzobims = CorporateSection::where('type', 'why_izobims')->first();
        if ($request->hasFile('why_izobims_image')) {
            if (!$whyIzobims) {
                $whyIzobims = CorporateSection::create([
                    'type' => 'why_izobims',
                    'is_active' => true,
                    'order' => 0,
                ]);
            }
            if ($whyIzobims->image) {
                Storage::disk('public')->delete($whyIzobims->image);
            }
            $whyIzobims->update([
                'image' => $request->file('why_izobims_image')->store('corporate', 'public'),
            ]);
        }

        if ($whyIzobims) {
            $updateData = [];
            if (isset($validated['why_izobims_title'])) {
                $updateData['title'] = $validated['why_izobims_title'];
            }
            if (isset($validated['why_izobims_content'])) {
                $updateData['content'] = $validated['why_izobims_content'];
            }
            if (!empty($updateData)) {
                $whyIzobims->update($updateData);
            }
        } elseif ($validated['why_izobims_title'] || $validated['why_izobims_content']) {
            CorporateSection::create([
                'type' => 'why_izobims',
                'title' => $validated['why_izobims_title'] ?? null,
                'content' => $validated['why_izobims_content'] ?? null,
                'is_active' => true,
                'order' => 0,
            ]);
        }

        return redirect()->route('admin.corporate-sections.photos')->with('success', 'Fotoğraflar başarıyla güncellendi.');
    }

    public function create()
    {
        return view('admin.corporate-sections.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'highlighted_text' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('corporate', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? CorporateSection::max('order') + 1;

        CorporateSection::create($validated);

        return redirect()->route('admin.corporate-sections.index')->with('success', 'Bölüm başarıyla oluşturuldu.');
    }

    public function edit(CorporateSection $corporateSection)
    {
        return view('admin.corporate-sections.edit', compact('corporateSection'));
    }

    public function update(Request $request, CorporateSection $corporateSection)
    {
        $validated = $request->validate([
            'type' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'highlighted_text' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($corporateSection->image) {
                Storage::disk('public')->delete($corporateSection->image);
            }
            $validated['image'] = $request->file('image')->store('corporate', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        $corporateSection->update($validated);

        return redirect()->route('admin.corporate-sections.index')->with('success', 'Bölüm başarıyla güncellendi.');
    }

    public function destroy(CorporateSection $corporateSection)
    {
        if ($corporateSection->image) {
            Storage::disk('public')->delete($corporateSection->image);
        }
        $corporateSection->delete();

        return redirect()->route('admin.corporate-sections.index')->with('success', 'Bölüm başarıyla silindi.');
    }
}
