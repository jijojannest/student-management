<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Edit student details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="#" method="post" id="StudentEditForm">
        @csrf
    <div class="modal-body">
        <div class="container-fluid">
            
                <div class="row">
                
                    <input type="hidden" name="id" value="{{$student->id}}">
                    <div class="col-md-4"><label for=""> Name:</label></div>
    
                    <div class="col-md-8">
                        <input type="text" required name="name" value="{{$student->name}}" class="form-control">
                    </div>
                     
                    <div class="col-md-4"><label for=""> Gender:</label></div>
    
                    <div class="col-md-8">
                        <select class="form-control" name="gender" id="gender" required>
                            <option value="Male" @if($student->gender == "Male") selected @endif>Male</option>
                            <option value="Female" @if($student->gender == "Female") selected @endif>Female</option>
                            <option value="Other" @if($student->gender == "Other") selected @endif>Other</option>
                        </select>
                    </div>
                     
                    <div class="col-md-4"><label for="" required> Age:</label></div>
    
                    <div class="col-md-8">
                        <input type="number" name="age" value="{{$student->age}}" class="form-control" required>
                    </div> 
                    <div class="col-md-4"><label for=""> Reporting Teacher:</label></div>
    
                    <div class="col-md-8">
                        <select class="form-control" name="staff_id" id="staff_id">
                            @foreach ($teachers as $teacher)
                                <option value="{{$teacher->id}}" @if($student->teacher->id == $teacher->id) selected @endif>{{$teacher->name}}</option>
                            @endforeach
                        </select>
                    </div>
                     
                    
                
                </div>
            
           
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="updateStudent()">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
    </form>
    </div>
</div>
