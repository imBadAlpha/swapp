@include('layouts.head', ['current_page' => 'My Posts'])

    @include('layouts.nav', ['current_page' => 'My Posts'])

    <main id="main" class="main">

        <!-- Modal for Posting an Item -->
        <div class="modal fade" id="postItemModal" tabindex="-1" aria-labelledby="postItemModalLabel" aria-hidden="true">
          <div class="modal-dialog text-dark">
          <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="postItemModalLabel">Post An Item</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" id="title" name="title" required>
                  </div>
                  <div class="form-group">
                      <label for="description">Description</label>
                      <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                  </div>
                  <label for="image">Item Image</label>
                  <input type="file" class="form-control" name="image" required/>
                  
                  <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Post</button>
                  </div>
                </form>
              </div>
          </div>
          </div>
        </div>

        <div class="pagetitle">
          <h1>My Posts</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
              <li class="breadcrumb-item active">My Posts</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->
    
        <section class="section dashboard">
          
          <div class="row">
            
            <!-- Left side columns -->
            <div class="col-lg-8">
              <div class="row mb-3 justify-content-center">
                <div class="col-lg-8">
                @if ($message = Session::get('success'))
                  <div class="alert alert-success alert-block">
                      <strong>{{ $message }}</strong>
                  </div>
                  <script>
                    // Hide the alert after 5 seconds
                    setTimeout(function() {
                      $('.alert').fadeOut('slow');
                    }, 5000);
                  </script>
                @endif
                </div>
              </div>
              <div class="row mb-3 justify-content-center">
                <div class="col-lg-8">
                  <a class="dashboard_btn " href="#" data-bs-toggle="modal" data-bs-target="#postItemModal">
                    <i class="bi bi-postcard-heart"></i> | <span class="">Post an Item</span>
                  </a>
                </div>
              </div>
              
              @foreach($posts as $post)

              <div class="row justify-content-center">
                <!-- Posts Card -->
                
                <div class="col-lg-8">
                  <div class="card info-card customers-card">
                    <div class="card-body">
                      <h5 class="card-title">{{ substr($post->user->first_name, 0, 1) }}. {{ $post->user->last_name }} <span class="text-muted small pt-2 ps-1"> {{ timeElapsedString($post->created_at) }} </span> </h5>
                      <div class="row">
                        <div class="col-lg-12 ps-3">
                          <h6>{{ $post->title }}</h6>
                          <span class="text-muted small py-2 ps-1">{{ $post->description }}</span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12"> 
                          <img src="{{ asset('storage/images/'. $post->image) }}" alt="{{ $post->title }}" class="d-block w-100 rounded my-2">
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-6">
                          <span class="text-muted small pt-2 ps-1" id="like-count-{{ $post->id }}">{{ $post->likers->count() }} Likes</span>
                          <span class="text-muted small pt-2 ps-1">{{ $post->offers->count() }} Offers</span>
                        </div>
                      </div>

                      <div class="row">
                        <div class="editPost col-lg-6 d-grid mt-3" data-post-id="{{ $post->id }}">
                          <button type="button" class="edit-post-btn btn btn-primary" data-bs-toggle="modal" data-bs-target="#editPostModal{{ $post->id }}">
                            Edit Post
                          </button>
                        </div>
                        <div class="deletePost col-lg-6 d-grid mt-3" data-post-id="{{ $post->id }}">
                          <button type="button" class="delete-post-btn btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $post->id }}">
                            Delete Post
                          </button>
                        </div>
                        
                        <span class="confirm-label-delete-post text-light text-center py-2 ps-1 col-lg-12" style="display: none;">Are you sure you want to delete this offer?</span>
                      
                      </div>

                      <!-- Confirm Delete Post Modal -->
                      <div class="modal fade" id="deleteModal{{ $post->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $post->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content text-dark">
                            <div class="modal-header">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <h4 class="text-center">Are you sure you want to delete this Post?</h4>
                              
                              <form id="deletePostForm{{ $post->id }}" action="{{ route('posts.destroy', $post->id) }}" method="POST"">
                                @csrf
                                @method('DELETE')
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Yes</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Modal For Editing Post -->
                      <div class="modal fade" id="editPostModal{{ $post->id }}" tabindex="-1" aria-labelledby="editPostModalLabel{{ $post->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content text-dark">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editPostModalLabel{{ $post->id }}">Edit Post</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form class="edit-post-form" action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $post->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" rows="3" required>{{ $post->description }}</textarea>
                                </div>
                                <label for="image">Item Image</label>
                                <input type="file" class="form-control" name="image"/>
                                
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                  <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
    
                </div>
                
                <!-- End Posts Card -->
    
              </div>
              @endforeach

              <div class="row justify-content-center">
                <div class="col-lg-8" >
                  {{ $posts->links() }}
                </div>
              </div>
              
            </div><!-- End Left side columns -->
    
            <!-- Right side columns -->
            <div class="col-lg-4">
    
              <!-- Recent Activity -->
              <div class="card">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
    
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
    
                <div class="card-body">
                  <h5 class="card-title">Recent Activity <span>| Today</span></h5>
    
                  <div class="activity">
    
                    <div class="activity-item d-flex">
                      <div class="activite-label">32 min</div>
                      <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                      <div class="activity-content">
                        Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                      </div>
                    </div><!-- End activity item-->
    
                    <div class="activity-item d-flex">
                      <div class="activite-label">56 min</div>
                      <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                      <div class="activity-content">
                        Voluptatem blanditiis blanditiis eveniet
                      </div>
                    </div><!-- End activity item-->
    
                    <div class="activity-item d-flex">
                      <div class="activite-label">2 hrs</div>
                      <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                      <div class="activity-content">
                        Voluptates corrupti molestias voluptatem
                      </div>
                    </div><!-- End activity item-->
    
                    <div class="activity-item d-flex">
                      <div class="activite-label">1 day</div>
                      <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                      <div class="activity-content">
                        Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                      </div>
                    </div><!-- End activity item-->
    
                    <div class="activity-item d-flex">
                      <div class="activite-label">2 days</div>
                      <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                      <div class="activity-content">
                        Est sit eum reiciendis exercitationem
                      </div>
                    </div><!-- End activity item-->
    
                    <div class="activity-item d-flex">
                      <div class="activite-label">4 weeks</div>
                      <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                      <div class="activity-content">
                        Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                      </div>
                    </div><!-- End activity item-->
    
                  </div>
    
                </div>
              </div><!-- End Recent Activity -->
    
              <!-- Budget Report -->
              <div class="card">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
    
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
    
                <div class="card-body pb-0">
                  <h5 class="card-title">Budget Report <span>| This Month</span></h5>
    
                  <div id="budgetChart" style="min-height: 400px;" class="echart"></div>
    
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                        legend: {
                          data: ['Allocated Budget', 'Actual Spending']
                        },
                        radar: {
                          // shape: 'circle',
                          indicator: [{
                              name: 'Sales',
                              max: 6500
                            },
                            {
                              name: 'Administration',
                              max: 16000
                            },
                            {
                              name: 'Information Technology',
                              max: 30000
                            },
                            {
                              name: 'Customer Support',
                              max: 38000
                            },
                            {
                              name: 'Development',
                              max: 52000
                            },
                            {
                              name: 'Marketing',
                              max: 25000
                            }
                          ]
                        },
                        series: [{
                          name: 'Budget vs spending',
                          type: 'radar',
                          data: [{
                              value: [4200, 3000, 20000, 35000, 50000, 18000],
                              name: 'Allocated Budget'
                            },
                            {
                              value: [5000, 14000, 28000, 26000, 42000, 21000],
                              name: 'Actual Spending'
                            }
                          ]
                        }]
                      });
                    });
                  </script>
    
                </div>
              </div><!-- End Budget Report -->
    
              <!-- Website Traffic -->
              <div class="card">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
    
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
    
                <div class="card-body pb-0">
                  <h5 class="card-title">Website Traffic <span>| Today</span></h5>
    
                  <div id="trafficChart" style="min-height: 400px;" class="echart"></div>
    
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      echarts.init(document.querySelector("#trafficChart")).setOption({
                        tooltip: {
                          trigger: 'item'
                        },
                        legend: {
                          top: '5%',
                          left: 'center'
                        },
                        series: [{
                          name: 'Access From',
                          type: 'pie',
                          radius: ['40%', '70%'],
                          avoidLabelOverlap: false,
                          label: {
                            show: false,
                            position: 'center'
                          },
                          emphasis: {
                            label: {
                              show: true,
                              fontSize: '18',
                              fontWeight: 'bold'
                            }
                          },
                          labelLine: {
                            show: false
                          },
                          data: [{
                              value: 1048,
                              name: 'Search Engine'
                            },
                            {
                              value: 735,
                              name: 'Direct'
                            },
                            {
                              value: 580,
                              name: 'Email'
                            },
                            {
                              value: 484,
                              name: 'Union Ads'
                            },
                            {
                              value: 300,
                              name: 'Video Ads'
                            }
                          ]
                        }]
                      });
                    });
                  </script>
    
                </div>
              </div><!-- End Website Traffic -->
    
              <!-- News & Updates Traffic -->
              <div class="card">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
    
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
    
                <div class="card-body pb-0">
                  <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>
    
                  <div class="news">
                    <div class="post-item clearfix">
                      <img src="assets/img/news-1.jpg" alt="">
                      <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
                      <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
                    </div>
    
                    <div class="post-item clearfix">
                      <img src="assets/img/news-2.jpg" alt="">
                      <h4><a href="#">Quidem autem et impedit</a></h4>
                      <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona nande...</p>
                    </div>
    
                    <div class="post-item clearfix">
                      <img src="assets/img/news-3.jpg" alt="">
                      <h4><a href="#">Id quia et et ut maxime similique occaecati ut</a></h4>
                      <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et totam...</p>
                    </div>
    
                    <div class="post-item clearfix">
                      <img src="assets/img/news-4.jpg" alt="">
                      <h4><a href="#">Laborum corporis quo dara net para</a></h4>
                      <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum cuder...</p>
                    </div>
    
                    <div class="post-item clearfix">
                      <img src="assets/img/news-5.jpg" alt="">
                      <h4><a href="#">Et dolores corrupti quae illo quod dolor</a></h4>
                      <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae dignissimos eius...</p>
                    </div>
    
                  </div><!-- End sidebar recent posts-->
    
                </div>
              </div><!-- End News & Updates -->
    
            </div><!-- End Right side columns -->
    
          </div>
        </section>
    
      </main><!-- End #main -->



@include('layouts.foot')
