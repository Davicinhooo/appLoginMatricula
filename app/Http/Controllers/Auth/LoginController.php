<?php

namespace App\Http\Controllers\Auth;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function redirectToGoogle(){
        return Socialite::driver("google")->redirect();
    }

    public function handleGoogleCallback(){
        $googleUser = Socialite::driver("google")->user();
        $user = User::firstOrCreate(
            ['email' => $googleUser->email],
            [
                'name' => $googleUser->name,
                'password' => bcrypt('unapassword_segura_123') // Requisito si tu tabla exige password
            ]
        );
    
        // 3. Ahora sí, iniciamos sesión con el modelo de tu base de datos
        Auth::login($user);
    
        // 4. Redirigimos al dashboard
        return redirect('/dashboard');
    }

    public function authenticated(\Illuminate\Http\Request $request, User $user){
        $device = $request->header("User-Agent");
        $request->session()->put('device', $device);
        //$user->session()->create(["device" => $device]);
    }
}
