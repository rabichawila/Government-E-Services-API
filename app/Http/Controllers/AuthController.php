<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserCollection;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\AccountActivationRequest;
use App\Mail\AccountActivatedMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'login', 'register', 'activate']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  UserCollection::collection(User::paginate());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterUserRequest $request)
    {
        $newUser = User::create([
            'firstname'             => ucwords($request->firstname),
            'lastname'              => ucwords($request->lastname),
            'gender'                => $request->gender,
            'date_of_birth'         => $request->date_of_birth,
            'passport_no'           => $request->passport_no,
            'national_id'           => $request->national_id,
            'email'                 => $request->email,
            'password'              => Hash::make($request->password),
            'confirmation_code'     => rand(111111, 999999)
        ]);
        return response()->json(new UserCollection($newUser), 201);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function activate(AccountActivationRequest $request)
    {
        $user = User::where('email', $request->email)
                        ->where('confirmation_code', $request->confirmation_code)
                        ->where('account_status', 'pending')
                        ->firstOrFail();

        $user->account_status = 'active';
        $user->email_verified_at = Carbon::now();
        $user->save();

        Mail::to($user)->send(new AccountActivatedMail($user));

        return response()->json(new UserCollection($user), 201);
    }


    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }


    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return new UserCollection(auth('api')->user());
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
