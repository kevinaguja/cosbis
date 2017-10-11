<?php

namespace App\Http\Controllers;

use App\Cosbis\Repositories\OrganizationRepository;
use App\Cosbis\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    private $organizationRepository, $userRepository;
    /**
     * OrganizationController constructor.
     */
    public function __construct(OrganizationRepository $organizationRepository, UserRepository $userRepository)
    {
        $this->organizationRepository= $organizationRepository;
        $this->userRepository= $userRepository;
    }

    public function index()
    {
        $organizations= $this->organizationRepository->all();
        $user_orgs= $this->userRepository->find(2)->organizations()->pluck('organizations.id');


        return view('organizations.index', compact('organizations', 'user_orgs'));
    }
}
