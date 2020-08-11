$(document).ready(() => {
  // console.log("hello world");
  // Registor 
  $("#regis_btn").click((event) => {
    event.preventDefault();
    $.ajax({
      url: "action_register.php",
      method: "POST",
      data: $("#regis_form").serialize(),
      success: (data) => {
        $("#regis_alert").html(data);
      }
    });
  });

  // Login 
  $("#login_btn").click((event) => {
    event.preventDefault();
    $.ajax({
      url: "action_login.php",
      method: "POST",
      data: $("#login_form").serialize(),
      success: (data) => {
        $("#login_alert").html(data);
      }
    });
  });

  // Logout
  $("#logout_btn").click((event) => {
    event.preventDefault();
    $.ajax({
      url: "action_logout.php",
      success: (data) => {
        $("#index_alert").html(data);
      }
    });
  });
  
  // Time Record
  $("#time_record_btn").click((event) => {
    event.preventDefault();
    $.ajax({
      url: "action_time_record.php",
      method: "POST",
      data: $("#time_record_form").serialize(),
      success: (data) => {
        $("#time_record_alert").html(data);
      }
    });
  });

  // Edit Time Record
  $("#time_edit_btn").click((event) => {
    event.preventDefault();
    $.ajax({
      url: "action_edit_time.php",
      method: "POST",
      data: $("#time_edit_form").serialize(),
      success: (data) => {
        $("#time_edit_alert").html(data);
      }
    });
  });

  // Job Record
  $("#job_record_btn").click((event) => {
    event.preventDefault();
    $.ajax({
      url: "action_job_record.php",
      method: "POST",
      data: $("#job_record_form").serialize(),
      success: (data) => {
        $("#job_record_alert").html(data);
      }
    });
  });

  // Edit Job Record
  $("#job_edit_btn").click((event) => {
    event.preventDefault();
    $.ajax({
      url: "action_edit_job.php",
      method: "POST",
      data: $("#job_edit_form").serialize(),
      success: (data) => {
        $("#job_edit_alert").html(data);
      }
    });
  });

  // ExJob Record
  $("#ex_job_btn").click((event) => {
    event.preventDefault();
    $.ajax({
      url: "action_ex_job.php",
      method: "POST",
      data: $("#ex_job_form").serialize(),
      success: (data) => {
        $("#ex_job_alert").html(data);
      }
    });
  });

  // Edit ExJob Record
  $("#ext_edit_btn").click((event) => {
    event.preventDefault();
    $.ajax({
      url: "action_edit_ex.php",
      method: "POST",
      data: $("#ext_edit_form").serialize(),
      success: (data) => {
        $("#ext_edit_alert").html(data);
      }
    });
  });

  // Lesson Learn
  $("#less_record_btn").click((event) => {
    event.preventDefault();
    $.ajax({
      url: "action_lesson.php",
      method: "POST",
      data: $("#less_record_form").serialize(),
      success: (data) => {
        $("#less_record_alert").html(data);
      }
    });
  });

  // Edit Lesson Learn
  $("#les_edit_btn").click((event) => {
    event.preventDefault();
    $.ajax({
      url: "action_edit_less.php",
      method: "POST",
      data: $("#les_edit_form").serialize(),
      success: (data) => {
        $("#les_edit_alert").html(data);
      }
    });
  });

 

  // Change Password
  $("#chx_pass_btn").click((event) => {
    event.preventDefault();
    $.ajax({
      url: "action_chx_pass.php",
      method: "POST",
      data: $("#chx_pass_form").serialize(),
      success: (data) => {
        $("#chx_pass_alert").html(data);
      }
    })
  })

});