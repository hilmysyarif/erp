<?php



namespace copol\Repositories;

use User;
class UserRepo {
    public function addProvider($provider,$authUser){

        $user              = User::find($authUser);
        $user->provider_id = $provider->id;
        $user->save();

    }

} 