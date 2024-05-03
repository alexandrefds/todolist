<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UpdateUserController extends Controller
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
    public function __invoke(int $userId, Request $request): JsonResponse
    {
        try {
            $data = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$userId],
            ]);

            $this->userModel->userUpdate($userId, $data);

            return response()->json(['message' => 'Usuário atualizado com sucesso'], 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Erro ao processar a solicitação: ' . $e], 500);
        }
    }
}
