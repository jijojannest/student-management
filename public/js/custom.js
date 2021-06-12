

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        
  $(function(){
    $('#AddBtn').on('click',function () {
        $('#addStudentModal').modal('show')
      });

     
  });

  function saveStudent(){
    if($('#StudentForm').parsley().validate()){
        $.ajax({
            url: '/save-student',
            method:'post',
            dataType:'json',
            data:$('#StudentForm').serialize(),
            success: function(data) {
                if(data.status){

                  getStudents();
                  $('#StudentForm').trigger('reset');
                  $('#addStudentModal').modal('hide');
                }else{
                  alert(data.message)
                }
            }
        });
      }
  }

  function deleteStudent(id){
      $.ajax({
          url: '/delete-student',
          method:'post',
          dataType:'json',
          data:{
            _token:CSRF_TOKEN,
            id
          },
          success: function(data) {
              if(data.status){

                getStudents();
              }else{
                alert(data.message)
              }
          }
      });
     
  }

  function getStudents(){
    $.ajax({
        url: '/',
        method:'get',
        dataType:'json',
        data:{
          _token:CSRF_TOKEN
        },
        success: function(data) {
            if(data.status){
              $('#tableSection').empty().html(data.html);
            }
        }
    });
   
  }

  function getStudent(id){
    $.ajax({
        url: '/edit',
        method:'get',
        dataType:'json',
        data:{
          _token:CSRF_TOKEN,
          id
        },
        success: function(data) {
          console.log(data);
            if(data.status){
            
              $('#editStudentModal').modal('show');
                $('#editStudentModal').html(data.html);
            }
        }
    });
   
  }

  function updateStudent(){
    if($('#StudentEditForm').parsley().validate()){
      $.ajax({
          url: '/save-student',
          method:'post',
          dataType:'json',
          data:$('#StudentEditForm').serialize(),
          success: function(data) {
              if(data.status){

                getStudents();
                $('#StudentEditForm').trigger('reset');
                $('#editStudentModal').modal('hide');
              }else{
                alert(data.message)
              }
          }
      });
    }
  }

  function addMarksModal(){
    $.ajax({
      url: '/add-mark',
      method:'get',
      dataType:'json',
     
      success: function(data) {
        console.log(data);
          if(data.status){
          
            $('#addMarkModal').modal('show');
            $('#addMarkModal').html(data.html);
          }
      }
   });
  }

  function updateMark(){
    if($('#MarkForm').parsley().validate()){
      $.ajax({
          url: '/update-mark',
          method:'post',
          dataType:'json',
          data:$('#MarkForm').serialize(),
          success: function(data) {
              if(data.status){

                $('#MarkForm').trigger('reset');
                $('#addMarkModal').modal('hide');
              }else{
                alert(data.message);
              }
          }
      });
    }
  }

  function get_mark(){
    if($('#student_id').val() != "" && $('#term').val() != ""){
      let student_id = $('#student_id').val();
      let term = $('#term').val();
      $.ajax({
        url: '/get-mark',
        method:'get',
        dataType:'json',
        data:{
          student_id,
          term
        },
        success: function(data) {
            if(data.status){
            console.log(data.marks)
              data.marks.forEach(element => {
                $('#subject_'+element.subject_id).val(element.marks);
              });
            }else{
              $('.subject-value').each(function(){
                $(this).val('');
              })
            }
        }
     });
    }else{
      $('.subject-value').each(function(){
        $(this).val('');
      })
    }
   
  }

  function getStudentMarks(){
    $.ajax({
      url: '/get-allmark',
      method:'get',
      dataType:'json',
     
      success: function(data) {
          if(data.status){
            $('#markListModal').html(data.html);
            $('#markListModal').modal('show');
          }else{
            
          }
      }
   });
  }

 