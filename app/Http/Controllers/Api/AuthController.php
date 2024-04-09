<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
      /**
* @OA\Post(
     *     path="/api/register",
     *     summary="Register a new user",
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="User's name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="email",
     *         in="query",
     *         description="User's email",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="password",
     *         in="query",
     *         description="User's password",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *
     *    
     *     @OA\Response(
     *     response="422", 
     *     description="Validation errors",
     *     ),
     * 
     *    @OA\Response(
     *    response="201", 
     *    description="User registered successfully",
     *    @OA\JsonContent
     *     ),
     *  
     * )
     */
    public function register(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8',
        ]);


        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return response()->json(['message' => 'User registered sucrcessfully'], 201);
    }


/**
     * @OA\Post(
     *     path="/api/login",
     *     summary="Authenticate user and generate JWT token",
     *     @OA\Parameter(
     *         name="email",
     *         in="query",
     *         description="User's email",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="password",
     *         in="query",
     *         description="User's password",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="Login successful"),
     *     @OA\Response(response="401", description="Invalid credentials")
     * )
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
         if (Auth::attempt($credentials)) {
            $token = Auth::user()->createToken('api_token')->plainTextToken;
            
            return response()->json(['message' => 'Login Success','token' => $token,'status' => 'success'], 200);
        }
     return response()->json(['error' => 'Invalid credentials'], 401);
    }   

    /**
     * @OA\Get(
     *     path="/api/user",
     *     summary="Get logged-in user details",
     *     @OA\Response(response="200", description="Success"),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function getUserDetails(Request $request)
    {
        $user = $request->user();
        return response()->json(['user' => $user], 200);
    }

/**
 * @OA\Post(
 *     path="/api/resetPassword",
 *     summary="Change user's password",
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="password",
 *         in="query",
 *         description="User's password",
 *         required=true,
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Password Changed Successfully",
 *         @OA\JsonContent()
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent()
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent()
 *     )
 * )
 */


 public function change_password(Request $request)
 {
     // Validation
     $request->validate([
         'password' => 'required',
     ]);
 
     // Get authenticated user
     $loggeduser = auth('sanctum')->user();

    //  dd($loggeduser);
 
    
     $loggeduser->password = Hash::make($request->password);
     $loggeduser->save();
 
     return response()->json([
         'message' => 'Password Changed Successfully',
         'status' => 'success'
     ], 200);
 }
 

}
