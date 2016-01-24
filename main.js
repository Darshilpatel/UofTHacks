
$('#submitButton').on('click',function(event){
event.preventDefault();


     var $form = $("#post-form"),
     url = 'http://localhost/userPost.php',
     data = {};
     
     $form.find('input[name]').each(function(index, value){
          var $input = $(this),
          name = $input.attr('name'),
          value  = $input.val();     
          data[name] = value;
     });
     var text = $form.find("#post-text-area").val();
$.ajax({
     url: url,
     data: {
      username: data.username,
      title: data.title,
      text: text
     },
     type: 'post',
     success:function(data){
    console.log(data);

  },

     
});

     return false;
});