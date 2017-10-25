<main>
    <section class="well4 text-center">
        <div class="container">
            <h3>How to Find Us</h3>

            <!-- <div class="map text-left">
                <div id="google-map" class="map_model"></div>
                <ul class="map_locations">
                    <li data-x="-73.9874068" data-y="40.643180">
                        <p> 9870 St Vincent Place, Glasgow, DC 45 Fr 45. <span>800 2345-6789</span></p>
                    </li>
                </ul>
            </div>

            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent vestibulum molestie lacus.
                Aenean
                nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque
                penatibus et
                magnis dis parturient
                montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio,
                gravida
                at, cursus nec, luctus a, lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna.
                Donec accumsan malesuada orci. </p> -->

            <div class="row no-align">
                <div class="col-md-3 col-sm-4 col-xs-12 col-md-offset-2">
                    <span class="fa-home"></span>
                    <address class="contact-info">
                        <span>17, Vasupujya Complex</span>
                        <span>Income Tax</span>
                        <span>Ahmedabad-380014</span>
                    </address>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <span class="fa-phone"></span>
                    <address class="contact-info">
                        <a href="callto:#">+1 800 559 6580</a>
                        <a href="callto:#">+1 800 603 6035</a>
                    </address>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <span class="fa-envelope"></span>
                    <address class="contact-info">
                        <a href="mailto:info@matzensolutions.com">info@matzensolutions.com</a>
                    </address>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-primary text-center">
        <section class="parallax" data-url="<?=base_url()?>public/images/parallax1.png" data-mobile="true" data-direction="inverse"
                 data-speed="0.7">
            <section class="parallax" data-url="<?=base_url()?>public/images/parallax2.png" data-mobile="true" data-speed="1.0">
                <section class="well well__ins4">
                    <div class="container">

                        <h3 class="center">Contact Us</h3>
                        <br>

                        <form method="post" action="<?=site_url('site/saveContactUs')?>">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control big-textarea" placeholder="Message" required></textarea>
                                </div>
                            </div>

                            <button class="btn btn-secondary btn-lg" type="submit">Send Message</button>
                        </form>

                        
                    </div>
                </section>
            </section>
        </section>
    </section>
</main>