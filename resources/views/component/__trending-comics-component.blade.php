<div class="trending-container">
    <div class="trending-headline">
        # Trending
    </div>
    <div class="trending-duration-container">
        {{-- <div class="trending-duration">
            <div class="trending-weekly">
            Weekly
            </div>
            <div class="trending-monthly">
            Monthly
            </div>
            <div class="trending-alltime">
            All Time
            </div>
        </div> --}}
            <ul class="nav nav-pills mb-3 rounded justify-content-center" style="background-color: rgb(69, 43, 78);" id="pills-tab" role="tablist">
              <li class="nav-item me-2" role="presentation">
                <button class="nav-link active" id="pills-weekly-tab" data-bs-toggle="pill" data-bs-target="#pills-weekly" type="button" role="tab" aria-controls="pills-weekly" aria-selected="true">Weekly</button>
              </li>
              <li class="nav-item me-2" role="presentation">
                <button class="nav-link" id="pills-monthly-tab" data-bs-toggle="pill" data-bs-target="#pills-monthly" type="button" role="tab" aria-controls="pills-monthly" aria-selected="false">Monthly</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-allTime-tab" data-bs-toggle="pill" data-bs-target="#pills-allTime" type="button" role="tab" aria-controls="pills-allTime" aria-selected="false">All Time</button>
              </li>
            </ul>
            
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-weekly" role="tabpanel" aria-labelledby="pills-weekly-tab">
                @include('component.__trending-comics-weekly-component')
              </div>
              <div class="tab-pane fade" id="pills-monthly" role="tabpanel" aria-labelledby="pills-monthly-tab">
                @include('component.__trending-comics-monthly-component')
              </div>
              <div class="tab-pane fade" id="pills-allTime" role="tabpanel" aria-labelledby="pills-allTime-tab">
                @include('component.__trending-comics-allTime-component')
              </div>
            </div> 
    </div>
</div>




