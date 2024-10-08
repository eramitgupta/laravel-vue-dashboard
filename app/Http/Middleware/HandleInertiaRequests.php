<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Tighten\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {

        return array_merge(parent::share($request), [
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                    'query' => $request->query(),
                ]);
            },
            'menu' => sideMenu(),
            'auth' => function () use ($request) {
                return [
                    'user' => $request->user() ? $request->user() : null,
                ];
            },
            'flash' => [
                'message' => function () use ($request) {
                    return $request->session()->get('message');
                },
                'type' => function () use ($request) {
                    return $request->session()->get('type');
                },
                'timestamp' => date('h:i:s'),
            ],
            // 'user_permissions' => $request->user()
            //     ? $request->user()->roles->flatMap(fn ($role) => $role->permissions->pluck('name'))
            //         ->unique()->values()
            //     : [],
            // 'user_roles' => $request->user() ? $request->user()->roles : [],
        ]);
    }
}
