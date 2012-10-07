<?php
class UserRoles extends CWebUser
{
   public $id;
    
        public function isAdminUser() {
                return $this->getState('isAdminUser');  
        }
        

        public function isManagerUser() {
                return $this->getState('isManagerUser');
        }
}
