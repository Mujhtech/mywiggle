<div class="breadcrumb">
    <h1 class="mr-2">{{ $title }}</h1>
    <ul>
        <li><a href="{{ url()->previous() }}">Go back</a></li>
        <li>{{ $title }}</li>
    </ul>
</div>