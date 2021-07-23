<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Scopes\TenantScope;

class ImpersonationController extends Controller
{
    public function leave()
    {
        abort_unless(session()->has('impersonate'), 403);

        auth()->login(User::withoutGlobalScope(TenantScope::class)->find(session('impersonate')));
        session()->forget('impersonate');

        return redirect('/');
    }
}
