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

    public function save()
    {
        $name = Input::get("student_name");
        $father_name = Input::get("father_name");
        $mother_name = Input::get("mother_name");
        $gender = Input::get("gender");
        $nationality = Input::get("nationality");
        $religion = Input::get("religion");
        $address = Input::get("address");
        $contact_number = Input::get("contact_number");
        $transport = Input::get("transport");
        $clazz = Input::get("clazz");
        $section = Input::get("section");
        $shift = Input::get("shift");
        $rsidn = Input::get("rsidn");
        $rsidclass = Input::get("rsidclass");
        $rsidsection = Input::get("rsidsection");
        $transportfee = Input::get("transportfee");


}
}