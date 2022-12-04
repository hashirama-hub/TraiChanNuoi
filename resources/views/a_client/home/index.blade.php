@extends('a_client.layout._layout')

@section('title', 'Trang chủ')


@section('content')

<!-- <div class="recent_news_area">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-10">
        <div class="section_title text-center mb-70">
          <h3 class="mb-45">Giống heo</h3>
        </div>
      </div>
    </div>
    <div class="row">

      @foreach($giong as $item)
          <div class="col-md-4">
            <div class="single__news">
              <div class="thumb">
                <a href="#"  title="#">
                  <img src="{{ asset('client/img/' .$item->Anh) }}" alt="" style="height:300px">
                </a>
                <span class="badge">{{ $item->Ten }}</span>
              </div>
              <div class="news_info">
                <a href="#" title="">
                  <h4>{{ $item->Ten}}</h4>
                </a>
                <p class="d-flex align-items-center">
                  <span>
                    <i class="flaticon-calendar-1"></i> 
                    Giá / giống : {{ number_format($item->Gia) }}
                  </span> 

                </p>
              </div>
            </div>
          </div>

      @endforeach      
      

    </div>
  </div>
</div> -->

<div class="recent_news_area">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-10">
        <div class="section_title text-center mb-70">
          <h3 class="mb-455">Tin tức chăn nuôi heo </h3>
        </div>
      </div>
    </div>
    <div class="row">

      @foreach($query as $item)
          @php $url = '/tin-tuc/' . $item->Metatitle . '/' . $item->ID  @endphp
          <div class="col-md-4">
            <div class="single__news">
              <div class="thumb">
                <a href="{{ $url }}"  title="{{ $item->TieuDe }}">
                  <img src="{{ asset('assets/img/news/' .$item->Anh) }}" alt="">
                </a>
                <span class="badge">{{ $item->Ten }}</span>
              </div>
              <div class="news_info">
                <a href="{{ $url }}" title="{{ $item->TieuDe }}">
                  <h4>{{ Str::limit($item->TieuDe, 50) }}</h4>
                </a>
                <p class="d-flex align-items-center">
                  <span>
                    <i class="flaticon-calendar-1"></i> 
                    {{ Carbon\Carbon::parse($item->NgayDang)->format('d') }}, tháng {{ Carbon\Carbon::parse($item->NgayDang)->format('m Y') }}
                  </span> 

                {{--   <span> <i class="flaticon-comment"></i> 01 comments</span> --}}
                </p>
              </div>
            </div>
          </div>

      @endforeach      
      
      <div class="col-md-12 text-center">
        <nav class="blog-pagination justify-content-center d-flex">
          <ul class="pagination">

            @if($query->currentPage() > 1)
              <li class="page-item">
                <a href="{{ $query->url($query->currentPage() - 1)}}" class="page-link" aria-label="Previous">
                  <i class="ti-angle-left"></i>
                </a>
              </li>
            @endif

            @for($i = 1; $i <= $query->lastPage(); $i++)
              <li class="page-item {{ ($query->currentPage() == $i) ? 'active' : '' }}">
                <a class="page-link" href="{{ $query->url($i) }}">{{ $i }}</a>
              </li>
            @endfor
           
            @if($query->currentPage() < $query->lastPage())
              <li class="page-item">
                <a href="{{ $query->url($query->currentPage()+1) }}" class="page-link" aria-label="Next">
                  <i class="ti-angle-right"></i>
                </a>
              </li>
            @endif
            
          </ul>
        </nav>
      </div>


    </div>
  </div>
</div>

@endsection


