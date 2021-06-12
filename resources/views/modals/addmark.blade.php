<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Update Marks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="#" method="post" id="MarkForm">
        @csrf
    <div class="modal-body">
        <div class="container-fluid">
            
                <div class="row">
                    <div class="col-md-4"><label for=""> Select Student:</label></div>
    
                    <div class="col-md-8">
                        <select class="form-control" onchange="get_mark()" name="student_id" id="student_id" required>
                            <option value="">-- Choose --</option>
                            @foreach ($students as $student)
                                <option value="{{$student->id}}">{{$student->name}}</option>
                            @endforeach
                        </select>
                    </div>
                     
                    <div class="col-md-4"><label for=""> Term:</label></div>
    
                    <div class="col-md-8">
                        <select class="form-control" onchange="get_mark()" name="term" id="term" required>
                            <option value="">-- Choose --</option>
                            <option value="one">One</option>
                            <option value="two">Two</option>
                        </select>
                    </div>
                    <div class="col-md-12" class="mark-heading">
                        <h5>Marks Obtained</h5>

                    </div>
                     
                     @foreach ($subjects as $subject)
                        <div class="col-md-4"><label for="" required> {{$subject->name}}:</label></div>
        
                        <div class="col-md-8">
                            <input type="hidden" name="subjects[]" value="{{$subject->id}}">
                            <input type="number" name="subject_values[]" id="subject_{{$subject->id}}" value="" class="form-control subject-value" required>
                        </div> 
                     @endforeach
                    
                   
                     
                    
                
                </div>
            
           
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="updateMark()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
    </form>
    </div>
</div>
