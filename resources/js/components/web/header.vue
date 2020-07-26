<template>
    <!-- Header Section Begin -->
    <div class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> info@alzeena.com.bd</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="https://web.facebook.com/alzeena.com.bd/"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="#"><i class="fa fa-user"></i> Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <router-link to="/"><img src="{{ asset('web/img/logo.png')}}" alt=""></router-link>
                    </div>
                </div>
                <div class="col-lg-9">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><router-link to="/">Home</router-link></li>
                            <li><router-link to="/public-product/">Shop</router-link></li>
                            <li><router-link to="/public-cart">Cart</router-link></li>
                            <li><a href="#">Blog</a></li>
                            <li><router-link to="/location/">Location</router-link></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-3">
                    <div class="header__cart">
                        <ul>
                            <li><router-link to="/public-cart"><i class="fa fa-shopping-bag"></i> <span>{{qty}}</span></router-link></li>
                        </ul>
                        <div class="header__cart__price">item: <span>{{subtotal}}<b>৳</b></span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>

    </div>
    </div>
</template>

<script>
    export default {
        name: "header"
    }
</script>

<style scoped>

</style>
