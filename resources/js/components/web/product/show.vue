<template>
<div>
    <div class="breadcrumb-section set-bg" :style="{'background-image':'url(http://localhost:8000/web/img/breadcrumb.jpg)'}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center" >
                    <div class="breadcrumb__text" v-for="product in categoriesproducts">
                        <h2>{{product.product_name}}</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <a href="./index.html">Vegetables</a>
                            <span>Vegetable’s Package</span>
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
            axios.get('/apipublic/public-online-product/'+id)
                .then(({data}) => (this.categoriesproducts = data))
                .catch()

            axios.get('/api/category/')
                .then(({data}) => (this.categories = data))
                .catch()

        },
    }
</script>

<style scoped>

</style>
