<!DOCTYPE html>  
<html>  
<head>  
    <title>Basic Site</title>  
    <style>  
          
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
            margin: 50px auto 0 auto;  
            width: 100px;  
            background-color: lightblue;  
            height: 100px;  
            padding: 20px;  
        }  
  
        #frame a:hover{  
            color: red;  
  
        }  
        #frame ul{  
            list-style: none;  
            float: left;  
            margin: 0 50px;  
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
            width: 150px;  
            min-height: 25%;  
            margin: 0 auto;  
            padding: 20px;  
        }  
  
        #frame{  
            width: 10100px;  
            height: 15px;  
            margin: 0 auto;  
            padding: 20px;  
        }
</style>

 <style>        
#container{
    width:100%;
    height: 300px;
  margin: 40px;
    /*border: 1px solid black;*/
    /*margin:  60px;*/
    position: relative;
}
#container> img{
  width: 90%;
  height: 100%;
  position: relative;
}
#container>.btn{
    position: absolute;
    width: 35px;
    height: 35px;
    border: none;
    border-radius: 25px;
    top: 200px;
    background-color: black;
    color: white;
    font-size: 20px;
}
#container>#btn2{
  position: relative;
  float: right;
}


    </style> 
</head>  
<body>  
<div id="container">  
    <div id="frame">  
        <ul>  
            <li><a href="<?php echo base_url('home/slide1');?>">Home</a></li>  
            <li><a href="">Post Job</a></li>  
            <li><a href="#">Find Job</a></li>  
            <li><a href="#">Hire a Pilot</a></li>  
        </ul>  
    </div> 
    <div id="container">
    <img class="slides" src="<?php echo base_url(); ?>assets/photo/im7.jpeg">
    <img class="slides" src="<?php echo base_url(); ?>assets/photo/3.jpeg">
    <img class="slides" src="<?php echo base_url(); ?>assets/photo/2.jpg">
    <img class="slides" src="<?php echo base_url(); ?>assets/photo/4.jpg">
    <img class="slides" src="<?php echo base_url(); ?>assets/photo/photo1.jpg">
    <img class="slides" src="<?php echo base_url(); ?>assets/photo/photo.jpg">
    <img class="slides" src="<?php echo base_url(); ?>assets/photo/1.jpeg">
    
    
          <button class="btn" onclick="plusIndex(-1)" id="btn1">&#10094;</button>
    <button class="btn"onclick="plusIndex(1)" id="btn2">&#10095;</button>
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
</body>  
</html>