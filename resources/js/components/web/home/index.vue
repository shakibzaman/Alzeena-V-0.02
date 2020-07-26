<template>
<div>
   <!-- Hero Section Begin -->
    <div class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul v-for="category in categories" :key="category.id">
                            <li>
                                <router-link :to="{name: 'categoryShow', params:{id: category.id} }">{{category.category_name}}</router-link>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <img :src="'web/img/campgaion/topBanar.jpg'" >
                        </div>
                    </div>
                    <div class="hero__item slider-image" :style="{'background-image':'url(http://localhost:8000/web/img/slider.jpg)'}">
                        <div class="hero__text">
                            <span>Our Collection</span>
                            <h2>Your Choice <br />Our Collection</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <router-link to="/public-product/" class="primary-btn">SHOP NOW</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Hero Section End -->

        <!-- Category Card -->
    <div class="category-card">
        <div class="container">
            <div class="row">
                <div v-for="category in categories" :key="category.id" class="col-md-2">
                    <div class="card" >
                        <div >
                            <!-- <div>{{category.category_name}}</div> -->
                            <div class="categories__item caro-cate">
                            <img :src="'/'+category.image" id="em_photo_large">
                                <router-link :to="{name: 'categoryShow', params:{id: category.id} }"><h5>{{category.category_name}}</h5></router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- End Category -->
        <!-- Start Promotion -->
    <!-- <div class="promotional">
        <div class="container-fluid advertisement-four-container">
            <div class="row"><a href="women" class="col-lg-4 col-12 no-padding">
                <img src="https://demo.bagisto.com/bagisto-202-134-10-140/themes/velocity/assets/images/big-sale-banner.png" class="col-12"></a> <div class="col-lg-4 col-12 offers-ct-panel"><a class="row col-12 remove-padding-margin"><img src="https://demo.bagisto.com/bagisto-202-134-10-140/themes/velocity/assets/images/seasons.png" class="col-12 offers-ct-top"></a> <a class="row col-12 remove-padding-margin"><img src="https://demo.bagisto.com/bagisto-202-134-10-140/themes/velocity/assets/images/deals.png" class="col-12 offers-ct-bottom"></a></div> <a href="kids" class="col-lg-4 col-12 no-padding"><img src="https://demo.bagisto.com/bagisto-202-134-10-140/themes/velocity/assets/images/kids.png" class="col-12"></a></div></div>
    </div> -->
    <!-- End Promotion  -->

    <!-- Latest product -->
    <div class="container">
        <div class="title title-margin">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Latest Collection</h2>
                    </div>
                </div>
                <div class="col-md-3" v-for="product in products">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" >
                            <div class="pro-image">
                                <img :src="'/'+product.image" class="image">
                            </div>
                            <ul class="product__item__pic__hover">
                                <li><router-link :to="{name: 'productShow',params:{id: product.id}}"><i class="fa fa-retweet"></i></router-link></li>
                                <button class="btn bt-sm" @click.prevent="AddToCart(product.id)"><li><i class="fa fa-shopping-cart"></i></li></button>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">{{product.product_name}}</a></h6>
                            <h5>{{product.selling_price}}</h5>
                        </div>
                    </div>
                </div>
                <pagination :data="products" @pagination-change-page="getResults"></pagination>
            </div>
        </div>
    </div>
    <!-- End Latest Collection -->
    <!-- promotion2 -->
    <!-- <div class="p">
        <div class="container-fluid advertisement-three-container"><div class="row"><a class="col-lg-6 col-md-12 no-padding"><img src="https://demo.bagisto.com/bagisto-202-134-10-140/themes/velocity/assets/images/headphones.png" class="full-width"></a> <div class="col-lg-6 col-md-12 second-panel"><a class="row top-container"><img src="https://demo.bagisto.com/bagisto-202-134-10-140/themes/velocity/assets/images/watch.png" class="col-12 pr0"></a> <a class="row bottom-container"><img src="https://demo.bagisto.com/bagisto-202-134-10-140/themes/velocity/assets/images/kids-2.png" class="col-12 pr0"></a></div></div></div>
    </div> -->
    <!-- End Promotion -->
</div>
</template>

<script>
    export default {
        created() {
         this.getResults();
            this.allProduct();
            this.cartProduct();
            axios.get('/apipublic/public-online-product/')
                .then(({data}) => (this.products = data))
                .catch()

            Reload.$on('AfterAdd', () => {
                this.cartProduct();
            })

        },

        data() {
            return {
                categories: [],
                searchTerm: '',
                products:{},
                cards:[],
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
            getResults(page = 1) {
                axios.get('apipublic/public-online-product?page=' + page)
                    .then(response => {
                        this.products = response.data;
                    });
            },
            allProduct() {
                axios.get('/apipublic/online-category/')
                    .then(response => {
                        this.categories = response.data;
                    });
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
