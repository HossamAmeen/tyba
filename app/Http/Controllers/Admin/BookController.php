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
        if(request('from_date'))
        {
            // return request('from_date');
            $data['from_date'] = request('from_date');
            $data['to_date'] = request('to_date');
            $books = Book::orderBy('id' , 'DESC')->whereDate('created_at' ,'>=', request('from_date'));
            if(request('to_date'))
            {
                $books = $books->whereDate('created_at' ,'<=', request('to_date'));
            }
            $books = $books->get();
            $data['books'] = $books;
        }
        else{
            $data['books'] = Book::orderBy('id' , 'DESC')->get() ; 
        }
       
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
