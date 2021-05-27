<?php 

//index.php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    


    <div class='container'>
    <br />
    <br />
    <br />

    <h2>
      Poll System
    </h2> <br />

    <div class ='row'>
        <div class='col-md-6'>
          <form method='post' id='poll_form'>
               <h3>
                  Who is your favorite author?
               </h3><br />
          
               <div class='radio'>
               <label>
                <h4>
                  <input type='radio' name='poll_option' class='poll_option' value='Miguel'/>
                  Miguel de Cervantes
                </h4>
               </label>
               </div>


               <div class='radio'>
               <label>
                <h4>
                  <input type='radio' name='poll_option' class='poll_option' value='Charles'/>
                  Charles Dickens
                </h4>
               </label>
               </div>

              
               <div class='radio'>
               <label>
                <h4>
                  <input type='radio' name='poll_option' class='poll_option' value='Antoine'/>
                  Antoine de Saint-Exuper
                </h4>
               </label>
               </div>
               <br />
          </form>
               <br />
        </div>

        <div class='col-md-6'>
         <br />
         <br />
         <br />
         <h4>Poll Result</h4>
         <div class='poll_result'></div>
        </div>
    </div>
    <br />
    <br />
    <br />
   </div>
  
  

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>


<script>
   $(document).ready(function()){
       fetch_poll_data()
       function fetch_poll_data(){
           $.ajax({
               url: 'fetch_poll_data.php',
               method: 'POST',
               success: function(data){
                   $('#poll_result').html(data)
               }
           })
       }


       $('#poll_form').on('submit', function(event){
           event.preventDefault()
           var poll_option = ''
           $('.poll_option').each(function(){
             if($(this).prop('checked'))
             {
                 poll_option = $(this).val()
             }
           })
           if(poll_option != '')
           {
             $('#poll_button').attr('disabled','disabled')
             var form_data = $(this).serialize()
             $.ajax({
                 url: 'poll.php',
                 method: 'POST',
                 data: form_data,
                 success: function(data){
                     $('#poll_form')[0].reset()
                     $('#poll_button').attr('disable', false)
                     fetch_poll_data()
                     alert('Poll Submitted Successfully')
                 }
             })
           }
           else{

           }
       })
   }
</script>