function AddClub(type){
      $.ajax({
      type: "POST",
      url: "include/addclub.php",
      data: "type="+type+"&clubname="+$("#clubname").val()+"&fname="+$("#fname").val()+"&lname="+$("#lname").val()+"&mobile="+$("#mobile").val()+"&number="+$("#number").val()+"&email="+$("#email").val(),
      success: function(data)
           {
              if(data=="ok"){
                $("#addclubcontents").html("Kayıt Başarılı Şekilde Yapılmıştır.").css("color","green");
                setTimeout(function () {
                    location.reload()
                }, 1000);
              }
              else{
                  $("#addclubcontents").html("Kayıt Maalesef Yapılamadı").css("color","red");
              setTimeout(function () {
                  location.reload()
              }, 1000);
            }
           }
    });
}

function EditClub(id,id2,type){
    $.ajax({
    type: "POST",
    url: "include/editClubFill.php",
    data: "id="+id+"&presidentId="+id2+"&type="+type,
    success: function(data)
         {
                    $("#editclubcontent").html(data);
         }
  });
}

function UpdateClub(id,id2,type){
    $.ajax({
    type: "POST",
    url: "include/updateclub.php",
    data: "id="+id+"&presidentId="+id2+"&type="+type+"&clubname="+$("#editclubname").val()+"&fname="+$("#editfname").val()+"&lname="+$("#editlname").val()+"&mobile="+$("#editmobile").val()+"&number="+$("#editnumber").val()+"&email="+$("#editemail").val(),
    success: function(data)
         {
           if(data=="ok"){
             $("#editclubcontent").html("Kayıt Başarılı Şekilde Yapılmıştır.").css("color","green");
             setTimeout(function () {
                 location.reload()
             }, 1000);
           }else{
               $("#editclubcontent").html("Kayıt Maalesef Yapılamadı").css("color","red");
               setTimeout(function () {
                   location.reload()
               }, 1000);
           }
         }
  });
}

function AddEvent(){
      $.ajax({
      type: "POST",
      url: "include/addevent.php",
      data: "eventname="+$("#eventname").val()+"&description="+$("#description").val()+"&date="+$("#date").val()+"&hour="+$("#hour").val()+"&location="+$("#location").val()+"&owner="+$("#owner").val(),
      success: function(data)
           {
              if(data=="ok"){
                $("#addeventcontent").html("Kayıt Başarılı Şekilde Yapılmıştır.").css("color","green");
                setTimeout(function () {s
                    location.reload()
                }, 1000);
              }else{
                  $("#addeventcontent").html("Kayıt Maalesef Yapılamadı").css("color","red");
              setTimeout(function () {
                  location.reload()
              }, 1000);
            }
           }
    });
}

function EditEvent(id){
  $.ajax({
  type: "POST",
  url: "include/editEventFill.php",
  data: "eventid="+id,
  success: function(data)
       {
            $("#editeventcontent").html(data);
       }
  });
}

function Details(id){
  $.ajax({
  type: "POST",
  url: "include/details.php",
  data: "eventid="+id,
  success: function(data)
       {
            $("#detailscontent").html(data);
       }
  });
}
/*
$("#fileToUpload").submit(function(success){
      $("#detailscontent").html("Please Wait");
      success.preventDefault();
});
$("#fileToUpload").ajaxForm(function(success){
      $("#detailscontent").html(success);
});*/


/*function UploadImage(){
  $.ajax({
  type: "POST",
  contentType: "application/json",
  url: "include/uploadimage.php",
  //data: $("#fileToUpload").serialize(),
  //data: $('#uploadImg').prop("files")[0],
  data: "fileToUpload="+$("#fileToUpload").val(),
  success: function(data)
       {
            $("#detailscontent").html(data);
       }
  });
}*/


function UploadImage(id){
  $.ajax({
  type: "POST",
  url: "include/uploadimageform.php",
  data: "eventid="+id,
  success: function(data)
       {
            $("#uploadformcontent").html(data);
       }
  });
}


function UpdateEvent(id){
    $.ajax({
    type: "POST",
    url: "include/updateevent.php",
    data: "eventid="+id+"&eventname="+$("#editeventname").val()+"&description="+$("#editdescription").val()+"&date="+$("#editdate").val()+"&hour="+$("#edithour").val()+"&location="+$("#editlocation").val()+"&owner="+$("#editowner").val(),
    success: function(data)
         {
           if(data=="ok"){
             $("#editeventcontent").html("Kayıt Başarılı Şekilde Yapılmıştır.").css("color","green");
             setTimeout(function () {
                 location.reload()
             }, 1000);
           }else if(data=="hata"){
               $("#editeventcontent").html("Kayıt Maalesef Yapılamadı").css("color","red");
               setTimeout(function () {
                   location.reload()
               }, 1000);
           }
         }
  });
}

function MailForm(email){
    $.ajax({
    type: "POST",
    url: "include/mailform.php",
    data: "email="+email,
    success: function(data)
         {
             $("#mailcontents").html(data);
         }
  });
}

function SendMail(){
    $.ajax({
    type: "POST",
    url: "../smtpemail/epostaend.php",
    data:"emailaddr="+$("#emailaddr").val()+"&subject="+$("#subject").val()+"&message="+$("#message").val(),
    success: function(data)
         {
           {
             if(data=="ok"){
               $("#mailcontents").html("Mail Başarılı Şekilde Gönderilmiştir.").css("color","green");
               setTimeout(function () {
                   location.reload()
               }, 1000);
             }else{
                 $("#mailcontents").html(data).css("color","red");
                 setTimeout(function () {
                     location.reload()
                 }, 3000);
             }
           }
         }
  });
}

function Delete(id,type){
    $.ajax({
    type: "POST",
    url: "include/delete.php",
    data: "id="+id+"&type="+type,
    success: function(data)
         {
           location.reload();
         }
  });
}

function Confirm(id){
    $.ajax({
    type: "POST",
    url: "include/confirm.php",
    data: "id="+id,
    success: function(data)
         {
            location.reload();
         }
  });
}

function Unconfirm(id){
    $.ajax({
    type: "POST",
    url: "include/unconfirm.php",
    data: "id="+id,
    success: function(data)
         {
           location.reload();
         }
  });
}
