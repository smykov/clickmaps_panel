<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            'token' => 'required|max:64',
        ]);

        $request->user()->sites()->create([
            'name' => $request->name,
            'url' => $request->url,
            'token' => base64_encode($request->url)
        ]);

        return redirect('/sites');
    }

    /**
     * Детальная сайта (Статистика).
     *
     * @param Request $request
     * @param Site $site
     * @return View
     */
    public function view(Request $request, Site $site): View
    {
        $clicks = $site->clickmaps()->get();

        return view('sites.view', [
            'site' => $site
        ]);
    }

    /**
     * JSON для построения графика
     *
     * @param Request $request
     * @param Site $site
     * @return JsonResponse
     */
    public function chart(Request $request, Site $site): JsonResponse
    {
        $result = DB::table('clickmaps')
            ->selectRaw("count(id) as `Data`, DATE_FORMAT(`clicked_at`, '%H:00') as `Labels`")
            ->where('site_id', '=', $site->id)
            ->groupBy('Labels')
            ->orderBy('Labels', 'ASC')
            ->get();

        return response()->json($result);
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
