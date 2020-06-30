<template>
    <div>
        <!-- Breadcrumb Section Begin -->
        <div class="breadcrumb-section" :style="{'background-image':'url(http://localhost:8000/web/img/breadcrumb.jpg)'}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text" v-for="category in categoriesproducts">
                            <h2>Show Product from {{category.category_name}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section End -->
        <div class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" v-for="category in categoriesproducts">
                        <div class="row">
                            <div class="col-md-3" >

                                <div class="product__item">
                                    <div class="product__item__pic set-bg" >
                                        <div class="pro-image">
                                            <img :src="'/'+category.image" class="image">
                                        </div>
                                        <ul class="product__item__pic__hover">
                                            <li><router-link :to="{name: 'productShow',params:{id: category.id}}"><i class="fa fa-retweet"></i></router-link></li>
                                            <button class="btn bt-sm" @click.prevent="AddToCart(category.id)"><li><i class="fa fa-shopping-cart"></i></li></button>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="#">{{category.product_name}}</a></h6>
                                        <h5>{{category.selling_price}}</h5>
                                    </div>
                                </div>
                            </div>
                            <!--            <tr v-for="cat in categories">-->
                            <!--                <td>{{cat}}</td>-->
                            <!--            </tr>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

            let id = this.$route.params.id
            axios.get('/apipublic/online-category/'+id)
                .then(({data}) => (this.categoriesproducts = data))
                .catch()

            axios.get('/apipublic/online-category/')
                .then(({data}) => (this.categories = data))
                .catch()

            this.cartProduct();
            Reload.$on('AfterAdd', () => {
                this.cartProduct();
            })
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
