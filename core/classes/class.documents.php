<?php

class Documents extends Connection
{
    private $table = 'tbl_documents';
    public $pk = 'doc_id';
    public $name = 'doc_name';

    public function add()
    {
        if (isset($_FILES['file']['tmp_name'])) {
            $doc_file = $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], '../assets/file/' . $doc_file);
        } else {
            $doc_file = "";
        }

        
        $form = array(
            $this->name     => $this->clean($this->inputs[$this->name]),
            'doc_type_id'   => $this->inputs['doc_type_id'],
            'doc_file'      => $doc_file,
            'doc_converted_text'     => $this->inputs['doc_converted_text'],
            'user_id'     => $_SESSION['cdms_user_id'],
            'date_added'  => $this->getCurrentDate(),
        );

        $this->insert_logs('Added Document (Document:'. $this->clean($this->inputs[$this->name]).')','');

        return $this->insertIfNotExist($this->table, $form, "$this->name = '".$this->inputs[$this->name]."'");
    }

    public function edit()
    {
        $primary_id = $this->inputs[$this->pk];
        $is_exist = $this->select($this->table, $this->pk, "$this->name = '".$this->inputs[$this->name]."' AND $this->pk != '$primary_id'");
        if ($is_exist->num_rows > 0) {
            return 2;
        } else {
            $form = array(
                $this->name     => $this->clean($this->inputs[$this->name]),
                'doc_type_id'   => $this->inputs['doc_type_id'],
                'doc_converted_text'     => $this->inputs['doc_converted_text'],
            );

            $this->insert_logs('Updated Document (Document:'. $this->clean($this->inputs[$this->name]).')','');

            return $this->updateIfNotExist($this->table, $form, "$this->pk = '$primary_id'");
        }
    }

    public function addRecipients()
    {
        $primary_id = $_REQUEST['doc_id'];
        $id =  $_REQUEST['user_id'];

        $Users = new Users();
        
        $this->delete('tbl_recipients', "doc_id = '$primary_id'");
    
        foreach ($id as $user_id)
        {
            $form = array(
                'user_id'       => $user_id,
                'doc_id'        => $primary_id,
                'date_added'    => $this->getCurrentDate()
            );

            
           //return $this->sendSms($Users->number($user_id), 'sample text');
    
            $this->insert('tbl_recipients', $form);
        }

        return $this->insert_logs('Updated Recipients (Document:'. $this->docName($primary_id).')','');
    }

    public function show()
    { 
        $param = isset($this->inputs['param']) ? $this->inputs['param'] : null;
        $rows = array();
        $result = $this->select($this->table, '*', $param);
        $Users = new Users();
        $DocumentType = new DocumentType();
        while ($row = $result->fetch_assoc()) {
            $row['doc_type'] = $DocumentType->name($row['doc_type_id']);
            $rows[] = $row;
        }
        return $rows;
    }

    public function docByTypeShared()
    { 
        $doc_type_id = $_REQUEST['doc_type_id'];
        
        if($doc_type_id == "-1"){
            $param = "";
        }else if($doc_type_id == "-2"){
            $param = "AND r.status != 1";
        }else{
            $param = "AND d.doc_type_id='$doc_type_id'";
        }


        $rows = array();
        $result = $this->select('tbl_documents as d, tbl_recipients as r', 'd.doc_id,d.doc_name,d.doc_type_id, d.user_id as owner_id, r.user_id, r.status', 'r.user_id='.$_SESSION['cdms_user_id'].' AND d.doc_id=r.doc_id '.$param.'');
        $Users = new Users();
        $DocumentType = new DocumentType();
        while ($row = $result->fetch_assoc()) {
            $row['doc_type'] = $DocumentType->name($row['doc_type_id']);
            $row['user'] = $Users->fullname($row['owner_id']);
            $row['user'] = $Users->fullname($row['owner_id']);
            $rows[] = $row;
        }
        return $rows;
    }

    public function docByTypeRecents()
    { 
        $doc_type_id = $_REQUEST['doc_type_id'];
        
        if($doc_type_id == "-1"){
            $param = "";
        }else{
            $param = "AND d.doc_type_id='$doc_type_id'";
        }

        $date_now = $this->getCurrentDate();

        $rows = array();
        $result = $this->select('tbl_documents as d, tbl_recipients as r', "d.doc_id,d.doc_name,d.doc_type_id, d.user_id as owner_id, r.user_id, r.status", "(r.user_id='$_SESSION[cdms_user_id]' OR d.user_id='$_SESSION[cdms_user_id]') AND d.doc_id=r.doc_id $param AND WEEKOFYEAR(d.date_last_modified) = WEEKOFYEAR('$date_now') GROUP BY d.doc_id");
        $Users = new Users();
        $DocumentType = new DocumentType();
        while ($row = $result->fetch_assoc()) {
            $row['doc_type'] = $DocumentType->name($row['doc_type_id']);
            $row['user'] = $Users->fullname($row['owner_id']);
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

    public function selectedRecipient()
    {
        $primary_id = $_REQUEST['id'];
        $rows = array();
        $result = $this->select('tbl_recipients','user_id', "$this->pk = '$primary_id'");
        $count = 0;
        while($row = $result->fetch_assoc()){
            $rows[] = [$row['user_id']];
        }

        return $rows;
    }

    public function remove()
    {
        $ids = implode(",", $this->inputs['ids']);

        $this->insert_logs('Deleted Subject');

        return $this->delete($this->table, "$this->pk IN($ids)");
    }

    public function docName($primary_id)
    {
        $result = $this->select($this->table, $this->name, "$this->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $row[$this->name];
    }

    public function name($primary_id)
    {
        $result = $this->select($this->table, $this->name, "$this->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $row[$this->name];
    }
}
