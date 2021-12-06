<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Services\Traits\Filter;
use App\Services\Traits\Search;
use App\Services\Traits\Sort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class SettingsController extends Controller
{
    use Sort;
    use Filter;
    use Search;

    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $settings = Settings::query();
        $settings = $request->get('enable') ? $settings->where('enable', 1) : $settings;
        $settings = $request->get('disable') ? $settings->orWhere('enable', 0) : $settings;

        $settings = $this->search($settings, ['id', 'type', 'value', 'name']);
        if ($request->has('direction')) {
            $columns = $this->sortables($request);
            $settings = $this->sort($settings, $columns, $request->get('direction'));
        }

        $settings = $settings->paginate(100);

        $params = $request->all();
        $params['enable'] = $request->get('enable') == 'true' ? 'true' : '';
        $params['disable'] = $request->get('disable') == 'true' ? 'true' : '';
        return Inertia::render('Settings/Index', [
            'settings' => $settings->withQueryString(),
            'params' => $params
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Settings/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
            'type' => ['required', 'string'],
            'value' => ['required', 'string']
        ]);
        $data = $request->all();
        $data['enable'] = true;
        Settings::create($data);

        return Redirect::route('settings.index')->with('success', 'Setting created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Inertia\Response
     */
    public function edit(Settings $setting)
    {
        return Inertia::render('Settings/Create', [
            'setting' => $setting
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Settings $setting)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
            'type' => ['required', 'string'],
            'value' => ['required', 'string']
        ]);
        $setting->update($request->all());

        return Redirect::route('settings.index')->with('success', 'Setiing updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Settings $setting)
    {
        $setting->delete();

        return Redirect::route('settings.index')->with('success', 'Setting deleted successfully.');
    }

    /**
     * @param Request $request
     * @return array
     */
    public function sortables(Request $request)
    {
        $sorts = [];
        foreach (['id', 'type', 'value', 'name'] as $sort) {
            if ($request->get($sort)) {
                $sorts[] = $sort;
            }
        }

        return $sorts;
    }
}
