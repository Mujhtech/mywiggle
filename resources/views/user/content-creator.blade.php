@extends('layout.user')
@section('content')

    <!-- breadcrumb -->
    <div class="gen-breadcrumb" style="background-image: url('{{ asset('assets/img/background/asset-54.jpg') }}');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="gen-breadcrumb-title">
                            <h1>
                                {{ $title }}
                            </h1>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item active">{{ $title }}</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- blog single -->
    <section class="gen-section-padding-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="gen-blog-post">
                        <div class="gen-blog-contain" style="background:#fff;color: #000;">
                            <h4 class="card-title mb-3"  style="color:#000">{{ $title }}</h4>
                            @if (auth()->check())
                                <div class="table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Video Number</th>
                                                <th>Video Name</th>
                                                <th>Duration</th>
                                                <th>Purchase</th>
                                                <th>Point</th>
                                                <th>Amount Earned</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (auth()->user()->myhistories->count() > 0)
                                                @foreach (auth()->user()->myhistories as $history)
                                                    <tr>
                                                        <td>{{ $history->video_number }}</td>
                                                        <td>{{ $history->video_name }}</td>
                                                        <td>{{ $history->duration }}</td>
                                                        <td>{{ $history->purchase }}</td>
                                                        <td>{{ $history->point }}</td>
                                                        <td>{{ $history->amount }}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6" style="text-align: center">No data available</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <h1>Login to check your history</h1>
                            @endif

                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-12 mt-4 mt-lg-0">
                    <div class="widget widget_search">
                        <form role="search" method="get" class="search-form" action="{{ route('web.search') }}">
                            <label>
                                <input type="search" class="search-field" placeholder="Search …" value="" name="s">
                            </label>
                            <button type="submit" class="search-submit"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog single -->


@endsection
