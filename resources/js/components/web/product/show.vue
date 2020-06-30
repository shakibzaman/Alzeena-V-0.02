<template>
<div>
    <div class="breadcrumb-section set-bg" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center" v-for="product in categoriesproducts">
                    <div class="breadcrumb__text" :style="{'background-image':'url(http://localhost:8000/web/img/breadcrumb.jpg)'}">
                        <h2>{{product.product_name}}</h2>
                        <div class="breadcrumb__option">
                        </div>
                    </div>
                    <div class="product-details">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="pro-img">
                                    <img :src="'/'+product.image" class="card-img-top" style="height: 100%; width: 100%;">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="pro-text">
                                    <h3>Product Code: {{product.product_code}}</h3>
                                    <p>Size: {{product.size}}</p>
                                    <p>Selling Price: {{product.selling_price}}</p>
                                    <ul>
                                        <button class="btn bt-lg btn-success btn-cart" @click.prevent="AddToCart(product.id)"><li><i class="fa fa-shopping-cart"></i> Buy Now !</li></button>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg" style="background-image: url(&quot;img/product/product-1.jpg&quot;);">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</template>

<script>
    export default {
        name: "show",
        data(){
            return{
                errors:{},
                categoriesproducts:{},
                categories:{}
            }
        },
        created(){
            this.cartProduct();
            Reload.$on('AfterAdd', () => {
                this.cartProduct();
            })
            let id = this.$route.params.id
            axios.get('/apipublic/public-online-product/'+id)
                .then(({data}) => (this.categoriesproducts = data))
                .catch()

            axios.get('/apipublic/online-category/')
                .then(({data}) => (this.categories = data))
                .catch()

        },
        methods:{
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
