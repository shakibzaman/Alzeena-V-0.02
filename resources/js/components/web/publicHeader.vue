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
                    <div class="header__logo" v-for="general in generals">
                        <!-- <img src="https://www.alzeena.com.bd/web/img/logo.png" fluid alt="Fluid image"></img> -->
                        <img :src="'/'+general.logo" class="image" fluid alt="Fluid image">
                    </div>
                </div>
                <div class="col-lg-7">
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
                <div class="col-md-2">
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
        created() {
            this.allProduct();
            this.cartProduct();
            axios.get('/apipublic/public-online-product/')
                .then(({data}) => (this.products = data))
                .catch()
            axios.get('/apipublic/general/')
                .then(({data}) => (this.generals = data))
                .catch()

            Reload.$on('AfterAdd', () => {
                this.cartProduct();
            })

        },

        data() {
            return {
                categories: [],
                searchTerm: '',
                products:'',
                cards:[],
                generals:'',
            }
        },
        computed: {
            filtersearch() {
                return this.products.filter(product => {
                    return product.product_name.match(this.searchTerm)
                })
            },
            qty(){
                let sum=0;
                for(let i =0; i < this.cards.length; i++ ){
                    sum += (parseFloat(this.cards[i].pro_quantity));
                }
                return sum;
            },
            subtotal(){
                let sum=0;
                for(let i =0; i < this.cards.length; i++){
                    sum += (parseFloat(this.cards[i].pro_quantity) * parseFloat(this.cards[i].product_price));
                }
                return sum;
            },
        },
        methods: {
            allProduct() {
                axios.get('/apipublic/online-category/')
                    .then(({data}) => (this.categories = data))
                    .catch()
            },
            AddToCart(id){
                axios.get('/apipublic/addTocart/'+id)
                    .then(() => {
                        Reload.$emit('AfterAdd');
                        Notification.cart_success()
                    })
            },
            cartProduct(){
                axios.get('/apipublic/cart/product')
                    .then(({data}) => (this.cards = data))
                    .catch()
            },
        }
    }
</script>

<style scoped>

</style>
