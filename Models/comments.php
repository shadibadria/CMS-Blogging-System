<?php

class Comment
{

    protected $id;
    protected $post_id;
    protected $comment_date;
    protected $comment_author;
    protected $comment_email;
    protected $comment_content;
    protected $comment_status;


    //id
    public function geteid()
    {
        return $this->id;
    }

    //post_id
    public function getpost_id()
    {
        return $this->post_id;
    }

    public function setpost_id($post_id)
    {
        $this->post_id = $post_id;
    }

    //comment_date
    public function getcomment_date()
    {
        return $this->comment_date;
    }

    public function setcomment_date($comment_date)
    {
        $this->comment_date = $comment_date;
    }

    //comment_author
    public function getcomment_author()
    {
        return $this->comment_author;
    }

    public function setcomment_author($comment_author)
    {
        $this->comment_author = $comment_author;
    }
    //comment_email
    public function getcomment_email()
    {
        return $this->comment_email;
    }

    public function setcomment_email($comment_email)
    {
        $this->comment_email = $comment_email;
    }
    //comment_content
    public function getcomment_content()
    {
        return $this->comment_content;
    }

    public function setcomment_content($comment_content)
    {
        $this->comment_content = $comment_content;
    }
    //comment_status
    public function getcomment_status()
    {
        return $this->comment_status;
    }

    public function setcomment_status($comment_status)
    {
        $this->comment_status = $comment_status;
    }
}
