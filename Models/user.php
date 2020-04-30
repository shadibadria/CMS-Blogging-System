<?php

Class User 
{
   
    protected $id;
    protected $password;
    protected $username;
    protected $firstname;
    protected $lastname;
    protected $email;
    protected $image;
    protected $role;
    protected $randsalt;

    //id
    public function getid()
    {
        return $this->id;
    }

  public function setid($id)
  {
      return $this->id=$id;
  }
 
      //password
      public function getpassword()
      {
          return $this->password;
      }
  
      public function setpassword($password)
      {
          $this->password=$password;
      }

        //username
        public function getusername()
        {
            return $this->username;
        }
    
        public function setusername($username)
        {
            $this->username=$username;
        }

         //firstname
         public function getfirstname()
         {
             return $this->firstname;
         }
     
         public function setfirstname($firstname)
         {
             $this->firstname=$firstname;
         }
       
         //lastname
         public function getlastname()
         {
             return $this->lastname;
         }
     
         public function setlastname($lastname)
         {
             $this->lastname=$lastname;
         }
          //email
        public function getemail()
        {
            return $this->email;
        }
    
        public function setemail($email)
        {
            $this->email=$email;
        }
         //image
         public function getimage()
         {
             return $this->image;
         }
     
         public function setimage($image)
         {
             $this->image=$image;
         }
          //role
        public function getrole()
        {
            return $this->role;
        }
    
        public function setrole($role)
        {
            $this->role=$role;
        }
         //randsalt
         public function getrandsalt()
         {
             return $this->randsalt;
         }
     
         public function setrandsalt($randsalt)
         {
             $this->randsalt=$randsalt;
         }

}
?>
