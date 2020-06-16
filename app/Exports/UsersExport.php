<?php

namespace App\Exports;

use App\Book;
use App\User;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
   /* public function collection()
    {
        return User::all();
    }*/
    public function view(): View
    {
        if(request('from_date'))
        {
            $books = Book::orderBy('id' , 'DESC')->whereDate('created_at' ,'>=', request('from_date'));
            if(request('to_date'))
            {
                $books = $books->whereDate('created_at' ,'<=', request('to_date'));
            }
            $books = $books->get();
        }
        else
       $books = Book::all();
      
        return view('admin.book_excel') ->with(compact('books' )
        );
    }
}

