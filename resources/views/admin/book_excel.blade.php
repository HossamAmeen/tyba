<table class="table table-bordered table-striped table-bottomless" id="ls-editable-table">
    <thead>
        <tr>
            <th>#</th>

            <th>الاسم</th>
            <th>التلفون</th>
            <th>التخصص</th>
            <th>التاريخ</th>
            <th></th>

        </tr>
    </thead>
    <tbody>
        <?php
                                        $i=1;
                                        ?>
        @foreach ($books as $book)


        <tr>
            <td>{{$i++}}</td>

            <td>{{$book->name}}</td>
            <td>{{$book->phone}}</td>
            <td>{{$book->special}}</td>
            <td>{{$book->created_at}}</td>
            <td>
                @if($book->status == 0 )
                لم يتم التاكيد
                @else
                تم الحجز

                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>