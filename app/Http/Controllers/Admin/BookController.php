<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
class BookController extends Controller
{
    public function index()
    {
        $data['books'] = Book::all();
        $data['title'] = 'عرض الحجوزات';
        return view('admin.control_panel.book',$data);
    }

    public function changeStatus(Request $request, $id)
    {
        
        $book = Book::find($id);
        if(!empty($book))
        {
            $book->status = 1 ;
            $book->save();
            $request->session()->flash('status', 'تم تاكي الحجز بنجاح');
        }

        return redirect()->route('books.index');
    }
    public function destroy(Request $request, $id)
    {
        $book = Book::find($id);
        if(!empty($book))
        {
            $book->delete();
            $request->session()->flash('delete', 'تم الحذف بنجاح');
        }

        return redirect()->route('books.index');
    }
    public  function  download(){
        return Excel::download(new UsersExport, 'books.xlsx');
    }
}
