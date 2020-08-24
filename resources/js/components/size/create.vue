 <template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Size</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row container">
         <div class="card col-lg-12">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Size Insert
            <router-link to="/size" class="btn btn-sm btn-info" id="add_new"> All Size</router-link>
          </div>
          <form @submit.prevent="sizeInsert">
            <div class="card-body">
                <div class="form-group">
	              <div class="form-row">
	               <div class="col-md-12">
	                <div class="form-label-group">
	                  <input type="text" v-model="form.size" class="form-control"   required="">
	                  <small class="text-danger" v-if="errors.size">{{ errors.size[0] }}</small>
	                  <label for="firstName">Size Name</label>
	                </div>
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
</template>

<script>

    export default {

        data(){
        	return{
        		form:{
                    size:''
        		},
        		errors:{},
        	}
        },


        methods:{
            sizeInsert(){
        		axios.post('/api/size/',this.form)
        		.then(() => {
        			this.$router.push({ name: 'size' })
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
