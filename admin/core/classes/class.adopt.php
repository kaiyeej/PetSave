<?php

class Adopt extends Connection
{
    private $table = 'tbl_adoption';
    public $pk = 'adoption_id';
    public $name = 'fullname';


    public function add()
    {
        $form = array(
            $this->name         => $this->clean($this->inputs[$this->name]),
            'application_date'  => $this->inputs['application_date'],
            'animal_id'          => $this->inputs['animal_id'],
            'age'               => $this->inputs['age'],
            'social_media_account'   => $this->inputs['social_media_account'],
            'address'           => $this->inputs['address'],
            'contact_num'       => $this->inputs['contact_num'],
            'email_adderess'    => $this->inputs['email_adderess'],
            'occupation'        => $this->inputs['occupation'],
            'civil_status'      => $this->inputs['civil_status'],
            'alternate_contact' => $this->inputs['alternate_contact'],
            'relationship'      => $this->inputs['relationship'],
            'guardian_contact_num'  => $this->inputs['guardian_contact_num'],
            'q1'   => $this->inputs['q1'],
            'q2'   => $this->inputs['q2'],
            'q3'   => $this->inputs['q3'],
            'q4'   => $this->inputs['q4'],
            'q5'   => $this->inputs['q5'],
            'q6'   => $this->inputs['q6'],
            'q7'   => $this->inputs['q7'],
            'q8'   => $this->inputs['q8'],
            'q9'   => $this->inputs['q9'],
            'q10'  => $this->inputs['q10'],
            'q11'  => $this->inputs['q11'],
            'q12'  => $this->inputs['q12'],
            'q13'  => $this->inputs['q13'],
            'q14'  => $this->inputs['q14'],
            'q15'  => $this->inputs['q15'],
            'q16'  => $this->inputs['q16'],
            'q17'  => $this->inputs['q17'],
            'q18'  => $this->inputs['q18'],
            'q19'  => $this->inputs['q19'],
            'q20' => $this->inputs['q20'],
            'q21' => $this->inputs['q21'],
        );

        return $this->insertIfNotExist($this->table, $form, "$this->name = '".$this->inputs[$this->name]."' AND status!='A'");
    }

    public function edit()
    {
        $primary_id = $this->inputs[$this->pk];
        $name = $this->clean($this->inputs[$this->name]);
        $is_exist = $this->select($this->table, $this->pk, "$this->pk != '$primary_id' AND $this->name = '".$this->inputs[$this->name]."' AND status!='A'");
        if ($is_exist->num_rows > 0) {
            return 2;
        } else {
            $form = array(
            $this->name         => $this->clean($this->inputs[$this->name]),
            'application_date'  => $this->inputs['application_date'],
            'animal_id'          => $this->inputs['animal_id'],
            'age'               => $this->inputs['age'],
            'social_media_account'   => $this->inputs['social_media_account'],
            'address'           => $this->inputs['address'],
            'contact_num'       => $this->inputs['contact_num'],
            'email_adderess'    => $this->inputs['email_adderess'],
            'occupation'        => $this->inputs['occupation'],
            'civil_status'      => $this->inputs['civil_status'],
            'alternate_contact' => $this->inputs['alternate_contact'],
            'relationship'      => $this->inputs['relationship'],
            'guardian_contact_num'  => $this->inputs['guardian_contact_num'],
            'q1'   => $this->inputs['q1'],
            'q2'   => $this->inputs['q2'],
            'q3'   => $this->inputs['q3'],
            'q4'   => $this->inputs['q4'],
            'q5'   => $this->inputs['q5'],
            'q6'   => $this->inputs['q6'],
            'q7'   => $this->inputs['q7'],
            'q8'   => $this->inputs['q8'],
            'q9'   => $this->inputs['q9'],
            'q10'  => $this->inputs['q10'],
            'q11'  => $this->inputs['q11'],
            'q12'  => $this->inputs['q12'],
            'q13'  => $this->inputs['q13'],
            'q14'  => $this->inputs['q14'],
            'q15'  => $this->inputs['q15'],
            'q16'  => $this->inputs['q16'],
            'q17'  => $this->inputs['q17'],
            'q18'  => $this->inputs['q18'],
            'q19'  => $this->inputs['q19'],
            'q20' => $this->inputs['q20'],
            'q21' => $this->inputs['q21'],
            );

            return $this->updateIfNotExist($this->table, $form, "$this->pk != '$primary_id' AND $this->name = '".$this->inputs[$this->name]."' AND status!='A'");
        }
    }

    public function show()
    {
        $param = isset($this->inputs['param']) ? $this->inputs['param'] : null;
        $rows = array();
        $Animals = new Animals();
        $result = $this->select($this->table, '*', $param);
        while ($row = $result->fetch_assoc()) {
            $row['animal'] = ($row['animal_id'] <= 0 ? "---" : $Animals->name($row['animal_id']));
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

    public function remove()
    {
        $ids = implode(",", $this->inputs['ids']);

        return $this->delete($this->table, "$this->pk IN($ids)");
    }

    public function cancel()
    {
        $ids = implode(",", $this->inputs['ids']);
        $form = array(
            "status" => "C"
        );

        return $this->update($this->table, $form, "$this->pk IN($ids)");
    }

    public function approve()
    {
        $primary_id = $this->inputs['id'];
        $form = array(
            "status" => "A"
        );

        return $this->update($this->table, $form, "$this->pk = '$primary_id'");
    }

    public function name($primary_id)
    {
        $result = $this->select($this->table, 'course_name', "$this->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $row['course_name'];
    }
}
