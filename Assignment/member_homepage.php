<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="member_homepage_format.css" rel="stylesheet" type="text/css" />
        <link href="member-browse-event.css" rel="stylesheet" type="text/css" />
        <link href="logo.jpg" rel="shortcut icon" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  
    </head>
    <body>
     
        <header><?php include 'member_header.php' ; ?></header>
        
        <div class="container">  
            <div class="swiper">        
              <div class="swiper-wrapper">          
                <div class="swiper-slide"><img src="homepage1.jpg" /></div>
                <div class="swiper-slide"><img src="homepage2.jpg" /></div>
                <div class="swiper-slide"><img src="homepage3.jpg" /></div>
                <div class="swiper-slide"><img src="homepage4.jpg" /></div>
                <div class="swiper-slide"><img src="homepage5.jpg" /></div>
                <div class="swiper-slide"><img src="homepage6.jpg" /></div>
              </div>
       
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <footer><?php include 'member_footer.php' ; ?></footer>
        
        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
        <script>const swiper = new Swiper('.swiper', 
            {
            autoplay:
            {
                delay: 3000,
                disableOnInteraction: false,
            },
            loop: true,
    
            pagination: 
            {
              el: '.swiper-pagination',
              clickable: true,
            },

         
            navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
            },
          });
        </script>
    </body>
</html>
