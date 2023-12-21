<template>
    <div>
        <div class="row">
            <router-link to="/add-category" class="btn btn-primary">Add category</router-link>
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
                        <th>id</th>
                        <th>category Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <tr v-for="category in paginatedcategorys" :key="category.id">
                        <td>{{ category.id }}</td>
                        <td>{{ category.category_name }}</td>

                        <td>
                            <router-link
                            :to="{name:'edit-category',params:{id:category.id}}"
                             class="btn btn-sm btn-primary mr-2"
                             >Edit</router-link
                         > |
                            <a @click="deletecategory(category.id)" class="btn btn-sm btn-danger">Delete</a>
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
        this.allcategory();
    },
    data() {
        return {
            categorys: [],
            searchTerm: '',
            currentPage: 1,
            pageSize: 5,
            totalItems: 0,
        };
    },
    computed: {
        filteredcategorys() {
            const searchTermLower = this.searchTerm.toLowerCase();
            return this.categorys.filter(category => {
                return (
                    (category.category_name && category.category_name.toLowerCase().includes(searchTermLower))
                );
            });
        },
        paginatedcategorys() {
            const startIndex = (this.currentPage - 1) * this.pageSize;
            return this.filteredcategorys.slice(startIndex, startIndex + this.pageSize);
        },
        totalPages() {
            return Math.ceil(this.filteredcategorys.length / this.pageSize);
        },
    },
    methods: {
        allcategory() {
            axios.get('/api/category')
                .then(({ data }) => {
                    this.categorys = data;
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
        deletecategory(id){
            Notification.delete()
             .then((result) => {
              if (result.value) {
                axios.delete('/api/category/'+id)
               .then(() => {
                this.categorys = this.categorys.filter(category => {
                  return category.id != id
                })
               })
               .catch(() => {
                this.$router.push({name: 'category'})
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

