<!--**********************************
            Sidebar start
        ***********************************-->
<div class="deznav">
    <div class="deznav-scroll">

        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>

            <li><a class="has-arrow ai-icon" aria-expanded="false">
                    <i class="fa-solid fa-circle-info"></i>
                    <span class="nav-text">About</span>
                </a>
                <ul aria-expanded="false">
                    <li>
                        <a href="{{route('about.index','inst=overview.project_overview')}}" class="ai-icon"
                           aria-expanded="false">

                            <i class="fa-solid fa-eye"></i>
                            <span class="nav-text">Project Overview</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('about.index','inst=goal.project_goal')}}" class="ai-icon"
                           aria-expanded="false">
                            <i class="fa-brands fa-golang"></i>
                            <span class="nav-text">Project Goal</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('about.index','inst=mission.mission')}}" class="ai-icon" aria-expanded="false">
                            <i class="fa-solid fa-person-circle-exclamation"></i>
                            <span class="nav-text">Mission</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('workingArea.index')}}" class="ai-icon" aria-expanded="false">
                            <i class="fa-solid fa-briefcase"></i>
                            <span class="nav-text">Working area</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('terms.index')}}" class="ai-icon" aria-expanded="false">
                            <i class="fa-regular fa-note-sticky"></i>
                            <span class="nav-text">Terms and conditions</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('privacy.index')}}" class="ai-icon" aria-expanded="false">
                            <i class="fa-solid fa-fingerprint"></i>
                            <span class="nav-text">Privacy Policy</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li><a class="has-arrow ai-icon" aria-expanded="false">
                    <i class="fa-solid fa-images"></i>
                    <span class="nav-text">Gallery</span>
                </a>
                <ul aria-expanded="false">
                    <li>
                        <a href="{{route('imageGallery.index')}}" class="ai-icon" aria-expanded="false">
                            <i class="fa-solid fa-image"></i>
                            <span class="nav-text">Photo Album</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('videoGallery.index')}}" class="ai-icon" aria-expanded="false">
                            <i class="fa-brands fa-youtube"></i>
                            <span class="nav-text">Video Gallery</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{route('successStories.index')}}" class="ai-icon" aria-expanded="false">
                    <i class="fa-solid fa-thumbs-up"></i>
                    <span class="nav-text">Success stories</span>
                </a>
            </li>
            <li>
                <a href="{{route('partner.index')}}" class="ai-icon" aria-expanded="false">
                    <i class="fa-solid fa-handshake"></i>
                    <span class="nav-text">Development Partner</span>
                </a>
            </li>
            <li>
                <a href="{{route('slider.index')}}" class="ai-icon" aria-expanded="false">
                    <i class="fa-brands fa-medium"></i>
                    <span class="nav-text">Sliders</span>
                </a>
            </li>
            <li>
                <a href="{{route('products.index')}}" class="ai-icon" aria-expanded="false">
                    <i class="fa-solid fa-basket-shopping"></i>
                    <span class="nav-text">Products</span>
                </a>
            </li>
            <li>
                <a href="{{route('knowledge.index')}}" class="ai-icon" aria-expanded="false">
                    <i class="fa-solid fa-chart-line"></i>
                    <span class="nav-text">Knowledge</span>
                </a>
            </li>
            <li>
                <a href="{{route('event.index')}}" class="ai-icon" aria-expanded="false">
                    <i class="fa-solid fa-calendar-minus"></i>
                    <span class="nav-text">Upcoming Events</span>
                </a>
            </li>

            <li>
                <a href="{{route('notice.index')}}" class="ai-icon" aria-expanded="false">
                    <i class="fa-solid fa-clipboard"></i>
                    <span class="nav-text">Notice & Job Circular</span>
                </a>
            </li>
            <li>
                <a href="{{route('faq.index')}}" class="ai-icon" aria-expanded="false">
                    <i class="fa-solid fa-circle-question"></i>
                    <span class="nav-text">FAQ</span>
                </a>
            </li>
            <li>
                <a href="{{route('beneficiaryLocations.index')}}" class="ai-icon" aria-expanded="false">
                    <i class="fa-solid fa-map-location"></i>
                    <span class="nav-text">Enterprise Location</span>
                </a>
            </li>
            <li><a class="has-arrow ai-icon" aria-expanded="false">
                    <i class="fa-solid fa-book-bookmark"></i>
                    <span class="nav-text">News And Blog</span>
                </a>
                <ul aria-expanded="false">
                    <li>
                        <a href="{{route('blog.index')}}" class="ai-icon" aria-expanded="false">
                            <i class="fa-brands fa-blogger-b"></i>
                            <span class="nav-text">Blog</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('news.index')}}" class="ai-icon" aria-expanded="false">
                            <i class="fa-solid fa-radio"></i>
                            <span class="nav-text">News</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" aria-expanded="false">
                    <i class="fa-solid fa-tower-cell"></i>
                    <span class="nav-text">Communication</span>
                </a>
                <ul aria-expanded="false">
                    <li>
                        <a href="{{route('contact.index')}}" class="ai-icon" aria-expanded="false">
                            <i class="fa-solid fa-address-book"></i>
                            <span class="nav-text">Contacts</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('links.index')}}" class="ai-icon" aria-expanded="false">
                            <i class="fa-solid fa-link"></i>
                            <span class="nav-text">Follow Links</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-label">Web Site</li>
            <li><a class="has-arrow ai-icon">
                    <span class="nav-text">Web Site</span>
                </a>
                <ul aria-expanded="false">
                    <li>
                        <a href="{{route('logo.index')}}" class="ai-icon" aria-expanded="false">
                            <i class="fa-brands fa-square-pied-piper"></i>
                            <span class="nav-text">Website Logo</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->
