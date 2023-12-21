<template>
    <div>
        <div class="row">
            <router-link to="/all-shift" class="btn btn-primary">All shift</router-link>
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
                      <h1 class="h4 text-gray-900 mb-4">Add shift</h1>
                    </div>
                    <div class="card-body">
                    <form class="user" @submit.prevent="shiftInsert" enctype="multipart/form-data">
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Shift Name</label>
                                <input type="text" class="form-control" id="shift_name" placeholder="Enter shift Name" v-model="form.shift_name">
                                <small class="text-danger" v-if="errors.name">{{ errors.shift_name[0] }}</small>
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
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
                shift_name: null,
            },
            errors:{

            }
        };
    },
    methods: {

        shiftInsert() {
            axios.post("/api/shift", this.form)
                .then(() => {
                    Notification.success('Shift Save in successfully');
                    this.$router.push({ name: 'all-shift' });
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },


    },
};
</script>

<style type="text/css">

</style>

