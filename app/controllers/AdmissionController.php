<?php
Class AdmissionController extends BaseController{
    public function loadTable() {
        $max = Input::get("max") ? intval(Input::get("max")): 10;
        $offset = Input::get("offset") ? intval(Input::get("offset")) : 0;
        $searchText = Input::get("searchText") ? Input::get("searchText") : "";
        $students = AdmissionService::getStudents();
        $total = AdmissionService::getCounts();
        return View::make("admission.tableView", array(
            'students' => $students,
            'total' => $total,
            'max' => $max,
            'offset' => $offset,
            'searchText' => $searchText
        ));
    }
    public function create()
    {
        return View::make("admission.create");
    }

    public function edit()
    {
        $id = Input::get("id");
        $student = null;
        if($id){
            $student = Student::find($id);
        }
        else{
            $student = new Student();
        }
        return View::make("admission.edit", array(
            'student' => $student,
        ));
    }

    public function save()
    {
        $student_img = Input::file("student_image");
        $father_img = Input::file("father_img");
        $mother_img = Input::file("mother_img");
        $guardian_img = Input::file("guardians_img");
        $id  = Input::get("id");
        $student_id = Input::get("student_ID");
        $name = Input::get("student_name");
        $father_name = Input::get("father_name");
        $mother_name = Input::get("mother_name");
        $guardian_name = Input::get("guardian_name");
        $birth = DateTime::createFromFormat('d-m-Y',Input::get("date_birth"));
        $gender = Input::get("gender");
        $nationality = Input::get("nationality");
        $religion = Input::get("religion");
        $address = Input::get("address");
        $contact_number = Input::get("contact_number");
        $email_address = Input::get("email");
        $transport = Input::get("transport");
        $clazz = Input::get("clazz");
        $section = Input::get("section");
        $shift = Input::get("shift");
        $rsidn = Input::get("rsidn");
        $rsidclass = Input::get("rsidclass");
        $rsidsection = Input::get("rsidsection");
        $transportfee = Input::get("transportfee");
        $hasEntry = Student::find($student_id);
        if($hasEntry != null){
            return array('status' => 'error', 'message' => 'Student exists!');
        }
        //$path = './Photos/'. $student_id .'/';
        //$filename = $student_img->getClientOriginalName();
        //$temp_name = 'student';
        //$extension =$student_img->getClientOriginalExtension();
        //$full_name = $temp_name. '.' .$extension;
        //$upload_success = $student_img->move($path, $full_name);

        //$filename = $father_img->getClientOriginalName();
        //$temp_name = 'father';
        //$extension =$father_img->getClientOriginalExtension();
        //$full_name = $temp_name. '.' .$extension;
        //$upload_success = $father_img->move($path, $full_name);

        //$filename = $mother_img->getClientOriginalName();
        //$temp_name = 'mother';
        //$extension =$mother_img->getClientOriginalExtension();
        //$full_name = $temp_name. '.' .$extension;
        //$upload_success = $mother_img->move($path, $full_name);

        //$filename = $guardian_img->getClientOriginalName();
        //$temp_name = 'guardian';
        //$extension =$guardian_img->getClientOriginalExtension();
        //$full_name = $temp_name. '.' .$extension;
        //$upload_success = $guardian_img->move($path, $full_name);
        $student = null;
        if($id){
            $student = Student::find($id);
        }
        else{
            $student = new Student();
        }

        $student->sid = $student_id;
        $student->name = $name;
        $student->father_name = $father_name;
        $student->mother_name = $mother_name;
        $student->guardian_name = $guardian_name;
        $student->date_of_birth = $birth;
        $student->gender = $gender;
        $student->nationality = $nationality;
        $student->religion = $religion;
        $student->address = $address;
        $student->contact_number = $contact_number;
        $student->email = $email_address;
        if($transport == 'No'){
            $student->hasTransport = false;
        }
        else{
            $student->hasTransport = true;
        }
        $student->transport_cost = $transportfee;
        $student->clazz = $clazz;
        $student->shift = $shift;
        $student->section = $section;
        if($rsidn){
            $student->has_rid = true;
        }
        else{
            $student->has_rid = false;
        }
        $student->rid_class = Input::get("rsidclass");
        $student->rid_section = Input::get("rsidsection");
        $student->rid = $rsidn;
        $student->save();
        return array('status' => 'success', 'message' => 'Student has been saved successfully.');
    }
}