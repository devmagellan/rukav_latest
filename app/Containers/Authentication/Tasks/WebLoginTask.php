<?php

namespace App\Containers\Authentication\Tasks;

use App\Containers\Authentication\Exceptions\LoginFailedException;
use App\Ship\Parents\Tasks\Task;
use Auth;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class WebLoginTask extends Task
{
    /**
     * @param string $email
     * @param string $password
     * @param bool   $remember
     *
     * @return Authenticatable
     * @throws LoginFailedException
     */
    public function run(string $email, string $password, bool $remember = false) : Authenticatable
    {
        if (!$user = Auth::guard('admin')->attempt(['email' => $email, 'password' => $password,'is_client'=>0], $remember)) {
            throw new LoginFailedException();
        }

        return Auth::guard('admin')->user();
    }

}
