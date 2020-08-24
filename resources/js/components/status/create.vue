 <template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Status</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row container">
         <div class="card col-lg-12">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Size Insert
            <router-link to="/status" class="btn btn-sm btn-info" id="add_new"> All Size</router-link>
          </div>
          <form @submit.prevent="sizeInsert">
            <div class="card-body">
                <div class="form-group">
	              <div class="form-row">
	               <div class="col-md-12">
	                <div class="form-label-group">
	                  <input type="text" v-model="form.status_name" class="form-control"   required="">
	                  <small class="text-danger" v-if="errors.status_name">{{ errors.status_name[0] }}</small>
	                  <label for="firstName">Status Name</label>
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
                    status_name:''
        		},
        		errors:{},
        	}
        },


        methods:{
            sizeInsert(){
        		axios.post('/api/status/',this.form)
        		.then(() => {
        			this.$router.push({ name: 'status' })
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
