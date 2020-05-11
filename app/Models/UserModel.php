<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'email', 'password'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getUser($id)
    {
        return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }

    public function login($data)
    {
        $user = $this->asArray()
            ->where(['email' => $data['email']])
            ->where(['password' => $data['password']])
            ->first();

        if(is_array($user) > 0) {
            return $user;
        }
        return false;
    }
}