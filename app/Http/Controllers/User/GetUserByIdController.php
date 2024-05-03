<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetUserByIdController extends Controller
{
    /**
     * @var User
     */
    private User $userModel;

    /**
     * @param User $userModel
     */
    public function __construct(
        User $userModel
    ) {
        $this->userModel = $userModel;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        try {
            $user = $this->userModel
                ->userGetById($request->userId);

            return response()->json($user, 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Erro ao processar a solicitação: ' . $e], 500);
        }
    }
}
