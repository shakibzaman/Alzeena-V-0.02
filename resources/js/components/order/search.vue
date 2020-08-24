 <template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Search Order</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row container">
         <div class="card col-lg-12">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Search Orders
            <router-link to="/order" class="btn btn-sm btn-info" id="add_new"> Today Order</router-link>
          </div>
          <div class="row">
          	<div class="col-lg-6">
          	  <form @submit.prevent="searchDate">
	            <div class="card-body">
	                <div class="form-group">
		              <div class="form-row">
		               <div class="col-md-12">
		                <div class="form-group">
						   <label for="exampleFormControlSelect2">Search By Date</label>
						    <input type="date" required="" class="form-control" v-model="form.date">
						  </div>
		               </div><br>
		               <button type="submit" class="btn btn-success">Search</button>
		             </div>
		            </div>
		          </div>

	            </form>
          	</div>
          	<div class="col-lg-6">
          	  <form @submit.prevent="searchMonth">
	            <div class="card-body">
	                <div class="form-group">
		              <div class="form-row">
		               <div class="col-md-12">
		               <div class="form-group">
		                   <label for="exampleFormControlSelect2">Search By Month</label>
		                   <select  class="form-control" id="exampleFormControlSelect2" v-model="form.month">
		                     <option value="January">January</option>
		                     <option value="February">February</option>
		                     <option value="March">March</option>
		                     <option value="April">April</option>
		                     <option value="May">May</option>
		                     <option value="june">june</option>
		                     <option value="July">July</option>
		                     <option value="August">August</option>
		                     <option value="September">September</option>
		                     <option value="October">October</option>
		                     <option value="November">November</option>
		                     <option value="December">December</option>
		                   </select>
		                 </div>
		               </div><br>
		               <button type="submit" class="btn btn-success">Search</button>
		             </div>
		            </div>
		          </div>

	            </form>
          	</div>
              <div class="col-lg-12">
                  <div class="card-header">
                      <i class="fas fa-chart-area"></i>
                      Search By Date to Date
                  </div>
<!--                  <h4>Search By Date to Date</h4>-->
                  <form @submit.prevent="searchBtwDate">
                      <div class="card-body">
                          <div class="form-group">
                              <div class="form-row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="exampleFormControlSelect2">Start Date</label>
                                          <input type="date" required="" class="form-control" v-model="form.date1">
                                      </div>
                                  </div><br>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="exampleFormControlSelect2">End Date</label>
                                          <input type="date" required="" class="form-control" v-model="form.date2">
                                      </div>
                                  </div>
                                  <button type="submit" class="btn btn-success">Search</button>
                              </div>
                          </div>
                      </div>

                  </form>
              </div>


              <div class="card-body">
                  <div class="card-body">
                      <div class="table-responsive">
                          <label>Search</label>
<!--                          <input type="text" v-model="searchTerm" class="form-control" style="width:200px; "><br>-->
                          <table class="table table-bordered" id="" width="100%" cellspacing="0">

                              <thead>
                              <tr>
                                  <th>Name</th>
                                  <th>Total Amount</th>
                                  <th>Pay</th>
                                  <th>Due</th>
                                  <th>Status</th>
                                  <th>Action</th>
                              </tr>
                              </thead>

                              <tbody>

                              <tr v-for="order in orders" :key="order.id">
                                  <td>{{ order.name }}</td>
                                  <td>{{ order.total }}</td>
                                  <td>{{ order.pay }}</td>
                                  <td>{{ order.due }}</td>
                                  <td>{{ order.status_name }}</td>
                                  <td>
                                      <router-link :to="{name: 'view-order', params:{id: order.id} }" class="btn btn-sm btn-info">view</router-link>
                                      <router-link :to="{name: 'posinvoice', params:{id: order.id} }" class="btn btn-sm btn-info">Invoice</router-link>
                                      <router-link :to="{name: 'refund', params:{id: order.id} }" class="btn btn-sm btn-info">Refund</router-link>
                                      <router-link :to="{name: 'exchange', params:{id: order.id} }" class="btn btn-sm btn-info">Exchange</router-link>
                                  </td>
                              </tr>

                              </tbody>
                          </table>
                      </div>
                  </div>
                  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
              </div>
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
        			date :'',
                    date1 :'',
                    date2 :'',
        			month:''
        		},
        		errors:{},
                orders:[],
        	}
        },


        methods:{
        	searchDate(){
                axios.post('/api/search/order',this.form)
                    .then(({data}) => (this.orders = data))
                        // Notification.success()
                    .catch(error => this.errors = error.response.data.errors)
        	},
            searchBtwDate(){
                axios.post('/api/search/date/',this.form)
                    .then(({data}) => (this.orders = data))
                    // Notification.success()
                    .catch(error => this.errors = error.response.data.errors)
            },
        	searchMonth(){
        		axios.post('/api/search/month',this.form)
                    .then(({data}) => (this.orders = data))
                    // Notification.success()
                    .catch(error => this.errors = error.response.data.errors)
        	}


        }


    }




</script>

<style>

#add_new{
	float: right;
}

</style>
