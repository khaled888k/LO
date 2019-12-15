 <html>
<head>
    <title> الحي المتعلم </title>
<?php include("head.php");?>
    
    <style>
    
    @import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);

body { background:rgb(30,30,40); }
 
.feedback-input {
  color:black;
  font-family: Helvetica, Arial, sans-serif;
  font-weight:500;
  font-size: 18px;
  border-radius: 5px;
  line-height: 22px;
   border:2px solid #CC6666;
  transition: all 0.3s;
  padding: 13px;
  margin-bottom: 15px;
  width:100%;
  box-sizing: border-box;
  outline:0;
}

.feedback-input:focus { border:2px solid #CC4949; }

textarea {
  height: 150px;
  line-height: 150%;
  resize:vertical;
}
 
    </style>
  <body class="rtl">
    <?php include("header.php");?>

                   
                   
    <form style=" max-width:420px; margin:50px auto;">      
  <input name="name" type="text" class="feedback-input" placeholder="الاسم" />   
  <input name="email" type="text" class="feedback-input" placeholder="البريد الاكتروني " />
  <textarea name="text" class="feedback-input" placeholder="تعليقك"></textarea>
  <input type="submit" value="ارسال"/>
</form>
    
    </body>
    </head>

</html>