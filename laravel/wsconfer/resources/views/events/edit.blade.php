@extends('app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="events/index.html">Manage Events</a></li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>{{$event->name}}</span>
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link active" href="{{route('showEvent', ['id' => $event->id])}}">Overview</a></li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Reports</span>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item"><a class="nav-link" href="reports/index.html">Room capacity</a></li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="border-bottom mb-3 pt-3 pb-2">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                    <h1 class="h2">{{$event->name}}</h1>
                </div>
            </div>

            <form class="needs-validation" novalidate action="" method="post"> @csrf

                <div class="row">
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="inputName">Name</label>
                        <!-- adding the class is-invalid to the input, shows the invalid feedback below -->
                        <input type="text" name="name" class="form-control @if ($errors->has('name')) is-invalid @endif" id="inputName" placeholder="" value="{{$event->name}}">
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                            {{$errors->first('name')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="inputSlug">Slug</label>
                        <input type="text" name="slug" class="form-control @if ($errors->has('slug')) is-invalid @endif" id="inputSlug" placeholder="" value="{{$event->slug}}">
                        @if ($errors->has('slug'))
                            <div class="invalid-feedback">
                            {{$errors->first('slug')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="inputDate">Date</label>
                        <input type="text"
                               name="date"
                               class="form-control @if ($errors->has('date')) is-invalid @endif"
                               id="inputDate"
                               placeholder="yyyy-mm-dd"
                               value="{{$event->date}}">
                        @if ($errors->has('date'))
                            <div class="invalid-feedback">
                                {{$errors->first('date')}}
                            </div>
                        @endif
                    </div>
                </div>

                <hr class="mb-4">
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{route('showEvent', ['id' => $event->id])}}" class="btn btn-link">Cancel</a>
            </form>

        </main>
    </div>
</div>

</body>
</html>
