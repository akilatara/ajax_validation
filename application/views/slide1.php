<!DOCTYPE html>
<html>
<head>
  <title>solid img</title>
  <style type="text/css">
/*frame*/
     body, html{margin:0; padding:0;}  
  
        body{  
            background-color:#eee;  
        }  
        h1, h2, h3, h4, p, a, li, ul{  
            font-family: arial, sans-serif;  
            color: black;  
            text-decoration: none;  
        }  
        #frame{  
            margin: 0 auto 0 auto;  
            width: 25px;  
            background-color: orange;  
            height: 100px;  
            padding: 0;  
        }  
  
        #frame a:hover{  
            color: red;  
  
        }  
        #frame ul{  
            list-style: none;  
            float: left;  
            margin: 0 100px;  
        }  
        #frame ul li a{
            text-decoration: none;
    color:#fff;
    padding: 5px 20px;
    border:1px solid #fff;
    transition: 0.6s ease;

        }
  
        #frame ul li{  
            display: inline; 
          }   
  
        #content{  
            width: 50px;  
            min-height: 30%;  
            margin: 0 auto;  
            padding: 25px;  
        }  
  
        #frame{  
            width: 1300px;  
            height: 30px;  
            margin: 0 auto;  
            padding: 35px;  
        }
      /*slide   */ 
      #container{
  width: 90%;
  height: 300px;
   margin: 40px;
  position: absolute;
}
#container> img{
  width: 100%;
  height: 100%;
  /*border: 1px solid black;*/
  position: absolute;
}
#container>.btn{
  position: absolute;
  width: 50px;
  height: 50px;
  border: none;
    border-radius: 25px;
    top: 100px;
    background-color: black;
    color: white;
    font-size: 20px;
}
#container>#btn2{
  position: relative;
  float: right;

}
//btn
.container {
  position: relative;
  width: 50%;
}

/* Style the button and place it in the middle of the container/image */
.container .btn {
  position: absolute;
  top: 60%;
  left: 30%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: #555;
  color: white;
  font-size: 16px;
  padding: 12px 24px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
}


 </style>
  
  <title>solid img</title>
  <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
<body>
<div id="container">  
    <div id="frame">  
        <ul>  
            <li><a href="<?php echo base_url('home/frame'); ?>">Home</a></li>  
            <li><a href="#">Post Job</a></li>  
            <li><a href="#">Find Job</a></li>  
            <li><a href="#">Hire a Pilot</a></li>  
        </ul>  
    </div>   

<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-10">
  <div id="container">
         
             <img class="slides" src="<?php echo base_url(); ?>assets/photo/d1.jpg">
             <button class="btn btn-default">Get Strated</button>
          
          <img class="slides" src="<?php echo base_url(); ?>assets/photo/d2.jpg">
          <img class="slides" src="<?php echo base_url(); ?>assets/photo/d3.jpg">
          <img class="slides" src="<?php echo base_url(); ?>assets/photo/d4.jpeg">
          <img class="slides" src="<?php echo base_url(); ?>assets/photo/d5.jpg">
    
          
          <button class="btn" onclick="plusIndex(-1)" id="btn1">&#10094;</button>
          <button class="btn"onclick="plusIndex(1)" id="btn2">&#10095;</button>
  </div>
  </div>
  <div class="col-sm-1"></div>
</div>
</body>
          <script>
            var index = 1;
            function plusIndex(n){
              index = index +1;
              showImage(index);
            }
            showImage(1);

            function showImage(n) {
              var i;
              var x= document.getElementsByClassName('slides');
              if(n > x.length){index=1};
              if(n<1){index=x.length};
              for(i=0;i<x.length;i++)
              {
                x[i].style.display="none";
              }


              x[index-1].style.display="block";
                    }
                    autoSlide();
                     function autoSlide() {
                    var i;
                    var x= document.getElementsByClassName('slides');
                    for(i=0;i<x.length;i++)
                    {
                         x[i].style.display="none";
                    }

                     if(index > x.length){index=1}
                    x[index-1].style.display="block";
                    index++;
                    setTimeout(autoSlide,2000);
                   }
          </script>
<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
</html>