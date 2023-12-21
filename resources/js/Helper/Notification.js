import axios from "axios";
import Swal from "sweetalert2";

class Notification {
    success(message) {
        Swal.fire({
            icon: "success",
            title: message,
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
        });
    }
    error(message) {
        Swal.fire({
            icon: "error",
            title: message,
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
        });
    }
    warning(message) {
        Swal.fire({
            icon: "warning",
            title: message,
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
        });
    }

    delete(){
        return Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          })
    }
    deleteMessage(){
        Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
    }


}

export default new Notification();
