<template>
    <div>
        <div class="row">
            <router-link to="/all-category" class="btn btn-primary">All category</router-link>
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
                      <h1 class="h4 text-gray-900 mb-4">Add category</h1>
                    </div>
                    <div class="card-body">
                    <form class="user" @submit.prevent="categoryInsert" enctype="multipart/form-data">
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>category Name</label>
                                <input type="text" class="form-control" id="category_name" placeholder="Enter category Name" v-model="form.category_name">
                                <small class="text-danger" v-if="errors.category_name">{{ errors.category_name[0] }}</small>
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
                category_name: null,
            },
            errors:{

            }
        };
    },
    methods: {

        categoryInsert() {
            axios.post("/api/category", this.form)
                .then(() => {
                    Notification.success('Category Save in successfully');
                    this.$router.push({ name: 'all-category' });
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

