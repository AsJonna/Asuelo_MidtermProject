<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\User;
    use Illuminate\Http\Response;

    class UserController extends Controller
    {
        private $request;

        public function __construct(Request $request)
        {
            $this->request = $request;
        }

        public function getUsers()
        {
            $users = User::all();
            return response()->json($users, 200);
        }

        public function index()
        {
            $users = User::all();
            return response()->json($users, 200);
        }

        public function add(Request $request)
        {
            $rules = [
                'username' => 'required|max:20',
                'password' => 'required|max:20',
                'gender' => 'required|in:Male,Female',
            ];

            $this->validate($request, $rules);

            $user = User::create($request->all());

            return response()->json($user, 200);
        }

        public function update(Request $request, $id)
        {
            $user = User::find($id);

            if (!$user) {
                return response()->json(['error' => 'User not found'], 404);
            }

            $rules = [
                'username' => 'required|max:20',
                'password' => 'required|max:20',
                'gender' => 'required|in:Male,Female',
            ];

            $this->validate($request, $rules);

            $user->update($request->all());

            return response()->json($user, 200);
        }
        public function delete($id)
        {
            $user = User::find($id);

            if (!$user) {
                return response()->json(['error' => 'User not found'], 404);
            }

            $user->delete();

            return response()->json(['message' => 'User deleted successfully'], 200);
        }

        public function search(Request $request)
        {
            $username = $request->input('username');

            $users = User::where('username', 'like', "%$username%")->get();

            if ($users->isEmpty()) {
                return response()->json(['error' => 'No users match'], 404);
            }

            return response()->json($users, 200);
        }
    }