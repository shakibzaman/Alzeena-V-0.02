 <template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Customer</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row container">
         <div class="card col-lg-12">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Saler Insert
            <router-link to="/customer" class="btn btn-sm btn-info" id="add_new"> All Customer</router-link>
          </div>
          <div class="card-body">
          	  <form @submit.prevent="customerInsert" enctype="multipart/form-data">
                <div class="form-group">
	              <div class="form-row">
	               <div class="col-md-6">
	                <div class="form-label-group">
	                  <input type="text" v-model="form.name" class="form-control"   required="">
	                  <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
	                  <label for="firstName">Full Name</label>
	                </div>
	               </div>
                      <div class="col-md-6">
                          <div class="form-label-group">
                              <input type="text" v-model="form.address" class="form-control"  required="">
                              <small class="text-danger" v-if="errors.address">{{ errors.address[0] }}</small>
                              <label for="firstName">Address</label>
                          </div>
	             </div>
                  </div>
	          </div>
	          <div class="form-group">
	              <div class="form-row">
	               <div class="col-md-6">
	                <div class="form-label-group">
	                  <input type="text" v-model="form.phone" class="form-control"  required="">
	                  <label for="lastName">Phone</label>
	                  <small class="text-danger" v-if="errors.phone">{{ errors.phone[0] }}</small>
	                </div>
	               </div>
                  <div class="col-md-6">
                      <div class="form-label-group">
                          <input type="text" v-model="form.discount" class="form-control"  required="">
                          <label for="discount">Discount</label>
                          <small class="text-danger" v-if="errors.discount">{{ errors.discount[0] }}</small>
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
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script>

    export default {
        data(){
        	return{
        		form:{
        			name :'',
        			address:'',
        			discount :'',
        			phone:'',
        		},
        		errors:{},
        	}
        },


        methods:{
        	customerInsert(){
        		axios.post('/api/wholesale/',this.form)
        		.then(() => {
        			this.$router.push({ name: 'saler' })
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
