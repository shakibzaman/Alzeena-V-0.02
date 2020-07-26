<template>
    <div>
        <!-- Breadcrumb Section Begin -->
        <div class="breadcrumb-section" :style="{'background-image':'url(http://localhost:8000/web/img/breadcrumb.jpg)'}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>All Products</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section End -->
        <div class="container">
            <div class="row">

                <div class="card-body shop-page">
<!--                    <div class="header__cart">-->
<!--                        <ul>-->
<!--                            <li><router-link to="/public-cart"><i class="fa fa-shopping-bag"></i> <span>{{qty}}</span></router-link></li>-->
<!--                        </ul>-->
<!--                        <div class="header__cart__price">item: <span>{{subtotal}}<b>৳</b></span></div>-->
<!--                    </div>-->
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">All Product</a>
                        </li>

                        <li class="nav-item" v-for="category in categories" :key="category.id">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" @click="subproduct(category.id)">{{ category.category_name }}</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <input type="text" v-model="searchTerm" class="form-control" placeholder="search"><br>
                            <div class="row">
                                <div class="col-md-3 public-card" v-for="product in filtersearch" :key="product.id">

                                    <div class="card">
                                        <!--                                    <img :src="'/'+product.image" class="image">-->
                                        <img :src="'/'+product.image" class="card-img-top" style="height: 100px; width: 100px;">
                                        <div class="card-body">
                                            <small class="card-title">{{ product.product_name }}</small><br>
                                            <span class="badge badge-success" v-if="product.product_quantity >= 1"> Availble ({{ product.product_quantity }}) </span>
                                            <span class="badge badge-danger" v-else="">Stock Out</span>
                                            <ul class="product__item__pic__hover">
                                                <li><router-link :to="{name: 'productShow',params:{id: product.id}}"><i class="fa fa-retweet"></i></router-link></li>
                                                <button class="btn bt-sm" @click.prevent="AddToCart(product.id)"><li><i class="fa fa-shopping-cart"></i></li></button>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <input type="text" v-model="getsearchTerm" class="form-control" placeholder="search"><br>
                            <div class="row">
                                <div class="col-md-3 public-card" v-for="getproduct in getfiltersearch" :key="getproduct.id">
                                    <div class="card" >
                                        <img :src="'/'+getproduct.image" class="image">
                                        <!--                                    <img :src="getproduct.image" class="card-img-top" style="height: 100px; width: 100px;">-->
                                        <div class="card-body">
                                            <small class="card-title">{{ getproduct.product_name }}</small><br>
                                            <span class="badge badge-success" v-if="getproduct.product_quantity >= 1"> Availble ({{ getproduct.product_quantity }}) </span>
                                            <span class="badge badge-danger" v-else="">Stock Out</span>
                                            <ul class="product__item__pic__hover">
                                                <li><router-link :to="{name: 'productShow',params:{id: getproduct.id}}"><i class="fa fa-retweet"></i></router-link></li>
                                                <button class="btn bt-sm" @click.prevent="AddToCart(getproduct.id)"><li><i class="fa fa-shopping-cart"></i></li></button>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
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
        created() {
            this.allProduct();
            this.allCategory();
            this.cartProduct();
            Reload.$on('AfterAdd', () => {
                this.cartProduct();
            })
        },
        data(){
            return{
                products:[],
                categories:'',
                getproducts:[],
                searchTerm:'',
                getsearchTerm:'',
                errors:'',
                cards:[],
                user_id:'',
                users:[],
            }
        },
        computed:{

            filtersearch(){
                return this.products.filter(product => {
                    return product.product_name.match(this.searchTerm)
                })
            },
            getfiltersearch(){
                return this.getproducts.filter(getproduct => {
                    return getproduct.product_name.match(this.getsearchTerm)
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
        methods:{
            //cart methods here
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

            // end cart methods
            allProduct(){
                axios.get('/apipublic/online-product')
                    .then(({data}) => (this.products = data))
                    .catch()
            },
            allCategory(){
                axios.get('/apipublic/online-category/')
                    .then(({data}) => (this.categories = data))
                    .catch()
            },
            subproduct(id)
            {
                axios.get('/apipublic/getting/product/'+id)
                    .then(({data}) => (this.getproducts = data))
                    .catch(error => this.errors = error.response.data.errors)
            },
            //image validationmethod
            onFileselected(event){
                let file=event.target.files[0];
                if (file.size > 1048770) {
                    Notification.image_validation()
                }else{
                    let reader = new FileReader();
                    reader.onload = event => {
                        this.form.photo = event.target.result

                        console.log(event.target.result);
                    };
                    reader.readAsDataURL(file);

                }
            },

        }


    }

</script>

<style scoped>

</style>
