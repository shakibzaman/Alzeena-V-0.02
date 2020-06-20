<template>
    <div>
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
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6" v-for="category in categoriesproducts">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" >
                                        <div class="pro-image">
                                            <img :src="'/'+category.image" class="image">
                                        </div>
                                        <ul class="product__item__pic__hover">
                                            <li><router-link :to="{name: 'fav-product',params:{id: category.id}}"><i class="fa fa-heart"></i></router-link></li>
                                            <li><router-link :to="{name: 'productShow',params:{id: category.id}}"><i class="fa fa-retweet"></i></router-link></li>
                                            <li><router-link :to ="{name: 'cart-product',params:{id: category.id}}"><i class="fa fa-shopping-cart"></i></router-link></li>
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

        },
        methods:{



        }
    }
</script>

<style scoped>

</style>
