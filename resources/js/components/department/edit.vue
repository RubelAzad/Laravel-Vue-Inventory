
<template>
    <div>
        <div class="row">
            <router-link to="/all-department" class="btn btn-primary">All department</router-link>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
          <div class="card shadow-sm my-5">
            <div class="card-body p-0">
              <div class="row">
                <div class="col-lg-12">
                  <div class="login-form">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Edit department</h1>
                    </div>
                    <div class="card-body">
                    <form class="user" @submit.prevent="departmentUpdate" enctype="multipart/form-data">
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>department Name</label>
                                <input type="text" class="form-control" id="department_name" placeholder="Enter department Name" v-model="form.department_name">
                                <small class="text-danger" v-if="errors.department_name">{{ errors.department_name[0] }}</small>
                            </div>
                        </div>

                      </div>

                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                            </div>
                        </div>

                      </div>
                    </form>
                </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</template>

<script type="text/javascript">
import axios from "axios";
import User from "../../Helper/User";
import Notification from "../../Helper/Notification";
let reader = new FileReader();
export default {
    created(){
        if(!User.loggedIn()){
            this.$router.push({name:'/'})
        }
    },
    data() {
        return {
            form: {
                department_name: '',
            },
            errors:{

            }
        };
    },
    created(){
        let id = this.$route.params.id
        axios.get('/api/department/'+id)
        .then(({data}) => (this.form =data))
        .catch()
    },

    methods: {

        departmentUpdate(){
            let id = this.$route.params.id
            axios.patch('/api/department/'+id,this.form)
            .then(() => {
                this.$router.push({ name: 'all-department'})
                Notification.success('Updated Successfully')
            })
            .catch(error =>this.errors = error.response.data.errors)
            },


    },
};
</script>

<style type="text/css">
</style>

