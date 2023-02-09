<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="javascript:void(0)">
            <i data-feather="settings"></i>
        </a>
        <img class="img-90 rounded-circle" src="/assets/images/dashboard/1.png" alt="">
        <div class="badge-bottom">
            <span class="badge badge-primary">New</span>
        </div>
        <a href="/theme/user-profile.html">
            <h6 class="mt-3 f-14 f-w-600">{{auth()->user()->eo->name_eo ?? 'EO'}}</h6>
        </a>
        <p class="mb-0 font-roboto">{{auth()->user()->username}}</p>
        <ul>
            <li>
                <span>
                    <span class="counter">{{auth()->user()->events->count()}}</span>

                </span>
                <p>Events</p>
            </li>
            <li>
                @php
                    $events =  auth()->user()->events;
                    $jumlahorder = 0;
                    foreach ($events as $e => $event) {
                        $tickets = $event->tickets;
                        foreach ($tickets as $t => $ticket) {
                            $jumlahorder = $jumlahorder + $ticket->orderdetails->count();
                        }
                    }
                @endphp
                <span>{{$jumlahorder}} Tickets </span>
                <p>Sold</p>
            </li>
            <li>
                <span>
                    <span class="counter">95.2</span>
                    k
                </span>
                <p>Follower </p>
            </li>
        </ul>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow">
                <i data-feather="arrow-left"></i>
            </div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end">
                            <span>Back</span>
                            <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                        </div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>General             </h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav {{$dashboardac ?? ''}}" href="{{route('EO')}}">
                            <i data-feather="home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav {{$eventsayaac ?? ''}}" href="{{route('event.index')}}">
                            <i data-feather="youtube"></i>
                            <span>Event Saya</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav {{$transaksiac ?? ''}}" href="/theme/jsgrid-table.html">
                            <i data-feather="briefcase"></i>
                            <span>Transaksi</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav {{$payoutsac ?? ''}}" href="/theme/jsgrid-table.html">
                            <i data-feather="dollar-sign"></i>
                            <span>Payouts</span>
                        </a>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Pengaturan             </h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav {{$profileac ?? ''}}" href="#">
                            <i data-feather="user"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="#">
                            <i data-feather="log-out"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>General             </h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="home"></i>
                            <span>Dashboard</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/index.html">Default</a>
                            </li>
                            <li>
                                <a href="/theme/dashboard-02.html">Ecommerce</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="airplay"></i>
                            <span>Widgets</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/general-widget.html">General</a>
                            </li>
                            <li>
                                <a href="/theme/chart-widget.html">Chart</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="layout"></i>
                            <span>Page layout</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/box-layout.html">Boxed</a>
                            </li>
                            <li>
                                <a href="/theme/layout-rtl.html">RTL</a>
                            </li>
                            <li>
                                <a href="/theme/layout-dark.html">Dark</a>
                            </li>
                            <li>
                                <a href="/theme/footer-light.html">Footer Light</a>
                            </li>
                            <li>
                                <a href="/theme/footer-dark.html">Footer Dark</a>
                            </li>
                            <li>
                                <a href="/theme/footer-fixed.html">Footer Fixed</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Components             </h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="box"></i>
                            <span>Ui Kits</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/state-color.html">State color</a>
                            </li>
                            <li>
                                <a href="/theme/typography.html">Typography</a>
                            </li>
                            <li>
                                <a href="/theme/avatars.html">Avatars</a>
                            </li>
                            <li>
                                <a href="/theme/helper-classes.html">helper classes</a>
                            </li>
                            <li>
                                <a href="/theme/grid.html">Grid</a>
                            </li>
                            <li>
                                <a href="/theme/tag-pills.html">Tag & pills</a>
                            </li>
                            <li>
                                <a href="/theme/progress-bar.html">Progress</a>
                            </li>
                            <li>
                                <a href="/theme/modal.html">Modal</a>
                            </li>
                            <li>
                                <a href="/theme/alert.html">Alert</a>
                            </li>
                            <li>
                                <a href="/theme/popover.html">Popover</a>
                            </li>
                            <li>
                                <a href="/theme/tooltip.html">Tooltip</a>
                            </li>
                            <li>
                                <a href="/theme/loader.html">Spinners</a>
                            </li>
                            <li>
                                <a href="/theme/dropdown.html">Dropdown</a>
                            </li>
                            <li>
                                <a href="/theme/according.html">Accordion</a>
                            </li>
                            <li>
                                <a class="submenu-title" href="javascript:void(0)">
                                    Tabs
                                    <span class="sub-arrow">
                                        <i class="fa fa-chevron-right"></i>
                                    </span>
                                </a>
                                <ul class="nav-sub-childmenu submenu-content">
                                    <li>
                                        <a href="/theme/tab-bootstrap.html">Bootstrap Tabs</a>
                                    </li>
                                    <li>
                                        <a href="/theme/tab-material.html">Line Tabs</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="/theme/navs.html">Navs</a>
                            </li>
                            <li>
                                <a href="/theme/box-shadow.html">Shadow</a>
                            </li>
                            <li>
                                <a href="/theme/list.html">Lists</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="folder-plus"></i>
                            <span>Bonus Ui</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/scrollable.html">Scrollable</a>
                            </li>
                            <li>
                                <a href="/theme/tree.html">Tree view</a>
                            </li>
                            <li>
                                <a href="/theme/bootstrap-notify.html">Bootstrap Notify</a>
                            </li>
                            <li>
                                <a href="/theme/rating.html">Rating</a>
                            </li>
                            <li>
                                <a href="/theme/dropzone.html">dropzone</a>
                            </li>
                            <li>
                                <a href="/theme/tour.html">Tour</a>
                            </li>
                            <li>
                                <a href="/theme/sweet-alert2.html">SweetAlert2</a>
                            </li>
                            <li>
                                <a href="/theme/modal-animated.html">Animated Modal</a>
                            </li>
                            <li>
                                <a href="/theme/owl-carousel.html">Owl Carousel</a>
                            </li>
                            <li>
                                <a href="/theme/ribbons.html">Ribbons</a>
                            </li>
                            <li>
                                <a href="/theme/pagination.html">Pagination</a>
                            </li>
                            <li>
                                <a href="/theme/steps.html">Steps</a>
                            </li>
                            <li>
                                <a href="/theme/breadcrumb.html">Breadcrumb</a>
                            </li>
                            <li>
                                <a href="/theme/range-slider.html">Range Slider</a>
                            </li>
                            <li>
                                <a href="/theme/image-cropper.html">Image cropper</a>
                            </li>
                            <li>
                                <a href="/theme/sticky.html">Sticky         </a>
                            </li>
                            <li>
                                <a href="/theme/basic-card.html">Basic Card</a>
                            </li>
                            <li>
                                <a href="/theme/creative-card.html">Creative Card</a>
                            </li>
                            <li>
                                <a href="/theme/tabbed-card.html">Tabbed Card</a>
                            </li>
                            <li>
                                <a href="/theme/dragable-card.html">Draggable Card</a>
                            </li>
                            <li>
                                <a class="submenu-title" href="javascript:void(0)">
                                    Timeline
                                    <span class="sub-arrow">
                                        <i class="fa fa-chevron-right"></i>
                                    </span>
                                </a>
                                <ul class="nav-sub-childmenu submenu-content">
                                    <li>
                                        <a href="/theme/timeline-v-1.html">Timeline 1</a>
                                    </li>
                                    <li>
                                        <a href="/theme/timeline-v-2.html">Timeline 2</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="edit-3"></i>
                            <span>Builders</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/form-builder-1.html">Form Builder 1</a>
                            </li>
                            <li>
                                <a href="/theme/form-builder-2.html">Form Builder 2</a>
                            </li>
                            <li>
                                <a href="/theme/pagebuild.html">Page Builder</a>
                            </li>
                            <li>
                                <a href="/theme/button-builder.html">Button Builder</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="cloud-drizzle"></i>
                            <span>Animation</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/animate.html">Animate</a>
                            </li>
                            <li>
                                <a href="/theme/scroll-reval.html">Scroll Reveal</a>
                            </li>
                            <li>
                                <a href="/theme/AOS.html">AOS animation</a>
                            </li>
                            <li>
                                <a href="/theme/tilt.html">Tilt Animation</a>
                            </li>
                            <li>
                                <a href="/theme/wow.html">Wow Animation</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="command"></i>
                            <span>Icons</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/flag-icon.html">Flag icon</a>
                            </li>
                            <li>
                                <a href="/theme/font-awesome.html">Fontawesome Icon</a>
                            </li>
                            <li>
                                <a href="/theme/ico-icon.html">Ico Icon</a>
                            </li>
                            <li>
                                <a href="/theme/themify-icon.html">Thimify Icon</a>
                            </li>
                            <li>
                                <a href="/theme/feather-icon.html">Feather icon</a>
                            </li>
                            <li>
                                <a href="/theme/whether-icon.html">Whether Icon             </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="cloud"></i>
                            <span>Buttons</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/buttons.html">Default Style</a>
                            </li>
                            <li>
                                <a href="/theme/buttons-flat.html">Flat Style</a>
                            </li>
                            <li>
                                <a href="/theme/buttons-edge.html">Edge Style</a>
                            </li>
                            <li>
                                <a href="/theme/raised-button.html">Raised Style</a>
                            </li>
                            <li>
                                <a href="/theme/button-group.html">Button Group</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="bar-chart"></i>
                            <span>Charts</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/chart-apex.html">Apex Chart</a>
                            </li>
                            <li>
                                <a href="/theme/chart-google.html">Google Chart</a>
                            </li>
                            <li>
                                <a href="/theme/chart-sparkline.html">Sparkline chart</a>
                            </li>
                            <li>
                                <a href="/theme/chart-flot.html">Flot Chart</a>
                            </li>
                            <li>
                                <a href="/theme/chart-knob.html">Knob Chart</a>
                            </li>
                            <li>
                                <a href="/theme/chart-morris.html">Morris Chart</a>
                            </li>
                            <li>
                                <a href="/theme/chartjs.html">Chatjs Chart</a>
                            </li>
                            <li>
                                <a href="/theme/chartist.html">Chartist Chart</a>
                            </li>
                            <li>
                                <a href="/theme/chart-peity.html">Peity Chart</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Forms</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="sliders"></i>
                            <span>Form Controls                </span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/form-validation.html">Form Validation</a>
                            </li>
                            <li>
                                <a href="/theme/base-input.html">Base Inputs</a>
                            </li>
                            <li>
                                <a href="/theme/radio-checkbox-control.html">Checkbox & Radio</a>
                            </li>
                            <li>
                                <a href="/theme/input-group.html">Input Groups</a>
                            </li>
                            <li>
                                <a href="/theme/megaoptions.html">Mega Options </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="package"></i>
                            <span>Form Widgets</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/datepicker.html">Datepicker</a>
                            </li>
                            <li>
                                <a href="/theme/time-picker.html">Timepicker</a>
                            </li>
                            <li>
                                <a href="/theme/datetimepicker.html">Datetimepicker</a>
                            </li>
                            <li>
                                <a href="/theme/daterangepicker.html">Daterangepicker</a>
                            </li>
                            <li>
                                <a href="/theme/touchspin.html">Touchspin</a>
                            </li>
                            <li>
                                <a href="/theme/select2.html">Select2</a>
                            </li>
                            <li>
                                <a href="/theme/switch.html">Switch</a>
                            </li>
                            <li>
                                <a href="/theme/typeahead.html">Typeahead</a>
                            </li>
                            <li>
                                <a href="/theme/clipboard.html">Clipboard </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="layout"></i>
                            <span>Form layout</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/default-form.html">Default Forms</a>
                            </li>
                            <li>
                                <a href="/theme/form-wizard.html">Form Wizard 1</a>
                            </li>
                            <li>
                                <a href="/theme/form-wizard-two.html">Form Wizard 2</a>
                            </li>
                            <li>
                                <a href="/theme/form-wizard-three.html">Form Wizard 3</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Table</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="server"></i>
                            <span>Bootstrap Tables             </span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/bootstrap-basic-table.html">Basic Tables</a>
                            </li>
                            <li>
                                <a href="/theme/bootstrap-sizing-table.html">Sizing Tables</a>
                            </li>
                            <li>
                                <a href="/theme/bootstrap-border-table.html">Border Tables</a>
                            </li>
                            <li>
                                <a href="/theme/bootstrap-styling-table.html">Styling Tables</a>
                            </li>
                            <li>
                                <a href="/theme/table-components.html">Table components</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="database"></i>
                            <span>Data Tables   </span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/datatable-basic-init.html">Basic Init</a>
                            </li>
                            <li>
                                <a href="/theme/datatable-advance.html">Advance Init</a>
                            </li>
                            <li>
                                <a href="/theme/datatable-styling.html">Styling</a>
                            </li>
                            <li>
                                <a href="/theme/datatable-AJAX.html">AJAX</a>
                            </li>
                            <li>
                                <a href="/theme/datatable-server-side.html">Server Side</a>
                            </li>
                            <li>
                                <a href="/theme/datatable-plugin.html">Plug-in</a>
                            </li>
                            <li>
                                <a href="/theme/datatable-API.html">API</a>
                            </li>
                            <li>
                                <a href="/theme/datatable-data-source.html">Data Sources</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="hard-drive"></i>
                            <span>Ex. Data Tables  </span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/datatable-ext-autofill.html">Auto Fill</a>
                            </li>
                            <li>
                                <a href="/theme/datatable-ext-basic-button.html">Basic Button</a>
                            </li>
                            <li>
                                <a href="/theme/datatable-ext-col-reorder.html">Column Reorder</a>
                            </li>
                            <li>
                                <a href="/theme/datatable-ext-fixed-header.html">Fixed Header</a>
                            </li>
                            <li>
                                <a href="/theme/datatable-ext-key-table.html">Key Table</a>
                            </li>
                            <li>
                                <a href="/theme/datatable-ext-responsive.html">Responsive</a>
                            </li>
                            <li>
                                <a href="/theme/datatable-ext-row-reorder.html">Row Reorder</a>
                            </li>
                            <li>
                                <a href="/theme/datatable-ext-scroller.html">Scroller                      </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="/theme/jsgrid-table.html">
                            <i data-feather="file-text"></i>
                            <span>Js Grid Table</span>
                        </a>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Applications             </h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="box"></i>
                            <span>Project                </span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/projects.html">Project List</a>
                            </li>
                            <li>
                                <a href="/theme/projectcreate.html">Create new             </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="/theme/file-manager.html">
                            <i data-feather="git-pull-request"></i>
                            <span>File manager</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="/theme/kanban.html">
                            <i data-feather="monitor"></i>
                            <span>kanban Board</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="shopping-bag"></i>
                            <span>Ecommerce</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/product.html">Product</a>
                            </li>
                            <li>
                                <a href="/theme/product-page.html">Product page</a>
                            </li>
                            <li>
                                <a href="/theme/list-products.html">Product list</a>
                            </li>
                            <li>
                                <a href="/theme/payment-details.html">Payment Details</a>
                            </li>
                            <li>
                                <a href="/theme/order-history.html">Order History</a>
                            </li>
                            <li>
                                <a href="/theme/invoice-template.html">Invoice</a>
                            </li>
                            <li>
                                <a href="/theme/cart.html">Cart</a>
                            </li>
                            <li>
                                <a href="/theme/list-wish.html">Wishlist</a>
                            </li>
                            <li>
                                <a href="/theme/checkout.html">Checkout</a>
                            </li>
                            <li>
                                <a href="/theme/pricing.html">Pricing</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="mail"></i>
                            <span>Email</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/email_inbox.html">Mail Inbox</a>
                            </li>
                            <li>
                                <a href="/theme/email_read.html">Read mail</a>
                            </li>
                            <li>
                                <a href="/theme/email_compose.html">Compose</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="message-circle"></i>
                            <span>Chat</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/chat.html">Chat App</a>
                            </li>
                            <li>
                                <a href="/theme/chat-video.html">Video chat</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="users"></i>
                            <span>Users</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/user-profile.html">Users Profile</a>
                            </li>
                            <li>
                                <a href="/theme/edit-profile.html">Users Edit</a>
                            </li>
                            <li>
                                <a href="/theme/user-cards.html">Users Cards</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="/theme/bookmark.html">
                            <i data-feather="heart"></i>
                            <span>Bookmarks</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="/theme/contacts.html">
                            <i data-feather="list"></i>
                            <span>Contacts</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="/theme/task.html">
                            <i data-feather="check-square"></i>
                            <span>Tasks</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="/theme/calendar-basic.html">
                            <i data-feather="calendar"></i>
                            <span>Calender        </span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="/theme/social-app.html">
                            <i data-feather="zap"></i>
                            <span>Social App</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="/theme/to-do.html">
                            <i data-feather="clock"></i>
                            <span>To-Do</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="/theme/search.html">
                            <i data-feather="search"></i>
                            <span>Search Result</span>
                        </a>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Pages             </h6>
                        </div>
                    </li>
                    <li>
                        <a class="nav-link menu-title link-nav" href="/theme/landing-page.html">
                            <i data-feather="navigation-2"></i>
                            <span>Landing page</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link menu-title link-nav" href="/theme/sample-page.html">
                            <i data-feather="file"></i>
                            <span>Sample page</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="/theme/internationalization.html">
                            <i data-feather="aperture"></i>
                            <span>Internationalization</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="/starter-kit/index.html">
                            <i data-feather="anchor"></i>
                            <span>Starter kit   </span>
                        </a>
                    </li>
                    <li class="mega-menu">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="layers"></i>
                            <span>Others</span>
                        </a>
                        <div class="mega-menu-container menu-content">
                            <div class="container">
                                <div class="row">
                                    <div class="col mega-box">
                                        <div class="link-section">
                                            <div class="submenu-title">
                                                <h5>Error Page</h5>
                                            </div>
                                            <div class="submenu-content opensubmegamenu">
                                                <ul>
                                                    <li>
                                                        <a href="/theme/error-page1.html" target="_blank">Error page 1</a>
                                                    </li>
                                                    <li>
                                                        <a href="/theme/error-page2.html" target="_blank">Error page 2</a>
                                                    </li>
                                                    <li>
                                                        <a href="/theme/error-page3.html" target="_blank">Error page 3</a>
                                                    </li>
                                                    <li>
                                                        <a href="/theme/error-page4.html" target="_blank">Error page 4                         </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mega-box">
                                        <div class="link-section">
                                            <div class="submenu-title">
                                                <h5> Authentication</h5>
                                            </div>
                                            <div class="submenu-content opensubmegamenu">
                                                <ul>
                                                    <li>
                                                        <a href="/theme/login.html" target="_blank">Login Simple</a>
                                                    </li>
                                                    <li>
                                                        <a href="/theme/login_one.html" target="_blank">Login with bg image</a>
                                                    </li>
                                                    <li>
                                                        <a href="/theme/login_two.html" target="_blank">Login with image two                      </a>
                                                    </li>
                                                    <li>
                                                        <a href="/theme/login-bs-validation.html" target="_blank">Login With validation</a>
                                                    </li>
                                                    <li>
                                                        <a href="/theme/login-bs-tt-validation.html" target="_blank">Login with tooltip</a>
                                                    </li>
                                                    <li>
                                                        <a href="/theme/login-sa-validation.html" target="_blank">Login with sweetalert</a>
                                                    </li>
                                                    <li>
                                                        <a href="/theme/sign-up.html" target="_blank">Register Simple</a>
                                                    </li>
                                                    <li>
                                                        <a href="/theme/sign-up-one.html" target="_blank">Register with Bg Image                              </a>
                                                    </li>
                                                    <li>
                                                        <a href="/theme/sign-up-two.html" target="_blank">Register with Bg video                          </a>
                                                    </li>
                                                    <li>
                                                        <a href="/theme/unlock.html">Unlock User</a>
                                                    </li>
                                                    <li>
                                                        <a href="/theme/forget-password.html">Forget Password</a>
                                                    </li>
                                                    <li>
                                                        <a href="/theme/creat-password.html">Creat Password</a>
                                                    </li>
                                                    <li>
                                                        <a href="/theme/maintenance.html">Maintenance</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mega-box">
                                        <div class="link-section">
                                            <div class="submenu-title">
                                                <h5>Coming Soon</h5>
                                            </div>
                                            <div class="submenu-content opensubmegamenu">
                                                <ul>
                                                    <li>
                                                        <a href="/theme/comingsoon.html">Coming Simple</a>
                                                    </li>
                                                    <li>
                                                        <a href="/theme/comingsoon-bg-video.html">Coming with Bg video</a>
                                                    </li>
                                                    <li>
                                                        <a href="/theme/comingsoon-bg-img.html">Coming with Bg Image</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mega-box">
                                        <div class="link-section">
                                            <div class="submenu-title">
                                                <h5>Email templates</h5>
                                            </div>
                                            <div class="submenu-content opensubmegamenu">
                                                <ul>
                                                    <li>
                                                        <a href="/theme/basic-template.html">Basic Email</a>
                                                    </li>
                                                    <li>
                                                        <a href="/theme/email-header.html">Basic With Header</a>
                                                    </li>
                                                    <li>
                                                        <a href="/theme/template-email.html">Ecomerce Template</a>
                                                    </li>
                                                    <li>
                                                        <a href="/theme/template-email-2.html">Email Template 2</a>
                                                    </li>
                                                    <li>
                                                        <a href="/theme/ecommerce-templates.html">Ecommerce Email</a>
                                                    </li>
                                                    <li>
                                                        <a href="/theme/email-order-success.html">Order Success      </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Miscellaneous             </h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="image"></i>
                            <span>Gallery</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/gallery.html">Gallery Grid</a>
                            </li>
                            <li>
                                <a href="/theme/gallery-with-description.html">Gallery Grid Desc</a>
                            </li>
                            <li>
                                <a href="/theme/gallery-masonry.html">Masonry Gallery</a>
                            </li>
                            <li>
                                <a href="/theme/masonry-gallery-with-disc.html">Masonry with Desc</a>
                            </li>
                            <li>
                                <a href="/theme/gallery-hover.html">Hover Effects</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="edit"></i>
                            <span>Blog</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/blog.html">Blog Details</a>
                            </li>
                            <li>
                                <a href="/theme/blog-single.html">Blog Single</a>
                            </li>
                            <li>
                                <a href="/theme/add-post.html">Add Post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link menu-title link-nav" href="/theme/faq.html">
                            <i data-feather="help-circle"></i>
                            <span>FAQ</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="user-check"></i>
                            <span>Job Search</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/job-cards-view.html">Cards view</a>
                            </li>
                            <li>
                                <a href="/theme/job-list-view.html">List View</a>
                            </li>
                            <li>
                                <a href="/theme/job-details.html">Job Details</a>
                            </li>
                            <li>
                                <a href="/theme/job-apply.html">Apply</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="layers"></i>
                            <span>Learning</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/learning-list-view.html">Learning List</a>
                            </li>
                            <li>
                                <a href="/theme/learning-detailed.html">Detailed Course</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="map"></i>
                            <span>Maps</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/map-js.html">Maps JS</a>
                            </li>
                            <li>
                                <a href="/theme/vector-map.html">Vector Maps</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="git-pull-request"></i>
                            <span>Editors</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/summernote.html">Summer Note</a>
                            </li>
                            <li>
                                <a href="/theme/ckeditor.html">CK editor</a>
                            </li>
                            <li>
                                <a href="/theme/simple-MDE.html">MDE editor</a>
                            </li>
                            <li>
                                <a href="/theme/ace-code-editor.html">ACE code editor</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="database"></i>
                            <span>Knowledgebase</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a href="/theme/knowledgebase.html">Knowledgebase</a>
                            </li>
                            <li>
                                <a href="/theme/knowledge-category.html">Knowledge category</a>
                            </li>
                            <li>
                                <a href="/theme/knowledge-detail.html">Knowledge detail</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link menu-title link-nav" href="/theme/support-ticket.html">
                            <i data-feather="headphones"></i>
                            <span>Support Ticket</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow">
                <i data-feather="arrow-right"></i>
            </div>
        </div>
    </nav>
</header>
