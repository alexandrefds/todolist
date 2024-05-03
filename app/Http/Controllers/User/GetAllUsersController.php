<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class GetAllUsersController extends Controller
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

    public function __invoke()
    {
        return $this->userModel->all();
    }
}
