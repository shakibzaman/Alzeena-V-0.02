 <template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Category</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row container">
         <div class="card col-lg-12">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Category Insert 
            <router-link to="/category" class="btn btn-sm btn-info" id="add_new"> All Category</router-link>
          </div>
          <form @submit.prevent="categoryInsert">
            <div class="card-body">
                <div class="form-group">
	              <div class="form-row">
	               <div class="col-md-12">
	                <div class="form-label-group">
	                  <input type="text" v-model="form.category_name" class="form-control"   required="">
	                  <small class="text-danger" v-if="errors.category_name">{{ errors.category_name[0] }}</small>
	                  <label for="firstName">Category Name</label>
	                </div>
	               </div>
	             </div>
	            </div>
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
	          </div>
              <button type="submit" class="btn btn-success">Submit</button>
            </form>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
         </div>
       </div>
   </div>
</template>

<script>

    export default {
    
        data(){
        	return{
        		form:{
              category_name :'',
              image:'',
        		},
        		errors:{},
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
        	categoryInsert(){
        		axios.post('/api/category/',this.form)
        		.then(() => {
        			this.$router.push({ name: 'category' })
        			Notification.success()
        		})
        		.catch(error => this.errors = error.response.data.errors)
        	},
        	
        }

    	
    }



  
</script>

<style>
	
#add_new{
	float: right;
}

</style>
