<template>
    <div>
        <div class="row">
            <router-link to="/add-employee" class="btn btn-primary">Add Employee</router-link>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
          <div class="card shadow-sm my-5">
            <div class="card-body p-0">
              <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Joining Date</th>
                        <th>Salary</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <tr v-for="employee in employees" :key="employee.id">
                        <td>{{ employee.name }}</td>
                        <td><img :src="employee.photo" alt="" id="em_photo"></td>
                        <td>{{ employee.phone }}</td>
                        <td>{{ employee.email }}</td>
                        <td>{{ employee.joining_date }}</td>
                        <td>{{ employee.salary }}</td>
                        <td><a href="#" class="btn btn-sm btn-primary">Detials</a></td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->
            </div>
          </div>
        </div>
      </div>
</template>

<script type="text/javascript">
import axios from "axios";
import User from "../../Helper/User";
export default {
    created(){
        if(!User.loggedIn()){
            this.$router.push({name:'/'})
        }
        this.allEmployee();
    },
    data() {
        return {
            employees:[]
        };
    },
    methods: {
        allEmployee(){
            axios.get('/api/employee')
            .then(({data})=>(this.employees = data))
            .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        }
    }
};
</script>

<style>
#em_photo{
    height: 40px;
    width: 40px;
}
</style>

