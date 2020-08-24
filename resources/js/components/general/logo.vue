<template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Product</li>
        </ol>
        <!-- Icon Cards-->
        <div class="row container">
            <div class="card col-lg-12">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Logo Upload
                </div>
                <div class="card-body">
                    <form @submit.prevent="logoInsert" enctype="multipart/form-data">
                        
                        
                      
                        <div class="form-group">
                            <div class="form-row">

                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="file" class="btn btn-info" @change="onFileselected">

                                        <small class="text-danger" v-if="errors.image">{{ errors.image[0] }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img :src="form.image" style="height:40px; width: 40px;">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                form:{
                    image:'',
                    
                },
                errors:{},
                logos:{},
                suppliers:{},
                sizes:{},
                 
            }
        },
        methods:{
            onFileselected(event){
                let file=event.target.files[0];
                if (file.size > 1048770) {
                    Notification.image_validation()
                }else{
                    let reader = new FileReader();
                    reader.onload = event => {
                        this.form.image = event.target.result
                        //console.log(event.target.result);
                    };
                
                    reader.readAsDataURL(file);
                }
            },
           
            logoInsert(){
            
                axios.post('/api/general/',this.form)
                    .then(() => {
                        this.$router.push({ name: 'logo' })
                        Notification.success()
                    })
                    .catch(error => this.errors = error.response.data.errors)
            },
            
        },
        created(){
            axios.get('/api/general')
                .then(({data}) => (this.logos = data))
            axios.get('/api/supplier/')
                .then(({data}) => (this.suppliers = data))
            axios.get('/api/size/')
                .then(({data}) => (this.sizes = data))
        },
    }
</script>

<style>
    #add_new{
        float: right;
    }
</style>