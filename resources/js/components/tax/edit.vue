
<template>
    <div>
        <div class="row">
            <router-link to="/all-tax" class="btn btn-primary">All Tax</router-link>
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
                      <h1 class="h4 text-gray-900 mb-4">Edit Tax</h1>
                    </div>
                    <div class="card-body">
                    <form class="user" @submit.prevent="taxUpdate" enctype="multipart/form-data">
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Tax Name</label>
                                <input type="text" class="form-control" id="tax_name" placeholder="Enter Tax Name" v-model="form.tax_name">
                                <small class="text-danger" v-if="errors.tax_name">{{ errors.tax_name[0] }}</small>
                            </div>
                        </div>

                      </div>
                      <div class="form-row">
                        <div class="col-md-6">
                            <label>Tax Percent</label>
                            <input type="text" class="form-control" id="tax_name" placeholder="Enter Tax Percent" v-model="form.tax_percent">
                            <small class="text-danger" v-if="errors.tax_percent">{{ errors.tax_percent[0] }}</small>
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
                tax_name: '',
                tax_percent: '',
            },
            errors:{

            }
        };
    },
    created(){
        let id = this.$route.params.id
        axios.get('/api/tax/'+id)
        .then(({data}) => (this.form =data))
        .catch()
    },

    methods: {

        taxUpdate(){
            let id = this.$route.params.id
            axios.patch('/api/tax/'+id,this.form)
            .then(() => {
                this.$router.push({ name: 'all-tax'})
                Notification.success('Updated Successfully')
            })
            .catch(error =>this.errors = error.response.data.errors)
            },


    },
};
</script>

<style type="text/css">
</style>

