<?php

namespace MyProject\Services;

use MyProject\Models\Users\User;

class UserActivationService
{
    private const TABLE_NAME = 'users_activation_codes';
    private Db $db;
    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    public function createActivationCode(User $user): string
    {
        $code = bin2hex(random_bytes(16));

        $this->db->query(
            'INSERT INTO ' . self::TABLE_NAME . ' (user_id, code) VALUES (:user_id, :code)',
            ['user_id' => $user->getId(), 'code' => $code]
        );

        return $code;
    }

    public function checkActivationCode(User $user, string $code): bool
    {
        $result = $this->db->query(
            'SELECT * FROM ' . self::TABLE_NAME . ' WHERE user_id = :user_id AND code = :code',
            [
                'user_id' => $user->getId(),
                'code' => $code
            ]
        );
        return !empty($result);
    }
}
