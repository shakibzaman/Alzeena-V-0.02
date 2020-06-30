<template>
<div>
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section" :style="{'background-image':'url(http://localhost:8000/web/img/breadcrumb.jpg)'}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Our Location</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
        <div class="container">

            <!-- Contact Section Begin -->
            <section class="contact spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                            <div class="contact__widget">
                                <span class="icon_phone"></span>
                                <h4>Phone</h4>
                                <p>01303-203212</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                            <div class="contact__widget">
                                <span class="icon_pin_alt"></span>
                                <h4>Address</h4>
                                <p>14/22 asad avenue,townhall,Mohammadpur</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                            <div class="contact__widget">
                                <span class="icon_clock_alt"></span>
                                <h4>Open time</h4>
                                <p>10:00 am to 07:00 pm</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                            <div class="contact__widget">
                                <span class="icon_mail_alt"></span>
                                <h4>Email</h4>
                                <p>info@alzeena.com.bd</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Contact Section End -->

            <!-- Map Begin -->
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.646315253687!2d90.36531461467379!3d23.759988694327564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bff296ee14a7%3A0x6730cf756c73ae8b!2sAlzeena!5e0!3m2!1sen!2sbd!4v1592945440920!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                <div class="map-inside">
                    <i class="icon_pin"></i>
                    <div class="inside-widget">
                        <h4>Alzeena Fashion</h4>
                        <ul>
                            <li>Phone: 01303-203212</li>
                            <li>Add: 14/22 asad avenue,townhall,Mohammadpur</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Map End -->

        </div>
</div>
</template>

<script>
    export default {
        name: "location"
    }
</script>

<style scoped>

</style>
