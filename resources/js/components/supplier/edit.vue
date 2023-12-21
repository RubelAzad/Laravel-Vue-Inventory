
<template>
    <div>
        <div class="row">
            <router-link to="/all-supplier" class="btn btn-primary">All supplier</router-link>
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
                      <h1 class="h4 text-gray-900 mb-4">Edit supplier</h1>
                    </div>
                    <div class="card-body">
                    <form class="user" @submit.prevent="supplierUpdate" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="Supplier" placeholder="Enter Supplier Name" v-model="form.supplier_name">
                                    <small class="text-danger" v-if="errors.supplier_name">{{ errors.supplier_name[0] }}</small>
                                </div>
                                <div class="col-md-6">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="supplier_email" aria-describedby="supplier_email"
                                    placeholder="Enter Email Address" v-model="form.supplier_email">
                                    <small class="text-danger" v-if="errors.supplier_email">{{ errors.supplier_email[0] }}</small>
                                </div>
                            </div>

                          </div>
                          <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Address</label>
                                    <input type="text" class="form-control" id="Address" placeholder="Enter Your Address" v-model="form.supplier_address">
                                </div>
                                <div class="col-md-6">
                                    <label>Phone</label>
                                    <input type="number" class="form-control" id="supplier_phone" aria-describedby="emailHelp"
                                    placeholder="Enter Your Phone" v-model="form.supplier_phone">
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Supplier Balance</label>
                                    <input type="text" class="form-control" id="supplier_balance" placeholder="Enter Your Balance" v-model="form.supplier_balance">
                                </div>
                            </div>
                          </div>


                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <input
                                    type="file"
                                    class="custom-file-input"
                                    id="customFile"
                                    @change="onFileSelected"
                                />
                                <small
                                    class="text-danger"
                                    v-if="errors.photo"
                                >
                                    {{ errors.photo[0] }}
                                </small>
                                <label
                                    class="custom-file-label"
                                    for="customFile"
                                    >Choose file</label
                                >
                            </div>
                            <div class="col-md-6">
                                <img
                                    :src="form.newPhoto"
                                    style="
                                        height: 40px;
                                        width: 40px;
                                    "
                                />
                            </div>
                        </div>
                    </div>



                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
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
        let id = this.$route.params.id
        axios.get('/api/supplier/'+id)
        .then(({data}) => (this.form =data))
        .catch()

    },
    data() {
        return {
            form: {
                supplier_name: '',
                supplier_email: '',
                supplier_phone: '',
                supplier_address: '',
                supplier_balance: '',
                phone: '',
                newPhoto: '',
            },
            errors:{},
        };
    },

    methods: {
        onFileSelected(event){
            let file = event.target.files[0];
            if (file.size > 1048770) {
            Notification.image_validation()
            }else{
            let reader = new FileReader();
            reader.onload = event =>{
                this.form.newPhoto = event.target.result

            };
            reader.readAsDataURL(file);
            }

        },
        supplierUpdate(){
            let id = this.$route.params.id
            axios.patch('/api/supplier/'+id,this.form)
            .then(() => {
                this.$router.push({ name: 'all-supplier'})
                Notification.success('Updated Successfully')
            })
            .catch(error =>this.errors = error.response.data.errors)
            },


    },
};
</script>

<style type="text/css">
    #em_photo{
        width: 40px;
        height: 40px;
    }
</style>

