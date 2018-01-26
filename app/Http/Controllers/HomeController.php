<?php

namespace App\Http\Controllers;

use App\person_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
class HomeController extends AuthedController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->get();
        $feedback = DB::table('feedback')->get();
        $user_applies = DB::table('user_applies')->get();
        return view('home', compact('users', 'feedback', 'user_applies'));
    }

    public function upload(Request $request)
    {
//        request()->validate([
//        'file_upload' => 'required|file|mimes:csv,xlsx|max:2048',
//        ]);

        $fileName = "潮友信息" . '.' . request()->file_upload->getClientOriginalExtension();
        $destine = public_path('files');
//        $path = $request->file('file_upload')->store($destine);
        request()->file_upload->move($destine, $fileName);
        $reader = new Xlsx();

        try {
            $spreadsheet = $reader->load($destine . '/' . $fileName);
            $worksheet = $spreadsheet->getActiveSheet();
            $highestRow = $worksheet->getHighestRow();
            for ($row = 2; $row <= $highestRow; ++$row) {
                    $info = new person_info();
                    $info->term = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $info->name = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $info->gender = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $info->school = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $info->major = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $info->verification_code = hash('md5',$info->term . $info->name);
                    $info->save();

            }

        } catch (Exception $e) {
            dd('需要上传.xlsx的Excel文件，或者文件格式问题~');
        } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
            dd('需要上传.xlsx的Excel文件，或者文件格式问题~');
        }

        return redirect('/home');
    }
}
