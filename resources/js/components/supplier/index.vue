<template>
    <div>
        <div class="row">
            <router-link to="/add-supplier" class="btn btn-primary">Add supplier</router-link>
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
                <div class="card-header d-flex flex-row align-items-center justify-content-between">

                    <select id="pageSize" v-model="pageSize" @change="updatePageSize" class="form-select">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <!-- Add more options as needed -->
                    </select>
                    <div class="col-md-3 mb-3">
                        <input type="text" id="search" v-model="searchTerm" class="form-control" placeholder="Search Here">
                    </div>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Supplier Name</th>
                        <th>Photo</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Balance</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <tr v-for="supplier in paginatedSuppliers" :key="supplier.id">
                        <td>{{ supplier.supplier_name }}</td>
                        <td><img :src="supplier.photo" alt="" id="em_photo"></td>
                        <td>{{ supplier.supplier_email }}</td>
                        <td>{{ supplier.supplier_phone }}</td>
                        <td>{{ supplier.supplier_address }}</td>
                        <td>{{ supplier.supplier_balance }}</td>
                        <td>
                            <router-link
                            :to="{name:'edit-supplier',params:{id:supplier.id}}"
                             class="btn btn-sm btn-primary mr-2"
                             >Edit</router-link
                         > |
                            <a @click="deletesupplier(supplier.id)" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                      </tr>

                    </tbody>
                  </table>
                   <!-- Pagination controls with all page numbers -->
                   <div class="pagination-container">
                        <div class="pagination">


                            <button @click="prevPage" :disabled="currentPage === 1" class="pagination-btn">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button
                                v-for="pageNumber in Array.from({ length: totalPages }, (_, index) => index + 1)"
                                :key="pageNumber"
                                @click="goToPage(pageNumber)"
                                :class="{ 'active': pageNumber === currentPage }"
                                class="pagination-btn"
                            >
                                {{ pageNumber }}
                            </button>
                            <button @click="nextPage" :disabled="currentPage === totalPages" class="pagination-btn">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
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
import Notification from "../../Helper/Notification";
import Swal from "sweetalert2";
export default {
    created(){
        if(!User.loggedIn()){
            this.$router.push({name:'/'})
        }
        this.allsupplier();
    },
    data() {
        return {
            suppliers: [],
            searchTerm: '',
            currentPage: 1,
            pageSize: 5,
            totalItems: 0,
        };
    },
    computed: {
        filteredSuppliers() {
            const searchTermLower = this.searchTerm.toLowerCase();
            return this.suppliers.filter(supplier => {
                console.log(this.suppliers)
                return (
                    (supplier.supplier_name && supplier.supplier_name.toLowerCase().includes(searchTermLower)) ||
                    (supplier.supplier_email && supplier.supplier_email.toLowerCase().includes(searchTermLower))||
                    (supplier.supplier_phone && supplier.supplier_phone.toLowerCase().includes(searchTermLower))
                );
            });
        },
        paginatedSuppliers() {
            const startIndex = (this.currentPage - 1) * this.pageSize;
            return this.filteredSuppliers.slice(startIndex, startIndex + this.pageSize);
        },
        totalPages() {
            return Math.ceil(this.filteredSuppliers.length / this.pageSize);
        },
    },
    methods: {
        allsupplier() {
            axios.get('/api/supplier')
                .then(({ data }) => {
                    console.log(data)
                    this.suppliers = data;
                    this.totalItems = data.length;
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },
        nextPage() {
            if (this.currentPage < this.totalPages) {
                this.currentPage++;
            }
        },
        prevPage() {
            if (this.currentPage > 1) {
                this.currentPage--;
            }
        },
        goToPage(pageNumber) {
            if (pageNumber > 0 && pageNumber <= this.totalPages) {
                this.currentPage = pageNumber;
            }
        },
        updatePageSize() {
            // You can add additional validation if needed
            if (this.pageSize > 0) {
                this.currentPage = 1; // Reset to the first page when changing page size
            }
        },
        deletesupplier(id){
            Notification.delete()
             .then((result) => {
              if (result.value) {
                axios.delete('/api/supplier/'+id)
               .then(() => {
                this.suppliers = this.suppliers.filter(supplier => {
                  return supplier.id != id
                })
               })
               .catch(() => {
                this.$router.push({name: 'supplier'})
               })
               Notification.deleteMessage()
              }
            })

        }
    },
};
</script>

<style>
#em_photo{
    height: 40px;
    width: 40px;
}
.pagination-container {
    display: flex;
    justify-content: center;
    margin-top: 20px;
    margin-bottom: 30px;
}

.pagination {
    display: flex;
    align-items: center;
}

.pagination-btn {
    background-color: #3498db;
    color: #fff;
    border: none;
    padding: 10px;
    margin: 0 5px;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.3s, color 0.3s;
    font-size: 14px;
}

.pagination-btn:hover {
    background-color: #2980b9;
}

.pagination-btn:disabled {
    background-color: #bdc3c7;
    color: #7f8c8d;
    cursor: not-allowed;
}

.pagination-pages {
    display: flex;
}

.pagination-btn.active {
    background-color: #2c3e50;
}

.pagination-btn i {
    font-size: 18px;
}
.pagination-btn {
    background-color: #3498db;
    color: #fff;
    border: none;
    padding: 10px;
    margin: 0 5px;
    cursor: pointer;
    border-radius: 20px; /* Adjust the value to make the button more or less round */
    transition: background-color 0.3s, color 0.3s;
    font-size: 14px;
    width: 40px;
    height: 40px;
}
</style>

