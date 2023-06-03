@extends('frontend.layouts.post')
@section('title',$post->name)
@section('h1',$post->name)
@section('description',Str::ucfirst(Str::lower(str_replace("\r\n","",$post->meta_description))))

@section('widgets')
    {{ Widget::run('search') }}
    {{ Widget::run('vst_doc') }}
    {{ Widget::run('fresh_doc') }}
@endsection

@section('content')
    <main id="content" role="main">
        <!-- Article Description -->
        <div class="container content-space-t-3 content-space-t-lg-4 content-space-b-2">
            <div class="w-lg-65 mx-lg-auto">
                <div class="mb-4">
                    <h1 class="h2">{{$post->name}}</h1>
                </div>

                <div class="row align-items-sm-center mb-5">
                    <div class="col-sm-7 mb-4 mb-sm-0">
                        <!-- Media -->
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <img class="avatar avatar-circle" src="./assets/img/160x160/img9.jpg"
                                     alt="Image Description">
                            </div>

                            <div class="flex-grow-1 ms-3">
                                <h5 class="mb-0">
                                    <a class="text-dark" href="./blog-author-profile.html">Christina Kray</a>
                                </h5>
                                <span class="d-block small">1 day ago</span>
                            </div>
                        </div>
                        <!-- End Media -->
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-5">
                        <div class="d-flex justify-content-sm-end align-items-center">
                            <span class="text-cap mb-0 me-2">Share:</span>

                            <div class="d-flex gap-2">
                                <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="#">
                                    <i class="bi-facebook"></i>
                                </a>
                                <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="#">
                                    <i class="bi-twitter"></i>
                                </a>
                                <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="#">
                                    <i class="bi-instagram"></i>
                                </a>
                                <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="#">
                                    <i class="bi-telegram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->

                <p>{!! Str::replace('<hr />', ' ', $post->text) !!}</p>
            </div>



        </div>
        <!-- End Article Description -->

        <!-- User Profile -->
        <div class="container content-space-t-1">
            <div class="row justify-content-lg-center">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <h4>About the author</h4>
                    </div>

                    <!-- Media -->
                    <div class="d-sm-flex">
                        <div class="flex-shrink-0 mb-3 mb-sm-0">
                            <img class="avatar avatar-xl avatar-circle" src="./assets/img/160x160/img9.jpg"
                                 alt="Image Description">
                        </div>

                        <div class="flex-grow-1 ms-sm-4">
                            <!-- Media -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h3 class="mb-0">
                                    <a class="text-dark" href="./blog-author-profile.html">Christina Kray</a>
                                </h3>
                                <button type="button" class="btn btn-outline-primary btn-sm">
                                    <i class="bi-person-plus-fill me-1"></i> Follow
                                </button>
                            </div>
                            <!-- End Media -->

                            <p>Christina started his recruitment career on the agency side. Since then, she’s built a career
                                helping customers get the most out of HR technology. She’s currently a Customer Success
                                Specialist at Space and spends her time speaking to in-house recruiters all over the world -
                                helping them solve their recruitment challenges, and get the most out of our talent
                                acquisition software.</p>
                        </div>
                    </div>
                    <!-- End Media -->
                </div>
            </div>
        </div>
        <!-- End User Profile -->

        <!-- Comment -->
        <div class="container content-space-1 content-space-lg-3">
            <!-- Heading -->
            <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
                <h2>3 comments</h2>
            </div>
            <!-- End Heading -->

            <div class="row justify-content-lg-center">
                <div class="col-lg-8">
                    <!-- Comment -->
                    <ul class="list-comment">
                        <!-- Item -->
                        <li class="list-comment-item">
                            <!-- Media -->
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0">
                                    <img class="avatar avatar-circle" src="./assets/img/160x160/img3.jpg"
                                         alt="Image Description">
                                </div>

                                <div class="flex-grow-1 ms-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6>Dave Austin</h6>
                                        <span class="d-block small text-muted">1 day ago</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Media -->

                            <p>As a Special Education teacher this resonates so well with me. Fighting with gen ed teachers
                                to flatten for the students with learning disabilities. It also confirms some things for me
                                in my writing.</p>

                            <a class="link" href="#">Reply</a>

                            <!-- Comment -->
                            <ul class="list-comment">
                                <!-- Item -->
                                <li class="list-comment-item">
                                    <!-- Media -->
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="flex-shrink-0">
                                            <img class="avatar avatar-circle" src="./assets/img/160x160/img9.jpg"
                                                 alt="Image Description">
                                        </div>

                                        <div class="flex-grow-1 ms-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h6>Christina Kray</h6>
                                                <span class="d-block small text-muted">1 day ago</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Media -->

                                    <p>Love it Dave! We're all about keeping it up.</p>

                                    <a class="link" href="#">Reply</a>
                                </li>
                                <!-- End Item -->
                            </ul>
                            <!-- End Comment -->
                        </li>
                        <!-- End Item -->

                        <!-- Item -->
                        <li class="list-comment-item">
                            <!-- Media -->
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0">
                                    <img class="avatar avatar-circle" src="./assets/img/160x160/img8.jpg"
                                         alt="Image Description">
                                </div>

                                <div class="flex-grow-1 ms-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6>Hanna Wolfe</h6>
                                        <span class="d-block small text-muted">2 days ago</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Media -->

                            <p>Since our attention spans seem to be shrinking by the day — keeping it simple is more
                                important than ever.</p>

                            <a class="link" href="#">Reply</a>
                        </li>
                        <!-- End Item -->
                    </ul>
                    <!-- End Comment -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Comment -->

        <!-- Post a Comment -->
        <div class="container content-space-b-2">
            <!-- Heading -->
            <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
                <h2>Post a comment</h2>
            </div>
            <!-- End Heading -->

            <div class="row justify-content-lg-center">
                <div class="col-lg-8">
                    <!-- Card -->
                    <div class="card card-lg border shadow-none">
                        <div class="card-body">
                            <form>
                                <div class="d-grid gap-4">
                                    <!-- Form -->
                                    <div class="row">
                                        <div class="col-sm-6 mb-4 mb-sm-0">
                                            <label class="form-label" for="blogContactsFormFirstName">First name</label>
                                            <input type="text" class="form-control form-control-lg"
                                                   name="blogContactsFirstName" id="blogContactsFormFirstName"
                                                   placeholder="First name" aria-label="First name">
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="form-label" for="blogContactsFormLasttName">Last name</label>
                                            <input type="text" class="form-control form-control-lg"
                                                   name="blogContactsLastName" id="blogContactsFormLasttName"
                                                   placeholder="Last name" aria-label="Last name">
                                        </div>
                                    </div>
                                    <!-- End Form -->

                                    <!-- Form -->
                                    <span class="d-block">
                    <label class="form-label" for="blogContactsFormEmail">Your email</label>
                    <input type="email" class="form-control form-control-lg" name="blogContactsEmailName"
                           id="blogContactsFormEmail" placeholder="email@site.com" aria-label="email@site.com">
                  </span>
                                    <!-- End Form -->

                                    <!-- Form -->
                                    <span class="d-block">
                    <label class="form-label" for="blogContactsFormComment">Comment</label>
                    <textarea class="form-control form-control-lg" id="blogContactsFormComment"
                              name="blogContactsCommentName" placeholder="Leave your comment here..."
                              aria-label="Leave your comment here..." rows="5"></textarea>
                  </span>
                                    <!-- End Form -->

                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Post a Comment -->

        <!-- Card Grid -->
        <div class="container">
            <div class="w-lg-75 border-top content-space-2 mx-lg-auto">
                <!-- Heading -->
                <div class="mb-3 mb-sm-5">
                    <h2>Related articles</h2>
                </div>
                <!-- End Heading -->

                <div class="row">
                    <div class="col-md-6">
                        <!-- Card -->
                        <div class="border-bottom h-100 py-5">
                            <div class="row justify-content-between">
                                <div class="col-6">
                                    <a class="text-cap" href="#">Product</a>
                                    <h4 class="mb-0">
                                        <a class="text-dark" href="./blog-article.html">Better is when everything works
                                            together</a>
                                    </h4>
                                </div>
                                <!-- End Col -->

                                <div class="col-5">
                                    <img class="img-fluid rounded" src="./assets/img/500x280/img1.jpg"
                                         alt="Image Description">
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- End Col -->

                    <div class="col-md-6">
                        <!-- Card -->
                        <div class="border-bottom h-100 py-5">
                            <div class="row justify-content-between">
                                <div class="col-6">
                                    <a class="text-cap" href="#">Tech</a>
                                    <h4 class="mb-0">
                                        <a class="text-dark" href="./blog-article.html">Should You Buy An Apple Pencil?</a>
                                    </h4>
                                </div>
                                <!-- End Col -->

                                <div class="col-5">
                                    <img class="img-fluid rounded" src="./assets/img/500x280/img3.jpg"
                                         alt="Image Description">
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- End Col -->

                    <div class="col-md-6">
                        <!-- Card -->
                        <div class="border-bottom h-100 py-5">
                            <div class="row justify-content-between">
                                <div class="col-6">
                                    <a class="text-cap" href="#">Product</a>
                                    <h4 class="mb-0">
                                        <a class="text-dark" href="./blog-article.html">This Watch gym partnerships give you
                                            perks for working out</a>
                                    </h4>
                                </div>
                                <!-- End Col -->

                                <div class="col-5">
                                    <img class="img-fluid rounded" src="./assets/img/500x280/img5.jpg"
                                         alt="Image Description">
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- End Col -->

                    <div class="col-md-6">
                        <!-- Card -->
                        <div class="border-bottom h-100 py-5">
                            <div class="row justify-content-between">
                                <div class="col-6">
                                    <a class="text-cap" href="#">Tech</a>
                                    <h4 class="mb-0">
                                        <a class="text-dark" href="./blog-article.html">Drone Company PrecisionHawk Names
                                            New CEO</a>
                                    </h4>
                                </div>
                                <!-- End Col -->

                                <div class="col-5">
                                    <img class="img-fluid rounded" src="./assets/img/500x280/img7.jpg"
                                         alt="Image Description">
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Card Grid -->

        <!-- Subscribe -->
        <div class="container content-space-2 content-space-b-lg-3">
            <!-- Heading -->
            <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
                <h2>Stay in the know</h2>
                <p>Get special offers on the latest developments from Space.</p>
            </div>
            <!-- End Heading -->

            <div class="text-center mx-auto" style="max-width: 32rem;">
                <form>
                    <!-- Input Card -->
                    <div class="input-card input-card-sm border mb-5">
                        <div class="input-card-form">
                            <input type="text" class="form-control" placeholder="Your email" aria-label="Your email">
                        </div>
                        <button type="button" class="btn btn-primary">Subscribe</button>
                    </div>
                    <!-- End Input Card -->
                </form>

                <a class="link" href="./page-login.html">Create a free account <i
                        class="bi-chevron-right small ms-1"></i></a>
            </div>
        </div>
        <!-- End Subscribe -->
    </main>
    <div class="rw-row">
        <div class="blog-single clearfix">
            <div class="entry post">
                <div class="entry-details">
                    <div class="post">
                        {!! Str::replace('<hr />', ' ', $post->text) !!}
                    </div>
                </div>
                <div class="clear"></div>
            </div> <!-- .entry -->
        </div>
        <div class="clear"></div>
    </div> <!-- .rw-row -->
@endsection



