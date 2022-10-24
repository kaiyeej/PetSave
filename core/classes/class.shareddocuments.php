<?php

class SharedDocuments extends Connection
{
    private $table = 'tbl_documents';
    public $pk = 'doc_id';
    public $name = 'doc_name';

    public function accept()
    {
        $primary_id = $_REQUEST['doc_id'];
        $Doc = new Documents();
        $form = array(
            'status' => 1
        );

        $this->insert_logs('Accept Invitation (Document:'. $Doc->docName($primary_id).')');

        return $this->update('tbl_recipients', $form, "$this->pk = '$primary_id' AND user_id = '$_SESSION[cdms_user_id]'");
    }

    public function remove()
    {
        $primary_id = $_REQUEST['doc_id'];
        $this->insert_logs('Removed Document');

        return $this->delete('tbl_recipients', "$this->pk = '$primary_id' AND user_id = '$_SESSION[cdms_user_id]'");
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

}
