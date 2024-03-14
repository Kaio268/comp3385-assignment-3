    <?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class AuthController extends Controller
    {
        public function create()
        {
            return view('auth.login'); // Load login form view
        }

        public function store(Request $request)
        {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect('dashboard')->with('success', 'Login successful'); // Redirect on successful login
            }

            return back()->withErrors([
                'email' => 'Invalid credentials. Check the email address and password entered.',
            ]);
        }

        // Logout method (Exercise 7 - Requirement 1)
        public function logout(Request $request)
        {
            Auth::logout(); // Log the user out (Exercise 7 - Requirement 2)
            $request->session()->invalidate(); // Invalidate the session
            $request->session()->regenerateToken(); // Regenerate the token

            return redirect('/')->with('message', 'You have been successfully logged out.'); // Redirect with success message (Exercise 7 - Requirement 3)
        }
    }
