<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::all();
        return response()->json($employees);
    }
    public function store(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:employees|max:255',
            'email' => 'required',

           ]);

         if ($request->photo) {
            $position= strpos($request->photo, ';');
            $sub=substr($request->photo, 0, $position);
            $ext=explode('/', $sub)[1];
            $name=time().".".$ext;
            $img=Image::make($request->photo)->resize(240,200);
            $upload_path='backend/employee/';
            $image_url=$upload_path.$name;
            $img->save($image_url);

            $employee = new Employee;
            $employee->name = $request->name;
            $employee->department_id = $request->department_id;
            $employee->designation_id = $request->designation_id;
            $employee->branch_id = $request->branch_id;
            $employee->shift_id = $request->shift_id;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->address = $request->address;
            $employee->salary = $request->salary;
            $employee->nid = $request->nid;
            $employee->joining_date = $request->joining_date;
            $employee->status = '1';
            $employee->created_by = $request->created_by;
            $employee->updated_by = $request->updated_by;
            $employee->photo = $image_url;
            $employee->save();



        }else{
           $employee = new Employee;
           $employee->name = $request->name;
           $employee->department_id = $request->department_id;
           $employee->designation_id = $request->designation_id;
           $employee->branch_id = $request->branch_id;
           $employee->shift_id = $request->shift_id;
           $employee->email = $request->email;
           $employee->phone = $request->phone;
           $employee->address = $request->address;
           $employee->salary = $request->salary;
           $employee->nid = $request->nid;
           $employee->joining_date = $request->joining_date;
           $employee->status = '1';
           $employee->created_by = $request->created_by;
           $employee->updated_by = $request->updated_by;
           $employee->save();

        }
    }
    public function show($id){
        $employee=Employee::where('id', $id)->first();
        return response()->json($employee);
    }

    public function update(Request $request,$id){
        $image=$request->newPhoto;
        if($image){
            $position= strpos($image, ';');
            $sub=substr($image, 0, $position);
            $ext=explode('/', $sub)[1];
            $name=time().".".$ext;
            $img=Image::make($image)->resize(240,200);
            $upload_path='backend/employee/';
            $image_url=$upload_path.$name;
            $success=$img->save($image_url);
            if($success){
                $img=Employee::find($id)->first();
                $image_path=$img->photo;
                $done=unlink($image_path);
                $update=Employee::find($id)->update([
                    'name' => $request->name,
                    'department_id' => $request->department_id,
                    'designation_id' => $request->designation_id,
                    'branch_id' => $request->branch_id,
                    'shift_id' => $request->shift_id,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'salary' => $request->salary,
                    'nid' => $request->nid,
                    'joining_date' => $request->joining_date,
                    'status' => '1',
                    'created_by' => $request->created_by,
                    'updated_by' => $request->updated_by,
                    'photo'=>$image_url,
                ]);
            }else{
                $update=Employee::find($id)->update([
                    'name' => $request->name,
                    'department_id' => $request->department_id,
                    'designation_id' => $request->designation_id,
                    'branch_id' => $request->branch_id,
                    'shift_id' => $request->shift_id,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'salary' => $request->salary,
                    'nid' => $request->nid,
                    'joining_date' => $request->joining_date,
                    'status' => '1',
                    'created_by' => $request->created_by,
                    'updated_by' => $request->updated_by,
                    'photo'=>$request->photo
                     ]);

            }

        }
        // $employee = new Employee;
        // $employee->name = $request->name;
        // $employee->department_id = $request->department_id;
        // $employee->designation_id = $request->designation_id;
        // $employee->branch_id = $request->branch_id;
        // $employee->shift_id = $request->shift_id;
        // $employee->email = $request->email;
        // $employee->phone = $request->phone;
        // $employee->address = $request->address;
        // $employee->salary = $request->salary;
        // $employee->nid = $request->nid;
        // $employee->joining_date = $request->joining_date;
        // $employee->status = '1';
        // $employee->created_by = $request->created_by;
        // $employee->updated_by = $request->updated_by;
        // $image = $request->newPhoto;

        // if ($image) {
        //  $position = strpos($image, ';');
        //  $sub = substr($image, 0, $position);
        //  $ext = explode('/', $sub)[1];

        //  $name = time().".".$ext;
        //  $img = Image::make($image)->resize(240,200);
        //  $upload_path = 'backend/employee/';
        //  $image_url = $upload_path.$name;
        //  $success = $img->save($image_url);

        //  if ($success) {
        //     $data['photo'] = $image_url;
        //     $img = Employee::find($id)->first();
        //     $image_path = $img->photo;
        //     $done = unlink($image_path);
        //     $user  = Employee::find($id)->update($data);
        //  }

        // }else{
        //     $oldphoto = $request->photo;
        //     $data['photo'] = $oldphoto;
        //     $user = Employee::find($id)->update($data);
        // }
    }

    public function destroy($id){
        $employee=Employee::find($id)->first();
        $photo=$employee->photo;

        if($photo){
            unlink($photo);
            Employee::find($id)->delete();

        }else{
            Employee::find($id)->delete();
        }
    }
}
