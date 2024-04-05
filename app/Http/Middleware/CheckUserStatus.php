<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

        public function handle(Request $request, Closure $next)
        {
            // Kiểm tra xem người dùng đã xác thực hay chưa
            if (Auth::check()) {
                $user = Auth::user();

                // Kiểm tra xem người dùng có bị block và trạng thái của họ có phải là "inactive" không
                if ($user->status === 'inactive') {
                    // Nếu có, chuyển hướng họ đến trang thông báo hoặc trang chủ
                    return redirect()->route('BlockedPage')->with('error', 'Your account has been blocked and is in inactive status.');
                }
            // Nếu không, tiếp tục xử lý yêu cầu
            return $next($request);
        }
    }
}
