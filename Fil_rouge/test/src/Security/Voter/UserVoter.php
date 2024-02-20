<?php

namespace App\Security\Voter;

use App\Entity\User;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserVoter extends Voter
{
    const EDIT = 'USER_EDIT';
    const DELETE = 'USER_DELETE';

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports(string $attribute, $user): bool 
    {
        if(!in_array($attribute, [self::EDIT, self::DELETE])) {
        return false;
        }
        if(!$user instanceof User) {
            return false;
        }
        return true;
    }

    protected function voteOnAttribute($attribute, $user, TokenInterface $token): bool
    {
        // On récupère l'utilisateur à partir du token
        $user = $token->getUser();

        if (!$user instanceof UserInterface) {
            return false;
        }

        // on vérifie si l'utilisateur est admin
        if($this->security->isGranted('ROLE_ADMIN')) {
            return true;
        }

        // on vérifie les permissions
        switch ($attribute) {
            case self::EDIT:
                # on vérifie si l'utilisateur peut éditer
                return $this->canEdit();
                break;
            case self::DELETE:
                # on vérifie si l'utilisateur peut supprimer
                return $this->canDelete();
                break;
            }
    }

    private function canEdit() {
        return $this->security->isGranted('ROLE_ADMIN');
    }

    private function canDelete() {
        return $this->security->isGranted('ROLE_ADMIN');
    }

}