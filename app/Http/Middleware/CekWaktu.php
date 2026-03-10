<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekWaktu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $setting = \DB::table('setting_absensi')->where('id', 1)->first();

        if (!$setting) {
            return redirect('/user');
        }

        $now = now();
        $waktuBuka = now()->setTimeFromTimeString($setting->waktu_buka);
        $waktuTutup = now()->setTimeFromTimeString($setting->waktu_tutup);

        if ($now < $waktuBuka || $now > $waktuTutup) {
            return redirect('/user/waktu_tutup');
        }

        return $next($request);
    }
}
