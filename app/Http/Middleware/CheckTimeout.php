<!-- namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;



// class CheckTimeout
// {
//     public function handle($request, Closure $next)
//     {
//         // セッションが存在し、かつセッションの有効期限が切れている場合
//         if (Auth::check() && time() - session('last_activity_time') > config('session.lifetime')) {
//             // ログアウトする
//             Auth::logout();

//             // ログイン画面にリダイレクトする
//             return redirect('/login')->with('timeout_message', 'セッションがタイムアウトしました。もう一度ログインしてください。');
//         }

//         // 最終アクティビティの時間を更新
//         session(['last_activity_time' => time()]);

//         return $next($request);
//     }
// }
