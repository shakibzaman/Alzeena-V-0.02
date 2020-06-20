 <template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Company</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row container">
         <div class="card col-lg-12">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Size Update
            <router-link to="/size" class="btn btn-sm btn-info" id="add_new"> All Sizes</router-link>
          </div>
          <div class="card-body">
          	  <form @submit.prevent="sizeUpdate">
                <div class="form-group">
	              <div class="form-row">
	               <div class="col-md-12">
	                <div class="form-label-group">
	                  <input type="text" v-model="form.company_name" class="form-control"   required="">
	                  <small class="text-danger" v-if="errors.company_name">{{ errors.company_name[0] }}</small>
	                  <label for="firstName">Name</label>
	                </div>
	               </div>
	             </div>
	          </div>
                  <div class="form-group">
                      <div class="form-row">
                          <div class="col-md-12">
                              <div class="form-label-group">
                                  <input type="text" v-model="form.phone" class="form-control"   required="">
                                  <small class="text-danger" v-if="errors.phone">{{ errors.phone[0] }}</small>
                                  <label for="phone">Phone</label>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="form-row">
                          <div class="col-md-12">
                              <div class="form-label-group">
                                  <input type="text" v-model="form.address" class="form-control"   required="">
                                  <small class="text-danger" v-if="errors.address">{{ errors.address[0] }}</small>
                                  <label for="Address">Address</label>
                              </div>
                          </div>
                      </div>
                  </div>
              <button type="submit" class="btn btn-success">Update</button>
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
                    company_name :'',
        			phone :'',
        			address :'',

        		},
        		errors:{},
        	}
        },
        created(){
        	let id = this.$route.params.id
        	axios.get('/api/deli-company/'+id)
        	.then(({data}) => (this.form = data))
        	.catch()
        },
        methods:{
        	sizeUpdate(){
        		let id = this.$route.params.id
        		axios.patch('/api/deli-company/'+id,this.form)
        		.then(() => {
        			this.$router.push({ name: 'company' })
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
