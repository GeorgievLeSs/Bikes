
<section id="contacts">
    <div class="container">
        <h1> Contact With Me</h1>
        <div class="row">
            <div class="col-md-6">
                <p>
                    A motorcycle (also called a motorbike, bike, or cycle) is a two-[
                    or three-wheeled[3][4] motor vehicle. Motorcycle design varies greatly to suit a range of different purposes: 
                    long distance travel, commuting, cruising, sport including racing, and off-road riding. Motorcycling is riding a 
                    motorcycle and related social activity such as joining a motorcycle club and attending motorcycle rallies.
                    In 1894, Hildebrand & Wolfmüller became the first series production motorcycle, and the first to be called a motorcycle. 
                    In 2014, the three top motorcycle producers globally by volume were Honda, Yamaha (both from Japan), and Hero MotoCorp (India)
                </p>
                <h2>Head Office</h2>
                <ul>
                    <li>
                        <i class="fa fa-map-marker"></i> Find me: Bulgaria, Sofia
                    </li>
                    <li>
                        <i class="fa fa-phone"></i> Call me: 0876 959 978
                    </li>
                    <li>
                        <i class="fa fa-envelope"></i> E-mail me on: iivaylo_georgiev<span class="domain">abv.bg</span>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <span>Find me on the map:</span>
                <div  id="canvas1" class="map">
                    <iframe id="googleMap" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2930.3505715518327!2d23.306984488146966!3d42.73863457057386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sbg!2sbg!4v1465077267395" width="100%" height="280" frameborder="0" style="border: 0">
                    </iframe>
                </div>
            </div>
        </div>  
        <div class="col-sm-8 col-sm-offset-2 paddignBottom">
            <h2> Send Me а Message: </h2>
            <form id="contactForm" method="POST" enctype="multipart/form-data" novalidate="novalidate" itemscope itemtype="http://schema.org/Message">
                <div class="form-group col-sm-6  col-md-4  col-md-offset-2"> 
                    <input type="text" name="contact_name" placeholder="Your name..." class="form-control">
                </div>
                <div class="form-group col-sm-6  col-md-4"> 
                    <input type="text" name="contact_email" placeholder="Your e-mail..." class="form-control">
                </div>
                <div class="form-group col-sm-8 col-sm-offset-2 col-md-6  col-md-offset-3"> 
                    <textarea id="message" class="form-control" name="contact_content" 
                              placeholder="Message..." cols="54" rows="10" itemprop="emailMessage">
                    </textarea>
                </div>
                <button  class="styleButton col-xs-8 col-xs-offset-2 col-md-6  col-md-offset-3" type="submit" id="contactSend">Send Message</button>
            </form>
        </div>
    </div>
</section> 
<?php
include 'inline/partners.php';
include 'inline/linkQuote.php';
?>               
