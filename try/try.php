<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Elastic Tab Animation | CodingNepal</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
html,body{
  display: grid;
  height: 100%;
  place-items: center;
  text-align: center;
  background: #f2f2f2;
}
.wrapper{
  height: 60px;
  width: 55vw;
  background: #fff;
  line-height: 60px;
  border-radius: 50px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.25);
}
.wrapper nav{
  position: relative;
  display: flex;
}
.wrapper nav label{
  flex: 1;
  width: 100%;
  z-index: 1;
  cursor: pointer;
}
.wrapper nav label a{
  position: relative;
  z-index: -1;
  color: #1d1f20;
  font-size: 20px;
  font-weight: 500;
  text-decoration: none;
  transition: color 0.6s ease;
}
.wrapper nav #home:checked ~ label.home a,
.wrapper nav #inbox:checked ~ label.inbox a,
.wrapper nav #contact:checked ~ label.contact a,
.wrapper nav #heart:checked ~ label.heart a,
.wrapper nav #about:checked ~ label.about a{
  color: #fff;
}
.wrapper nav label a i{
  font-size: 25px;
  margin: 0 7px;
}
.wrapper nav .tab{
  position: absolute;
  height: 100%;
  width: 20%;
  left: 0;
  bottom: 0;
  z-index: 0;
  border-radius: 50px;
  background: linear-gradient(45deg, #05abe0 0%,#8200f4 100%);
  transition: 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}
.wrapper nav #inbox:checked ~ .tab{
  left: 20%;
}
.wrapper nav #contact:checked ~ .tab{
  left: 40%;
}
.wrapper nav #heart:checked ~ .tab{
  left: 60%;
}
.wrapper nav #about:checked ~ .tab{
  left: 80%;
}
.wrapper nav input{
  display: none;
}
      </style>
   </head>
   <body>
      <div class="wrapper">
         <nav>
            <input type="radio" name="tab" id="home" checked>
            <input type="radio" name="tab" id="inbox">
            <input type="radio" name="tab" id="contact">
            <input type="radio" name="tab" id="heart">
            <input type="radio" name="tab" id="about">
            <label for="home" class="home"><a href="#"><i class="fas fa-home"></i>Home</a></label>
            <label for="inbox" class="inbox"><a href="#"><i class="far fa-comment"></i>Inbox</a></label>
            <label for="contact" class="contact"><a href="#"><i class="far fa-envelope"></i>Contact</a></label>
            <label for="heart" class="heart"><a href="#"><i class="far fa-heart"></i>Heart</a></label>
            <label for="about" class="about"><a href="#"><i class="far fa-user"></i>About</a></label>
            <div class="tab"></div>
         </nav>
      </div>
   </body>
</html>