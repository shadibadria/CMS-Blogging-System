<?php

Class categories 
{
   
    protected $id;
    protected $title;


    //id
    public function geteid()
    {
        return $this->id;
    }

 
      //title
      public function getetitle()
      {
          return $this->title;
      }
  
      public function settitle($title)
      {
          $this->title=$title;
      }


}
?>
