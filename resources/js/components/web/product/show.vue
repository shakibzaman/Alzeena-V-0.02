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
                                    <p>Details: {{product.details}}</p>
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
                <div class="col-md-3" v-for="product in categoriesProductList">
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
                categories:{},
                categoriesProductList:{},
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
                

            axios.get('/apipublic/related-product/'+id)
                .then(({data}) => (this.categoriesProductList = data))
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
