<main>
    <section class="bg-primary text-center">
        <section class="parallax" data-url="<?=base_url()?>public/images/parallax1.png" data-mobile="true" data-direction="inverse"
                 data-speed="0.7">
            <section class="parallax" data-url="<?=base_url()?>public/images/parallax2.png" data-mobile="true" data-speed="1.0">
                <section class="well well__ins4">
                    <div class="container">
                        <h3 class="center">Get A Quote</h3>
                        <br>

                        <form method="post" action="<?=site_url('site/saveQuotation')?>">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <select name="country_code" class="form-control country-code selectpicker" data-live-search="true" title="Select" required>
                                        <?php foreach($country_codes as $v){ ?>
                                            <option title="<?php echo "+".$v['phonecode']; ?>" value="<?php echo $v['phonecode']."-".$v['name']; ?>"><?php echo "(+".$v['phonecode'].") ".$v['name']; ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control phone" name="phone" id="phone" placeholder="Phone" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="project_title" id="project_title" placeholder="Project Title" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="form-control" placeholder="Message" required></textarea>
                                </div>
                            </div>

                             <button class="btn btn-secondary btn-lg" type="submit">Request Quotation</button>
                        </form>

                    </div>
                </section>
            </section>
        </section>
    </section>
</main>