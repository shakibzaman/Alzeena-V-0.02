<template>
<div>
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
                                <form action="#">
                                    <div class="hero__search__categories">
                                        All Categories
                                        <span class="arrow_carrot-down"></span>
                                    </div>
                                    <input type="text" placeholder="What do yo u need?">
                                    <button type="submit" class="site-btn">SEARCH</button>
                                </form>
                            </div>
                                <div class="header__cart">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>{{qty}}</span></a></li>
                                    </ul>
                                    <div class="header__cart__price">item: <span>{{subtotal}}<b>৳</b></span></div>
                                </div>
                        </div>
                        <div class="hero__item slider-image" :style="{'background-image':'url(http://localhost:8000/web/img/slider.jpg)'}">
                            <div class="hero__text">
                                <span>Our Collection</span>
                                <h2>Your Choice <br />Our Collection</h2>
                                <p>Free Pickup and Delivery Available</p>
                                <a href="#" class="primary-btn">SHOP NOW</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Categories Section Begin -->
    <div class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item caro-cate" :style="{'background-image':'url(http://localhost:8000/web/img/categories/c1.jpg)'}">
                            <h5><a href="#">Borkha</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item caro-cate" :style="{'background-image':'url(http://localhost:8000/web/img/categories/c2.jpg)'}">
                            <h5><a href="#">Khimar</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item caro-cate" :style="{'background-image':'url(http://localhost:8000/web/img/categories/c3.jpg)'}">
                            <h5><a href="#">Hizab</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item caro-cate" :style="{'background-image':'url(http://localhost:8000/web/img/categories/c4.jpg)'}">
                            <h5><a href="#">Noikab</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item caro-cate" :style="{'background-image':'url(http://localhost:8000/web/img/categories/c5.jpg)'}">
                            <h5><a href="#">Mask</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Section End -->
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
        </div>
    </div>
</div>
</div>
    <!-- Featured Section End -->
</template>

<script>
    export default {
        created() {
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
                products:'',
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
