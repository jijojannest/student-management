@extends('layouts.home')

<div class="container">
    <h1>Student Management</h1>
    <div class="top-sec">
        <div class="button-container">
            <button class="btn btn-primary btn-sm" id="ViewMarkBtn" onclick="getStudentMarks()">View Marksheet</button>
            <button class="btn btn-primary btn-sm" id="AddBtn">Add Student</button>
            <button class="btn btn-primary btn-sm" id="AddMarkBtn" onclick="addMarksModal()">Add Marks</button>

            

        </div> 
    </div>
    <div class="table-sec" id="tableSection">
        @include('students')
    </div>
    
</div>
<div class="modal" tabindex="-1" role="dialog" id="addStudentModal">
    @include('modals.addstudent')
</div>
<div class="modal" tabindex="-1" role="dialog" id="editStudentModal">
</div>
<div class="modal" tabindex="-1" role="dialog" id="addMarkModal">
</div>
<div class="modal" tabindex="-1" role="dialog" id="markListModal">
</div>
