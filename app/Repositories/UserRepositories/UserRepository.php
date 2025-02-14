<?php

namespace App\Repositories\UserRepositories;

use App\Models\User;
use App\Models\Company;
class UserRepository
{
    public function fetchAllUsers()
    {
        return User::with('company')->get();
    }

    public function getUserById(int $id)
    {
        return User::with('company')->find($id);
    }

    public function createUser(array $data)
    {
        $company = Company::firstOrCreate(['name' => $data['company_name']]);

        $user = User::create(array_merge($data, ['company_id' => $company->id]));

        return [
            'user' => $user,
            'company' => $company
        ];
    }

    public function updateUser(int $id, array $data)
    {
     
        $user = User::find($id);

        if ($user) {
            if (isset($data['company_name'])) {
                $company = Company::firstOrCreate(['name' => $data['company_name']]);
                $data['company_id'] = $company->id;
            }
            $user->update($data);

            $user->company;

            return $user;
        } else {
            return null;
        }
    }

    public function deleteUser(int $id): bool
    {
        $user = User::find($id);
        if ($user) {
            return $user->delete();
        }

        return false;
    }

    public function searchUsers(array $filters)
    {
        $userQuery = User::query();
        
        foreach ($filters as $field => $term) {
            if ($field === 'company_name' && $term) {
                $userQuery->whereHas('company', function ($companyQuery) use ($term) {
                    $companyQuery->where('name', 'like', "%{$term}%");
                });
            } elseif ($term) {
                $userQuery->where($field, 'like', "%{$term}%");
            }
        }
        return $userQuery->with('company')->get();
    }
}