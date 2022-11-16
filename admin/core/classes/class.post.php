<?php

class Post extends Connection
{
    private $table = 'tbl_posts';
    private $pk = 'post_id';
    private $name = 'post_title';

    public function add()
    {
        $user_id = $_SESSION['user']['id'];
        $post_title = $this->clean($this->inputs['post_title']);
        $is_exist = $this->select($this->table, $this->pk, "post_title = '$post_title'");
        if ($is_exist->num_rows > 0) {
            return 2;
        } else {
            $form = array(
                'post_content'      => $this->inputs['post_content'],
                'post_title'        => $this->inputs['post_title'],
                'user_id'           => $user_id
            );
            return $this->insert($this->table, $form);
        }
    }

    public function edit()
    {
        $primary_id = $this->clean($this->inputs['post_id']);
        $post_title = $this->clean($this->inputs['post_title']);
        $is_exist = $this->select($this->table, $this->pk, "post_title = '$post_title' AND  $this->pk != '$primary_id'");
        if ($is_exist->num_rows > 0) {
            return 2;
        } else {
            $form = array(
                'post_content'      => $this->inputs['post_content'],
                'post_title'        => $this->inputs['post_title']
            );
            return $this->update($this->table, $form, "$this->pk = '$primary_id'");
        }
    }


    public function show()
    {
        $rows = array();
        $result = $this->select($this->table);
        while ($row = $result->fetch_assoc()) {
            $row['category'] = $row['user_category'] == "A" ? "Admin" :  "Staff";
            $rows[] = $row;
        }
        return $rows;
    }

    public function getOwnPost(){
        $user_id = $_SESSION['user']['id'];
        $rows = array();
        $result = $this->select($this->table, "*", "user_id='$user_id'");
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function view()
    {
        $primary_id = $this->inputs['id'];
        $result = $this->select($this->table, "*", "$this->pk = '$primary_id'");
        return $result->fetch_assoc();
    }

    public static function name($primary_id)
    {
        $self = new self;
        $result = $self->select($self->table, $self->name, "$self->pk  = '$primary_id'");
        $row = $result->fetch_assoc();
        return $row[$self->name];
    }
}
