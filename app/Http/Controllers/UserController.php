<?php

namespace App\Http\Controllers;

use App\Repository\UsersRepository;
use App\Transformer\UserTransformer;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    use Helpers;


    protected $userRepository;
    protected $userTransformer;

    /**
     * UserController constructor.
     * @param $userRepository
     * @param $userTransformer
     */
    public function __construct(UsersRepository $userRepository, UserTransformer $userTransformer)
    {
        $this->userRepository = $userRepository;
        $this->userTransformer = $userTransformer;
    }

    public function show()
    {

        $user = $this->userRepository->getAll();

        $response = $this->response->item($user, new UserTransformer());

        return $response;

    }

}
