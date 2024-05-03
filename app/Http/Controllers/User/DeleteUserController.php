<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DeleteUserController extends Controller
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
    )
    {
        $this->userModel = $userModel;
    }

    /**
     * @param int $userId
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(int $userId): JsonResponse
    {
        try {
            $this->userModel->userDelete($userId);

            return response()->json(['message' => 'Usuário deletado com sucesso'], 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Erro ao processar a solicitação: ' . $e], 500);
        }
    }
}
