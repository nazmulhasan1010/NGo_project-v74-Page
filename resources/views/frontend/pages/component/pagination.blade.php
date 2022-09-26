@if($item>5)
    <nav aria-label="Page navigation example ">
        <ul class="pagination pagination-lg ">
            <li class="page-item {{$start===0?'disabled':''}}">
                <a class="page-link" href="?page={{$clickPage-1}}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only"></span>
                </a>
            </li>
            @for($i= 1; $i <= $page; $i++)
                <li class="page-item {{$clickPage == $i?'active-pagi':''}}"><a class="page-link" href="?page={{$i}}">{{$i}}</a></li>
            @endfor
            <li class="page-item {{$start>$item-6?'disabled':''}}">
                <a class="page-link" href="?page={{$clickPage+1}}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only"></span>
                </a>
            </li>
        </ul>
    </nav>
@endif
