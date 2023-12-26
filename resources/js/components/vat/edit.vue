
<template>
    <div>
        <div class="row">
            <router-link to="/all-vat" class="btn btn-primary">All Vat</router-link>
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
                      <h1 class="h4 text-gray-900 mb-4">Edit Vat</h1>
                    </div>
                    <div class="card-body">
                    <form class="user" @submit.prevent="vatUpdate" enctype="multipart/form-data">
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Vat Name</label>
                                <input type="text" class="form-control" id="vat_name" placeholder="Enter Vat Name" v-model="form.vat_name">
                                <small class="text-danger" v-if="errors.vat_name">{{ errors.vat_name[0] }}</small>
                            </div>
                        </div>

                      </div>
                      <div class="form-row">
                        <div class="col-md-6">
                            <label>Vat Percent</label>
                            <input type="text" class="form-control" id="vat_name" placeholder="Enter Vat Percent" v-model="form.vat_percent">
                            <small class="text-danger" v-if="errors.vat_percent">{{ errors.vat_percent[0] }}</small>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-2 mt-2">
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
                vat_name: '',
                vat_percent: '',
            },
            errors:{

            }
        };
    },
    created(){
        let id = this.$route.params.id
        axios.get('/api/vat/'+id)
        .then(({data}) => (this.form =data))
        .catch()
    },

    methods: {

        vatUpdate(){
            let id = this.$route.params.id
            axios.patch('/api/vat/'+id,this.form)
            .then(() => {
                this.$router.push({ name: 'all-vat'})
                Notification.success('Updated Successfully')
            })
            .catch(error =>this.errors = error.response.data.errors)
            },


    },
};
</script>

<style type="text/css">
</style>

