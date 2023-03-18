<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{

    public function __construct() {

        $this->middleware('auth:api', ['except' => ['login', 'register','userManage']]);

    }

    public function userDelete(Request $request){
        $id = $request->id;
        try {

            User::find($id)->delete();
            return response()->json(['status' => 'success'], 200);

        } catch (\Exception $e) {

            return response()->json(['status' => 'error' , 'message' => $e->getMessage()], 500);

        }
    }

    public function userManage(Request $request){
        if(Session::exists('session_login')){
            $data["session_login"] = Session::get('session_login');
            return view('manage_user', $data);
        }else{
            return redirect()->route('api/auth/login');
        }
    }

    public function login(Request $request){

    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = json_decode(auth()->user());

        $response = [
            'access_token'  => $token,
            'status'        => true,
            'token_type'    => 'bearer',
            'user'          => $user
        ];

        $new_session = [
            'access_token'  => $token,
            'login_time'    => date("Y-m-d H:i:s"),
            'login_user'    => $user,
        ];

        Session::put('session_login', $new_session);

        return response()->json($response);
    }

    public function register(Request $request) {

        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|between:2,100',
                'email' => 'required|string|email|max:100|unique:users',
                'password' => 'required|string|min:6',
                'phone' => 'required|string|min:10',
                'username' => 'required|string|min:6',
                'company' => 'required|string',
                'nationality' => 'required|string'
            ]);
            if($validator->fails()){
                return response()->json($validator->errors(), 400);
            }

            $user = User::create(array_merge(
                        $validator->validated(),
                        ['password' => bcrypt($request->password)]
                    ));

            return response()->json([
                'status' => 'success',
                'message' => 'User successfully registered',
                'user' => $user
            ], 201);

        } catch (\Exception $e) {

            return response()->json(['status' => 'error' , 'message' => $e->getMessage()], 500);

        }

    }

    public function logout(Request $request) {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    public function refresh(Request $request) {
        return $this->createNewToken(auth()->refresh());
    }

    public function userProfile(Request $request) {
        $user = User::all();
        return response()->json($user);
    }

    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'status'        => true,
            // 'token_type'    => 'bearer',
            // 'expires_in'    => auth()->factory()->getTTL() * 60,
            // 'user'          => auth()->user()
        ]);
    }


    // new version
    // public function refresh(Request $request) {
    //     $success = [
    //         'token' => auth()->refresh()
    //     ];
    //     return $this->sendResponse($success, 'refresh login', 200);
    // }

    // public function logout(Request $request) {
    //     auth()->logout();
    //     return response()->json(['message' => 'User successfully signed out']);
    // }

    // public function sendResponse($data, $message, $status = 200)
    // {
    //     $response = [
    //         'data' => $data,
    //         'message' => $message
    //     ];

    //     return response()->json($response, $status);
    // }

    // public function sendError($errorData, $message, $status = 500)
    // {
    //     $response = [];
    //     $response['message'] = $message;
    //     if (!empty($errorData)) {
    //         $response['data'] = $errorData;
    //     }

    //     return response()->json($response, $status);
    // }

    // public function register(Request $request)
    // {
    //     $input = $request->only('name', 'email', 'password', 'c_password');

    //     $validator = Validator::make($input, [
    //         'name' => 'required|string|between:2,100',
    //         'email' => 'required|string|email|max:100|unique:users',
    //         'password' => 'required|string|min:6',
    //         'phone' => '',
    //         'username' => '',
    //         'company' => '',
    //         'nationality' => ''
    //     ]);

    //     if($validator->fails()){
    //         return $this->sendError($validator->errors(), 'Validation Error', 422);
    //     }

    //     $input['password'] = bcrypt($input['password']); // use bcrypt to hash the passwords
    //     $user = User::create($input); // eloquent creation of data

    //     $success['user'] = $user;

    //     return $this->sendResponse($success, 'user registered successfully', 201);

    // }

    // public function login(Request $request)
    // {
    //     $input = $request->only('email', 'password');

    //     $validator = Validator::make($input, [
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);

    //     if($validator->fails()){
    //         return $this->sendError($validator->errors(), 'Validation Error', 422);
    //     }

    //     try {
    //         // this authenticates the user details with the database and generates a token
    //         if (! $token = JWTAuth::attempt($input)) {
    //             return $this->sendError([], "invalid login credentials", 400);
    //         }
    //     } catch (JWTException $e) {
    //         return $this->sendError([], $e->getMessage(), 500);
    //     }

    //     $success = [
    //         'token' => $token,
    //     ];
    //     return $this->sendResponse($success, 'successful login', 200);
    // }

    // public function getUser()
    // {
    //     try {
    //         $user = JWTAuth::parseToken()->authenticate();
    //         if (!$user) {
    //             return $this->sendError([], "user not found", 403);
    //         }
    //     } catch (JWTException $e) {
    //         return $this->sendError([], $e->getMessage(), 500);
    //     }

    //     return $this->sendResponse($user, "user data retrieved", 200);
    // }


}
