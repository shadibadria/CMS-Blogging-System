<?php

Class Posts 
{
   
    protected $id;
    protected $title;
    protected $post_category_id;
    protected $post_author;
    protected $post_date;
    protected $post_image;
    protected $post_content;
    protected $posts_tags;
    protected $post_comment_count;
    protected $post_status;

    //id
    public function geteid()
    {
        return $this->id;
    }

 
      //title
      public function gettitle()
      {
          return $this->title;
      }
  
      public function settitle($title)
      {
          $this->title=$title;
      }

        //post_category_id
        public function getpost_category_id()
        {
            return $this->post_category_id;
        }
    
        public function setpost_category_id($post_category_id)
        {
            $this->post_category_id=$post_category_id;
        }

         //post_author
         public function getpost_author()
         {
             return $this->post_author;
         }
     
         public function setpost_author($post_author)
         {
             $this->post_author=$post_author;
         }
          //post_date
        public function getpost_date()
        {
            return $this->post_date;
        }
    
        public function setpost_date($post_date)
        {
            $this->post_date=$post_date;
        }
         //post_image
         public function getpost_image()
         {
             return $this->post_image;
         }
     
         public function setpost_image($post_image)
         {
             $this->post_image=$post_image;
         }
          //post_content
        public function getpost_content()
        {
            return $this->post_content;
        }
    
        public function setpost_content($post_content)
        {
            $this->post_content=$post_content;
        }
         //posts_tags
         public function getposts_tags()
         {
             return $this->posts_tags;
         }
     
         public function setposts_tags($posts_tags)
         {
             $this->posts_tags=$posts_tags;
         }
          //post_comment_count
        public function getpost_comment_count()
        {
            return $this->post_comment_count;
        }
    
        public function setpost_comment_count($post_comment_count)
        {
            $this->post_comment_count=$post_comment_count;
        }
         //post_status
         public function getpost_status()
         {
             return $this->post_status;
         }
     
         public function setpost_status($post_status)
         {
             $this->post_status=$post_status;
         }

}
?>
