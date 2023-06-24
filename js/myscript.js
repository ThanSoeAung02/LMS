$(document).ready(function(){

    $('.category_delete').on('click',function(event){
        event.preventDefault();
        let status = confirm('Are you sure want to delete?');
        

        if (status)
        {
            let id = $(this).parent().attr('id');
            $.ajax({
                method: 'post',
                url: 'deleteCategory.php',
                data : {id:id},
                success: function(response)
                {
                    alert(response);
                    location.href = 'category.php';  
                },
                error:function(error){
                    alert(error);
                }
            })
        }
    })

    $('.batch_delete').on('click',function(event){
        event.preventDefault();
        let status = confirm('Are you sure want to delete?');
        

        if (status)
        {
            let id = $(this).parent().attr('id');
            $.ajax({
                method: 'post',
                url: 'deleteBatch.php',
                data : {id:id},
                success: function(response)
                {
                    alert(response);
                    location.href = 'batch.php';  
                },
                error:function(error){
                    alert(error);
                }
            })
        }
    })

    $('.trainee_delete').on('click',function(event){
        event.preventDefault();
        let status = confirm('Are you sure want to delete?');
        

        if (status)
        {
            let id = $(this).parent().attr('id');
            $.ajax({
                method: 'post',
                url: 'deleteTrainee.php',
                data : {id:id},
                success: function(response)
                {
                    alert(response);
                    location.href = 'trainee.php';  
                },
                error:function(error){
                    alert(error);
                }
            })
        }
    })

    $('.course_delete').on('click',function(event){
        event.preventDefault();
        let status = confirm('Are you sure want to delete?');
        

        if (status)
        {
            let id = $(this).parent().attr('id');
            $.ajax({
                method: 'post',
                url: 'deleteCourse.php',
                data : {id:id},
                success: function(response)
                {
                    alert(response);
                    location.href = 'course.php'; 
                },
                error:function(error){
                    alert(error);
                }
            })
        }
    })

    $('.instructor_delete').on('click',function(event){
        event.preventDefault();
        let status = confirm('Are you sure want to delete?');
        

        if (status)
        {
            let id = $(this).parent().attr('id');
            $.ajax({
                method: 'post',
                url: 'deleteInstructor.php',
                data : {id:id},
                success: function(response)
                {
                    alert(response);
                    location.href = 'instructor.php'; 
                },
                error:function(error){
                    alert(error);
                }
            })
        }
    })

    $('#categoryTable').DataTable();
    $('#traineeTable').DataTable();
    $('#instructorTable').DataTable();
    $('#batchTable').DataTable();
    $('#courseTable').DataTable();

})