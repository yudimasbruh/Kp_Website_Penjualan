<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/dashboard/user/create',
        '/dashboard/user/edit/*',
        '/dashboard/kategori/new',
        '/dashboard/produk/new',
        '/dashboard/produk/edit/*'
    ];
}
