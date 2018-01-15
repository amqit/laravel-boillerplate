<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Core\UsersModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Validator;

/**
 * @property UsersModel users
 */
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->users = new UsersModel();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        $data['title'] = 'Login';
        return view('frontend.official.auth.login',$data);
    }

    /**
     * Login process
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(Request $request)
    {
        $data = $request->all();
        Validator::make($data, [
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => __('auth.empty_email'),
            'password.required' => __('auth.empty_password'),
        ])->validate();

        if(config('app.captcha') == true){
            Validator::make($data, [
                'captcha' => 'required|captcha'
            ],[
                'captcha.required' => __('auth.empty_captcha'),
                'captcha.captcha' => __('auth.wrong_captcha'),
            ])->validate();
        }

        $user = $this->users->where('email',$request->email)->first();
        if (!$user) {
            return redirect('/')->with('message', Lang::get('auth.not_found'))
                ->with('type', 'error')->withInput();
        } else {
            if ($user->active == 0) {
                return redirect('/')->with('message', Lang::get('auth.not_active'))
                    ->with('type', 'warning')->withInput();
            }

            $remember = $request->get('remember');
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'active' => 1], $remember)) {
                $session = array(
                    'uid' => $user->user_id,
                    'username' => $user->username,
                    'fullname' => $user->fullname,
                    'email' => $user->email,
                    'group' => $user->group_id,
                    'group_name' => $user->group->name,
                    'alias' => $user->group->alias,
                    'logged_in' => true,
                );
                $user->last_login = Carbon::now();
                $user->save();
                session($session);
                return redirect('/')->with('message', sprintf(Lang::get('auth.success_login'), $user->fullname))
                    ->with('type', 'success');
            } else {
                return redirect('/')->with('message', Lang::get('auth.wrong_pass'))
                    ->with('type', 'warning')->withInput();
            }
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/');
    }
}
