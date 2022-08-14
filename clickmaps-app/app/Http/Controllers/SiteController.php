<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Отображение списка всех сайтов.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $sites = $request->user()->sites()->get();

        return view('sites.index', [
            'sites' => $sites,
        ]);
    }

    /**
     * Создание нового сайта.
     *
     * @param Request $request
     * @return Application
     * @throws ValidationException
     */
    public function store(Request $request): Application
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'url' => 'required|max:255',
        ]);

        $request->user()->sites()->create([
            'name' => $request->name,
            'url' => $request->url,
        ]);

        return redirect('/sites');
    }

    /**
     * Уничтожить заданный сайт.
     *
     * @param Request $request
     * @param Site $site
     * @return Application
     * @throws AuthorizationException
     */
    public function destroy(Request $request, Site $site): Application
    {
        $this->authorize('destroy', $site);

        $site->delete();

        return redirect('/sites');
    }
}
