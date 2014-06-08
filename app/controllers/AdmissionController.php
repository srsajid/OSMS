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
}